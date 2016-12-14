<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics')->insert(['id' => 1, 'name' => 'SU', 'description' => 'Database setup or configuration list reports']);
        DB::table('topics')->insert(['id' => 2, 'name' => 'BUD', 'description' => 'Budget reports']);
        DB::table('topics')->insert(['id' => 3, 'name' => 'CB', 'description' => 'Chargebacks, Rebilling, % Distribution reports']);
        DB::table('topics')->insert(['id' => 4, 'name' => 'CTR', 'description' => 'Counters/Production reports']);
        DB::table('topics')->insert(['id' => 5, 'name' => 'CONTR', 'description' => 'Vendor contract tracking reports']);
        DB::table('topics')->insert(['id' => 6, 'name' => 'INT', 'description' => 'Smart meter interval data reports']);
        DB::table('topics')->insert(['id' => 7, 'name' => 'GHG', 'description' => 'Greenhouse Gas reports']);
        DB::table('topics')->insert(['id' => 8, 'name' => 'ISS', 'description' => 'Issue Tracker reports']);
        DB::table('topics')->insert(['id' => 9, 'name' => 'WTH', 'description' => 'Weather reports']);
    }
}
