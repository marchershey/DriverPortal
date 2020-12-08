<?php

namespace Database\Factories;

use App\Models\Dispatch;
use App\Models\DispatchStop;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class DispatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dispatch::class;

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterMaking(function (Dispatch $dispatch) {
            //
        })->afterCreating(function (Dispatch $dispatch) {
            for ($x = 0; $x <= rand(0, 3); $x++) {
                $stop = new DispatchStop(['dispatch_id' => $dispatch->id, 'warehouse_id' => Warehouse::inRandomOrder()->first()->id]);
                $dispatch->stops()->save($stop);
            }
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'reference_number' => '9' . $this->faker->numberBetween(700000, 999999),
            'miles' => $this->faker->numberBetween(50, 400),
            'date' => Carbon::parse($this->faker->dateTimeThisMonth()),
            'status_id' => $this->faker->biasedNumberBetween(1, 2),
            'user_id' => 1,
        ];
    }
}
