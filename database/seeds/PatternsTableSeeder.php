<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatternsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patterns')->insert(['id'=> 1, 'name' => 'ONE_BLD', 'description' => 'One page per Building']);
        DB::table('patterns')->insert(['id'=> 2, 'name' => 'ONE_MA', 'description' => 'One page per Meter/Account']);
        DB::table('patterns')->insert(['id'=> 3, 'name' => 'ONE_BIL', 'description' => 'One page per Utility Bill']);
        DB::table('patterns')->insert(['id'=> 4, 'name' => 'ONE_ORG', 'description' => 'One summary rollup for my entire Organization or Business Group']);
        DB::table('patterns')->insert(['id'=> 5, 'name' => 'MANY_BLD', 'description' => 'Many rows of Buildings on a page']);
        DB::table('patterns')->insert(['id'=> 6, 'name' => 'MANY_MA', 'description' => 'Many rows Meters or Accounts on a page']);
        DB::table('patterns')->insert(['id'=> 7, 'name' => 'MANY_BIL', 'description' => 'Many rows of Utility Bills on a page']);
    }
}
