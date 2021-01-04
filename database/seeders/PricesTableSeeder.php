<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PricesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = DB::table('prices')->count();
        if ($count == 0) {
            $created = new \App\Models\Price();
            $created->employee_id = 1;
            $created->per_hour = 50;
            $created->fixed = 1000;
            $created->save();

            $created = new \App\Models\Price();
            $created->employee_id = 2;
            $created->per_hour = 30;
            $created->fixed = 800;
            $created->save();

            $created = new \App\Models\Price();
            $created->employee_id = 3;
            $created->per_hour = 40;
            $created->fixed = 900;
            $created->save();

        }
    }
}
