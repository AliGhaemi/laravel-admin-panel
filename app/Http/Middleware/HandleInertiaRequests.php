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

    protected function assignRelatedRow($recentCrud)
    {
        $recentCrudWithModels = $recentCrud->map(function ($log) {
            $modelClassString = $log->logged_model_class_name;
            if (!class_exists($modelClassString) || !is_subclass_of($modelClassString, Model::class)) {
                $log->related_model = null;
                return $log;
            }
            $relatedModel = $modelClassString::find($log->logged_row_id);

            if ($relatedModel) {
                $log->related_model = $relatedModel->toArray();
            } else {
                $log->related_model = null;
            }

            return $log;
        });
        return $recentCrudWithModels;
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
        $recent_created = DatabaseLog::latest()->where("crud_type","created")->take(3)->get();
        $recent_updated = DatabaseLog::latest()->where("crud_type","updated")->take(3)->get();
        $recent_deleted = DatabaseLog::latest()->where("crud_type","deleted")->take(3)->get();

        return [
            ...parent::share($request),
            'name' => config('app.name'),
            'quote' => ['message' => trim($message), 'author' => trim($author)],
            'auth' => [
                'user' => $request->user(),
            ],
            'recent_created' => [
                "type"=> "created",
                $this->assignRelatedRow($recent_created)->toArray()
            ],
            'recent_updated' => [
                "type"=> "updated",
                $this->assignRelatedRow($recent_updated)->toArray()
            ],
            'recent_deleted' => [
                "type"=> "deleted",
                $this->assignRelatedRow($recent_deleted)->toArray()
            ],
//            'ziggy' => fn(): array => [
//                ...(new Ziggy)->toArray(),
//                'location' => $request.url(),
//            ]
            //
        ];
    }
}
