<?php

use Illuminate\Database\Seeder;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contact')->insert([
            'name' => 'Nguyễn Văn Nhật',
        	'address' => 'Thành phố Huế',
        	'email' => 'sinhhocthayken@gmail.com',
        	'website' => 'sinhhocthanhken.edu.vn',
        	'number_phone' => '0162 654 5828',
        	'link_fanpage' => 'https://www.facebook.com/KenSHTK/'
        ]);
    }
}
