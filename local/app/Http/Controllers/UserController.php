<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;
use App\khoahoc_luyenthi;
use App\slogan;
use App\tamnhin;
use App\sumenh;
use App\cotloi;
use App\contact;
use Validator;
use Session;

class UserController extends Controller
{
    public function __construct() {
        $tamnhin = tamnhin::all()->first();
        $sumenh = sumenh::all()->first();
        $cotloi = cotloi::all()->first();

        view()->share('tamnhin', $tamnhin);
        view()->share('sumenh', $sumenh);
        view()->share('cotloi', $cotloi);

        $daotao = khoahoc_luyenthi::all();
        view()->share('daotao', $daotao);

        $slogans = slogan::all();
        view()->share('slogans', $slogans);

        // Lấy toàn bộ tài khoản.
        $users_actived = User::orderBy('id', 'DESC')->where('active', 1)->paginate(10);
        view()->share('users_actived', $users_actived);

        $users_not_active = User::orderBy('id', 'DESC')->where('active', 0)->paginate(10);
        view()->share('users_not_active', $users_not_active);


        $contact = contact::all()->first();
        view()->share('contact', $contact);

        $khoahoc_luyenthi = khoahoc_luyenthi::all();
        view()->share('khoahoc_luyenthi', $khoahoc_luyenthi);
    }

    public function getUpdateUser($id) {
    	if(Auth::user()->id == $id) {
    		$user = User::findOrFail($id);
    		return view('front_end.pages.profiles.updateInfo', ['user' => $user]);
    	}
    	return redirect('home')->with(['danger' => 'Bạn vừa truy cập vào 1 URL bị cấm. Vui lòng kiểm tra lại.']);
    }

    public function postUpdateUser(Request $req, $id) {
    	$user = User::findOrFail($id);

    	$user->name = $req['name'];
    	$user->address = $req['address'];
    	$user->number_phone = $req['number_phone'];
    	$user->school = $req['school'];
    	$user->link_fb = $req['link_fb'];

    	$user->save();

    	return redirect()->route('profileUser', ['id' => $id])->with(['success', 'Cập nhật thông tin thành công.']);
    }

    public function getChangePassword($id) {
    	if(Auth::user()->id == $id) {
    		$user = User::findOrFail($id);
    		return view('front_end.pages.profiles.changePassword', ['user' => $user]);
    	}
    	return redirect()->back()->with(['danger' => 'Bạn vừa truy cập vào 1 URL bị cấm. Vui lòng kiểm tra lại.']);
    }

    public function postChangePassword(Request $req) {
    	$rules = [
    		'password' => 'min:5',
    		're-password' => 'same:password'
    	];
    	$mess = [
    		'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự.',
    		're-password.same' => 'Mật khẩu không khớp. Vui lòng kiểm tra lại.',
    	];

    	$validate = Validator::make($req->all(), $rules, $mess);
    	if($validate->fails()) {
    		return redirect()->back()->withInput()->withErrors($validate);
    	} else {
    		$user = User::findOrFail(Auth::user()->id);
    		if(!Hash::check($req['old-password'], $user->password)) {
    			return redirect()->back()->withInput()->with(['danger' => 'Mật khẩu cũ không đúng. Vui lòng kiểm tra lại.']);
    		} else {
    			$user->password = bcrypt($req['password']);

    			$user->save();
    			Auth::logout();
                return redirect('home')->with(['success' => 'Đã đổi mật khẩu thành công. Vui lòng đăng nhập lại.']);
    		}
    	}
    }

    public function getListUser() {
        return view('front_end.admin.users.list');
    }

    public function getDelete($id) {
        if(Auth::user()->role < 2) {
            return redirect()->back();
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with(['success' => 'Xóa tài khoản thành công.']);
    }

    public function getSetAdmin($id) {
        if(Auth::user()->role < 2) {
            return redirect()->back();
        }
        $user = User::findOrFail($id);
        $name = $user->username;
        $user->role = 1;

        $user->save();
        return redirect()->back()->with(['success' => 'Đã xét quyền admin thành công cho tài khoản ' . $name]);
    }

    public function getCancelAdmin($id) {
        if(Auth::user()->role < 2) {
            return redirect()->back();
        }
        $user = User::findOrFail($id);
        $name = $user->username;
        $user->role = 0;

        $user->save();
        return redirect()->back()->with(['success' => 'Đã hủy quyền admin thành công đối với tài khoản ' . $name]);
    }

    public function getActive($id) {
        if(Auth::user()->role < 2) {
            return redirect()->back();
        }
        $user = User::findOrFail($id);

        $user->active = 1;

        $user->save();
        return redirect('admin/user/list')->with('success', 'Active thành công cho tài khoản ' . $user->username);
    }

    public function getCancelActive($id) {
        if(Auth::user()->role < 2) {
            return redirect()->back();
        }

        $user = User::findOrFail($id);

        $user->active = 0;

        $user->save();

        return redirect()->back()->with('success', 'Đã hủy kích hoạt thành công cho tài khoản ' . $user->username);
    }
}
