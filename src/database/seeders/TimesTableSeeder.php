<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $param = [
        'user_id'=> '2',
        'date' => Carbon::create('2000', '01', '01'),
        'start_time' => Carbon::create('2000', '01', '01'),
        'end_time' => Carbon::create('2000', '01', '01'),
        'rest_time'=> Carbon::create('2000', '01', '01'),
        ];
    DB::table('times')->insert($param);

    Time::factory(10)->create();
    }

}
