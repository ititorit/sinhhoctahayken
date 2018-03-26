<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'username' => 'admin',
            'password' => bcrypt('admin'),
            'name' => 'Nguyễn Văn Nhật',
            'link_fb' => 'https://www.facebook.com/sinhhocthayken',
            'email' => 'sinhhocthayken@gmail.com',
            'address' => 'Thành phố Huế',
            'school' => 'Trung tâm sinh học thầy Ken',
            'number_phone' => '01626545828',
            'role' => 2,
            'user_vip' => 2,
            'active' => 1
        ]);
    }
}
