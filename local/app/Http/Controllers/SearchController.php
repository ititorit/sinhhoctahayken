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
use Validator;
class SearchController extends Controller
{
	public function __construct() {
        $slogan = slogan::orderBy('id', 'DESC')
            ->where('status', 1)
            ->first();
        view()->share('slogan', $slogan);

        $khoahoc_luyenthi = khoahoc_luyenthi::all();
        view()->share('khoahoc_luyenthi', $khoahoc_luyenthi);

        $contact = contact::all()->first();
        view()->share('contact', $contact);

        $newPost = posts::orderBy('id', 'DESC')
            ->limit(10)
            ->get();
        view()->share('newPost', $newPost);
    }

    public function getSearch(Request $req) {
    	$rules = [
    		'keywords' => 'required'
    	];
    	$mess = [
    		'keywords.required' => 'Bạn chưa nhập vào từ khóa để tìm kiếm.'
    	];

    	$validate = Validator::make($req->all(), $rules, $mess);
    	if($validate->fails()) {
    		return redirect()->back()->withInput()->withErrors($validate);
    	}
    	$keywords = $req['keywords'];
    	$result = posts::orderBy('id', 'DESC')
    		->where('title', 'like', "%$keywords%")
	    	->orWhere('content', 'like', "%$keywords%")
	    	->get();
	    return view('front_end.pages.search.search', ['result' => $result, 'keywords' => $keywords]);
    }
}
