<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            KhoaHocLuyenThiTableSeeder::class,
            SloganTableSeeder::class,
            ContactTableSeeder::class,
            TamnhinTableSeeder::class,
            SumenhTableSeeder::class,
            CotloiTableSeeder::class,
            PostsTableSeeder::class,
        ]);
    }
}