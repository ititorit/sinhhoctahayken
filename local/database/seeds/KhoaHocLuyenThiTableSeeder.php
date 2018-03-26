<?php

use Illuminate\Database\Seeder;

class KhoaHocLuyenThiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('khoahoc_luyenthi')->insert([
        	[
        		'title' => 'Lớp 10',
        		'name_without_accent' => str_slug('Lớp 10'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters'
        	],
        	[
        		'title' => 'Lớp 11',
        		'name_without_accent' => str_slug('Lớp 11'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters'
        	],
        	[
        		'title' => 'Lớp 12',
        		'name_without_accent' => str_slug('Lớp 12'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters'
        	],
        	[
        		'title' => 'Cơ bản',
        		'name_without_accent' => str_slug('Cơ bản'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters'
        	],
        	[
        		'title' => 'Nâng cao',
        		'name_without_accent' => str_slug('Nâng cao'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters'
        	],
        	[
        		'title' => 'Luyện đề',
        		'name_without_accent' => str_slug('Luyện đề'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters'
        	]
        ]);
    }
}
