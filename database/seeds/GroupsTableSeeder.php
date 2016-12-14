<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert(['id'=>1, 'name' => 'Analysis Reports', 'prefix' => 'AN', 'description' => '']);
        DB::table('groups')->insert(['id'=>2, 'name' => 'Setup Reports', 'prefix' => 'SU', 'description' => '']);
        DB::table('groups')->insert(['id'=>3, 'name' => 'Billing Reports', 'prefix' => 'BL', 'description' => '']);
        DB::table('groups')->insert(['id'=>4, 'name' => 'Budget Reports', 'prefix' => 'BT', 'description' => '']);
        DB::table('groups')->insert(['id'=>5, 'name' => 'Channel Reports', 'prefix' => 'CH', 'description' => '']);
        DB::table('groups')->insert(['id'=>6, 'name' => 'Year-to-Year Reports', 'prefix' => 'YY', 'description' => '']);
        DB::table('groups')->insert(['id'=>7, 'name' => 'Invoice Reports', 'prefix' => 'IN', 'description' => '']);
        DB::table('groups')->insert(['id'=>8, 'name' => 'Cost Avoidance Reports', 'prefix' => 'CAP', 'description' => '']);
        DB::table('groups')->insert(['id'=>9, 'name' => 'Weather Reports', 'prefix' => 'WTHR', 'description' => '']);
        DB::table('groups')->insert(['id'=>10, 'name' => 'GHG Reports', 'prefix' => 'GHG', 'description' => '']);
        DB::table('groups')->insert(['id'=>11, 'name' => 'Normalized Reports', 'prefix' => 'NORM', 'description' => '']);
        DB::table('groups')->insert(['id'=>12, 'name' => 'Calendarized Reports', 'prefix' => 'CAL', 'description' => '']);
    }
}
