<?php

namespace Database\Seeders;

use EmployeeTableSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(EmployeeTableSeeder::class);
        $this->call(\PricesTableSeeder::class);

        Model::reguard();
    }
}
