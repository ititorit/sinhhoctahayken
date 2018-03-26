<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\khoahoc_luyenthi;
use App\slogan;
use App\User;
use App\tamnhin;
use App\sumenh;
use App\cotloi;
use Validator;
use Session;
use File;

class SloganController extends Controller
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

        $users = User::all();
        view()->share('users', $users);
    }
    public function getSlogan() {
    	$slogan = slogan::all();
    	return view('front_end.admin.slogan.list', ['slogan' => $slogan]);
    }

    public function postSlogan(Request $req) {
    	$rules = [
            'uploadSlogan' => 'required|mimes:jpeg,jpg,png'
        ];

        $mess = [
            'uploadSlogan.required' => 'Vui lòng chọn file.',
            'uploadSlogan.mimes' => 'File chỉ chứa đuôi mở rộng là *JPEG, *.JPG, *.PNG'
        ];

        $validate = Validator::make($req->all(), $rules, $mess);
        if($validate->fails()) {
            return redirect()->back()->withErrors($validate);
        }

        $file = $req['uploadSlogan'];
        $path = 'uploads/slogan';
        $needSave = time() . '.' . $file->getClientOriginalExtension();
        $file->move($path, $needSave);

        $newSlogan = new slogan;
        $newSlogan->urlHinh = $needSave;
        $newSlogan->save();


        \Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Upload slogan thành công."
        ]);
        return redirect()->back();
    }

    public function getApplySlogan($id) {
    	$curSloganUssing = slogan::where('status', 1)->first();
    	$curSloganUssing->status = 0;

    	$curSloganNeedToUse = slogan::where('id', $id)->first();
    	$curSloganNeedToUse->status = 1;

    	$curSloganUssing->save();
    	$curSloganNeedToUse->save();

    	\Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Upload slogan thành công."
        ]);

    	return redirect()->back();
    }

    public function getDeleteSlogan($id) {
    	$totalSloganNow = slogan::all();

    	if(count($totalSloganNow) == 1) {
    		\Session::flash("danger", [
	            "level"     => "danger",
	            "message"   => "Bạn đã truy cập vào link cấm."
	        ]);

    		return redirect()->back();
    	}    	

    	$curSlogan = slogan::findOrFail($id);
        if($curSlogan->urlHinh) {
            unlink(base_path() . '/../uploads/slogan/' . $curSlogan->urlHinh);
        }

    	$curSlogan->delete();

    	\Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Xóa slogan thành công."
        ]);

    	return redirect('admin/slogan/list');
    }
}
