<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khoahoc_luyenthi;
use App\slogan;
use App\tamnhin;
use App\sumenh;
use App\cotloi;
use App\User;
use App\posts;
use App\contact;
use Validator;
use Session;
use Auth;
use App\hinhanhnoibat;

class ImageController extends Controller
{
	public function __construct() {
        $tamnhin= tamnhin::all()->first();
        $sumenh= sumenh::all()->first();
        $cotloi= cotloi::all()->first();

        view()->share('tamnhin', $tamnhin);
        view()->share('sumenh', $sumenh);
        view()->share('cotloi', $cotloi);

		$daotao = khoahoc_luyenthi::all();
		view()->share('daotao', $daotao);

        $slogan = slogan::all();
        view()->share('slogan', $slogan);

        $users = User::all();
        view()->share('users', $users);

        $contact = contact::all()->first();
        view()->share('contact', $contact);
	}

	public function getListImage() {
		$listImage = hinhanhnoibat::paginate(12);
		return view('front_end.admin.image.list', ['listImage' => $listImage]);
	}

	public function postListImage(Request $req) {
		$rules = [
			'image' => 'required|image|mimes:jpeg,png,jpg',
		];
		$mess = [
			'image.required' => 'Vui lòng chọn file upload.',
			'image.mimes' => 'File đã chọn không phải file ảnh.',
			'image.image' => 'Vui lòng chọn file là ảnh.'
		];

		$validate = Validator::make($req->all(), $rules, $mess);
		if($validate->fails()) {
			return redirect()->back()->withInput()->withErrors($validate);
		}

		$file = $req['image'];
		$path = 'uploads/hinhanhnoibat';

		$needToSave = time() . '.' . $file->getClientOriginalExtension();
		$file->move($path, $needToSave);

		$newImg = new hinhanhnoibat;

		$newImg->urlHinh = $needToSave;
		$newImg->idUser = Auth::user()->id;

		$newImg->save();

		\Session::flash("upload-success", [
            "level"     => "success",
            "message"   => "Upload thành công."
        ]);
		return redirect('admin/image/list');
	}

	public function getDeleteImage($id) {  	
    	$curImg = hinhanhnoibat::findOrFail($id);
    	if($curImg) {
    		unlink(base_path() . '/../uploads/hinhanhnoibat/' . $curImg->urlHinh);
    	}

    	$curImg->delete();

    	\Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Xóa ảnh thành công."
        ]);

    	return redirect('admin/image/list');
	}
}
