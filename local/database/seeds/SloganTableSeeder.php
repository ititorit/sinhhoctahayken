<?php

use Illuminate\Database\Seeder;

class SloganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slogan')->insert([
        	'urlHinh' => 'sinhhocthayken.png',
            'status' => 1
        ]);
    }
}
