<?php

namespace Database\Factories;

use App\Models\Catalogs\Bank;
use App\Models\Catalogs\Branch;
use App\Models\Catalogs\Company;
use App\Models\Catalogs\Department;
use App\Models\Catalogs\Payroll;
use App\Models\Catalogs\Position;
use App\Models\Catalogs\State;
use App\Models\Catalogs\Town;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'p_surname' => $this->faker->name(),
            'm_surname' => $this->faker->name(),
            'curp' => $this->faker->unique()->text(20),
            'rfc' => $this->faker->unique()->text(20),
            'nss' => $this->faker->unique()->text(20),
            'town_id' => Town::all( )->random()->id,
            'state_id' => State::all( )->random()->id,
            'company_id' => Company::all( )->random()->id,
            'payroll_id' => Payroll::all( )->random()->id,
            'department_id' => Department::all( )->random()->id,
            'branch_id' => Branch::all( )->random()->id,
            'position_id' => Position::all( )->random()->id,
            'bank_id' => Bank::all( )->random()->id,
            'user_id' => User::all()->random()->id
            //
        ];
    }
}
