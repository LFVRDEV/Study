<?php

namespace Database\Seeders;

use App\Models\Catalogs\Bank;
use App\Models\Catalogs\Branch;
use App\Models\Catalogs\Company;
use App\Models\Catalogs\Department;
use App\Models\Catalogs\Payroll;
use App\Models\Catalogs\Position;
use App\Models\Catalogs\State;
use App\Models\Catalogs\Town;
use App\Models\Catalogs\Document;
use App\Models\Catalogs\Incident;
use App\Models\Employee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Company::factory(10)->create();
        Payroll::factory(2)->create();
        Department::factory(10)->create();
        Position::factory(10)->create();
        Branch::factory(10)->create();
        Bank::factory(10)->create();
        State::factory(10)->create();
        Town::factory(10)->create();
        Document::factory(10)->create();
        Incident::factory(10)->create();

        Employee::factory(10)->create();
    }
}
