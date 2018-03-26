<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\slogan;
use App\tamnhin;
use App\sumenh;
use App\cotloi;
use App\khoahoc_luyenthi;
use App\contact;
use App\posts;
use App\hinhanhnoibat;
use Validator;

class PagesController extends Controller
{
    public function __construct() {
        $slogan = slogan::orderBy('id', 'DESC')
            ->where('status', 1)
            ->first();
        view()->share('slogan', $slogan);

        $tamnhin = tamnhin::all()->first();
        $sumenh = sumenh::all()->first();
        $cotloi = cotloi::all()->first();

        view()->share('tamnhin', $tamnhin);
        view()->share('sumenh', $sumenh);
        view()->share('cotloi', $cotloi);

        $khoahoc_luyenthi = khoahoc_luyenthi::all();
        view()->share('khoahoc_luyenthi', $khoahoc_luyenthi);

        $contact = contact::all()->first();
        view()->share('contact', $contact);

        $newPost = posts::orderBy('id', 'DESC')
            ->limit(10)
            ->get();
        view()->share('newPost', $newPost);

        $hinhanhnoibat = hinhanhnoibat::orderBy('id', 'DESC')
            ->limit(8)
            ->get();
        view()->share('hinhanhnoibat', $hinhanhnoibat);
    }

    public function getHome() {
        $tinNoiBat = posts::orderBy('id', 'DESC')
            ->limit(4)
            ->get();
    	return view('front_end.pages.home.home', ['tinNoiBat' => $tinNoiBat]);
    }

    public function getNews() {
        $listPost = posts::orderBy('id', 'DESC')->paginate(4);
    	return view('front_end.pages.news.news', ['listPost' => $listPost]);
    }

    public function getDetailPost($id) {
        $curPost = posts::findOrFail($id);
        
        $postLienQuan = posts::where([
            ['idKhoaHoc_LuyenThi', '=' , $curPost->idKhoaHoc_LuyenThi],
            ['id', '<>', $id],
        ])
            ->orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        return view('front_end.pages.noidungbaiviet', ['post' => $curPost, 'postLienQuan' => $postLienQuan]);
    }

    public function getContact() {
        $contact = contact::findOrFail(1);
        return view('front_end.pages.contact.contact', ['contact' => $contact]);
    }

    public function getProfileUser($id) {
        $user = User::findOrFail($id);
    	return view('front_end.pages.profiles.profile', ['user' => $user]);
    }

    public function getListPostByKhoaHocLuyenThi($idKhoaHoc_LuyenThi) {
        $listPost = posts::orderBy('id', 'DESC')->where('idKhoaHoc_LuyenThi', $idKhoaHoc_LuyenThi)->paginate(4);
        return view('front_end.pages.news.listByCategory', ['listPost' => $listPost]);
    }

    public function getListImage() {
        $images = hinhanhnoibat::paginate(12);
        return view('front_end.pages.images.images', ['images' => $images]);
    }
}
