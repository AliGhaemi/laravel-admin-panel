<?php

namespace Database\Factories;

use App\Models\DatabaseLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DatabaseLog>
 */
class DatabaseLogFactory extends Factory
{
    protected $model = DatabaseLog::class;

    protected $actionTypes = [
        "created",
        "updated",
        "deleted",
    ];

    protected $modelsList = [
        \App\Models\User::class,
        \App\Models\AdminAccessToken::class,
    ];

    protected function getRandomIdFromModels(array $models)
    {
        if (empty($models)) {
            return null;
        }
        $randomModelClass = Arr::random($models);
        $tableName = (new $randomModelClass)->getTable();
        $rowCount = DB::table($tableName)->count();
        if ($rowCount === 0) {
            $remainingModels = Arr::except($models, array_search($randomModelClass, $models));
            if (empty($remainingModels)) {
                return null;
            }
            return $this->getRandomIdFromModels($remainingModels);
        }

        $randomOffset = mt_rand(0, $rowCount - 1);
        $randomRow = DB::table($tableName)
            ->offset($randomOffset)
            ->take(1)
            ->first();
        if ($randomRow === null) {
            return null;
        }
        return [
            'class' => $randomModelClass,
            'id' => $randomRow->id,
        ];
    }

    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'crud_type' => $this->faker->randomElement($this->actionTypes),
            'description' => $this->faker->text,
        ];
    }

    public function forModel(Model $model)
    {
        return $this->state(fn (array $attributes) => [
            "loggable_id" => $model->getKey(),
            "loggable_type" => $model->getMorphClass(),
        ]);
    }
}
