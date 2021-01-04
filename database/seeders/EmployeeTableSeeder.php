<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('employees')->count();
        if ($count == 0) {
            $created = new \App\Models\Employee();
            $created->employee_uuid = Str::uuid()->toString();
            $created->first_name = 'Dasa';
            $created->last_name = 'Matic';
            $created->speciality = 'Software Development';
            $created->phone = 123456;
            $created->save();

            $created = new \App\Models\Employee();
            $created->employee_uuid = Str::uuid()->toString();
            $created->first_name = 'Aleksandar';
            $created->last_name = 'Cvetanovic';
            $created->speciality = 'AI';
            $created->phone = 456321;
            $created->save();

            $created = new \App\Models\Employee();
            $created->employee_uuid = Str::uuid()->toString();
            $created->first_name = 'Nemanja';
            $created->last_name = 'Jovic';
            $created->speciality = 'Web Design';
            $created->phone = 555333;
            $created->save();

        }
    }
}
