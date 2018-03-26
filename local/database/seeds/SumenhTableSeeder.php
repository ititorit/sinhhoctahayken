<?php

use Illuminate\Database\Seeder;

class SumenhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sumenh')->insert([
        	'title' => 'Box 2',
        	'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters'
        ]);
    }
}
