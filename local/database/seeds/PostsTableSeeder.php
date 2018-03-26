<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('posts')->insert([
            [
                'title' => 'Chỉ là test bài viết thôi mà.',
                'name_without_accent' => str_slug('Chỉ là test bài viết thôi mà1.'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters',
                'idUser' => 1,
                'idKhoaHoc_LuyenThi' => 1
            ],[
                'title' => 'Chỉ là test bài viết thôi mà.',
                'name_without_accent' => str_slug('Chỉ là test bài viết thôi mà2.'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters',
                'idUser' => 1,
                'idKhoaHoc_LuyenThi' => 1
            ],[
                'title' => 'Chỉ là test bài viết thôi mà.',
                'name_without_accent' => str_slug('Chỉ là test bài viết thôi mà3.'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters',
                'idUser' => 1,
                'idKhoaHoc_LuyenThi' => 1
            ],[
                'title' => 'Chỉ là test bài viết thôi mà.',
                'name_without_accent' => str_slug('Chỉ là test bài viết thôi mà4.'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters',
                'idUser' => 1,
                'idKhoaHoc_LuyenThi' => 1
            ],[
                'title' => 'Chỉ là test bài viết thôi mà.',
                'name_without_accent' => str_slug('Chỉ là test bài viết thôi mà5.'),
                'content' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of lettersIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters',
                'idUser' => 1,
                'idKhoaHoc_LuyenThi' => 1
            ],
        ]);
    }
}