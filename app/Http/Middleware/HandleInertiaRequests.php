<?php

namespace App\Http\Middleware;

use App\Models\DatabaseLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Inspiring;
use Illuminate\Http\Request;
use Inertia\Middleware;
use Tighten\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        [$message, $author] = str(Inspiring::quotes()->random())->explode('-');

        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'quote' => ['message' => trim($message), 'author' => trim($author)],
            'auth' => [
                'user' => $request->user(),
            ],
            'recent_created' => $this->getRecent('created', 3),
            'recent_updated' => $this->getRecent('updated', 3),
            'recent_deleted' => $this->getRecent('deleted', 3),
//            'ziggy' => fn(): array => [
//                ...(new Ziggy)->toArray(),
//                'location' => $request.url(),
//            ]
            //
        ];
    }

    protected function getRecent(string $crud_type, int $take)
    {
        $result = [
            "type" => $crud_type,
            "logs" => DatabaseLog::with(["user", "loggable"])->latest()->where("crud_type", $crud_type)->take($take)->get(),
        ];
        foreach ($result["logs"] as $key => $value) {
            $result["logs"][$key]["table_name"] = (new $value->loggable_type)->getTable();
        }
        // TODO: just to be clear, add a conditional to check if the returned result is not empty.
        return $result;
    }
}
