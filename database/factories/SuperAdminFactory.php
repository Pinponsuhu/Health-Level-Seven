<?php

namespace Database\Factories;

use App\Models\SuperAdmin;
use Illuminate\Database\Eloquent\Factories\Factory;

class SuperAdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = SuperAdmin::class;

    public function definition()
    {
        return [
            'fullname' => 'Admin One',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone_number' => '09078810854',
            'email_address' => $this->faker->unique()->safeEmail(),
            'gender' => 'Male',
            'username' => 'Admin_one',
            'passport' => 'Empty',
            'level' => 1,
        ];
    }
}
