<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(){
        $cat = array('Medicinal','Stationery');
        $con = array('Good','Bad');
            return [
                'name' => $this->faker->name(),
                'quantity' => random_int(1,20),
                'shelf_no' => random_int(1,12),
                'serial_number' => Str::random(10),
                'item_category' => $cat[random_int(0,1)],
                'item_condition' => $con[random_int(0,1)],
                'date_brought_in' => $this->faker->dateTimeThisMonth(),
                'delivered_by' => $this->faker->name(),
                'expiry_date' => $this->faker->dateTimeThisMonth(),
                'item_id' => random_int(0000000,999999),
                'deliverer_number' => random_int(000000000000,99999999999),
            ];

    }
}



