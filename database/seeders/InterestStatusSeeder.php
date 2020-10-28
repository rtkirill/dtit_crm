<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interest_statuses')->insert([
            ['status' => 'Начальный интерес'],
            ['status' => 'В работе'],
            ['status' => 'Отложен'],
            ['status' => 'Перезвонить'],
        ]);
    }
}
