<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Validator;
use App\User;
use App\slogan;
use App\contact;
use App\khoahoc_luyenthi;
use App\intro_register;

class LoginController extends Controller
{

    public function __construct() {
        $slogan = slogan::orderBy('id', 'DESC')->first();
        view()->share('slogan', $slogan);

        $contact = contact::all()->first();
        view()->share('contact', $contact);

        $khoahoc_luyenthi = khoahoc_luyenthi::all();
        view()->share('khoahoc_luyenthi', $khoahoc_luyenthi);
    }

    public function getLogin() {
        $content = intro_register::orderBy('id', 'DESC')->first();
        return view('front_end.pages.login.login', ['content' => $content]);
    }

    public function postLogin(Request $req) {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];
        $mess = [
            'username.required' => 'Vui lòng nhập vào tài khoản.',
            'password.required' => 'Vui lòng nhập vào mật khẩu.'
        ];

        $validate = Validator::make($req->all(), $rules, $mess);
        if($validate->fails()) {
            return redirect()->back()->withInput()->withErrors();
        }
        $user_login = $req['username'];
        $pass_login = $req['password'];

        $curUser = User::where('username', '=', $user_login)->first();

        if($curUser) {
            if($curUser->active == 0) {
                return redirect()->back()->withInput()->with('errorLogin', 'Tài khoản này chưa được kích hoạt, vui lòng liên hệ với admin để kích hoạt.');
            }
        }

        if(Auth::attempt(['username' => $user_login, 
                          'password' => $pass_login])) {
            return redirect('home')->with(['success' => 'Đăng nhập thành công. Xin chào ' . Auth::user(0)->name]);
        } else {
            return redirect()->back()->withInput()->with(['errorLogin' => 'Tài khoản hoặc mật khẩu không đúng. Vui lòng kiểm tra lại.']);
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->back();
    }

    public function getRegister() {
        $content = intro_register::orderBy('id', 'DESC')->first();
        return view('front_end.pages.register.register', ['content' => $content]);
    }

    public function postRegister(Request $req) {
        $rules = [
            'username' => 'required|unique:users,username',
            'password' => 'required|min:5',
            're-password' => 'required|same:password',
            'email' => 'required|unique:users,email'
        ];
        $mess = [
            'username.required' => 'Vui lòng nhập vào tên tài khoản.',
            'username.unique' => 'Tài khoản đã được sử dụng. Vui lòng kiểm tra lại.',
            'password.required' => 'Vui lòng nhập vào mật khẩu.',
            'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự. Vui lòng kiểm tra lại.',
            're-password.required' => 'Vui lòng nhập vào mật khẩu.',
            're-password.same' => 'Mật khẩu không khớp. Vui lòng kiểm tra lại.',
            'email.required' => 'Vui lòng nhập vào email',
            'email.unique' => 'Email đã được sử dụng. Vui lòng kiểm tra lại.'
        ];
        $validate = Validator::make($req->all(), $rules, $mess);
        if($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        for ($i = 0; $i < strlen($req['username']); $i++) {
            if($req['username'][$i] == ' ') {
                return redirect()->back()->withInput()->with(['errorUsername' => 'Tài khoản không được chứa ký tự khoảng trắng.']);
            }
        }

        $user = new User;

        $user->username = $req['username'];
        $user->password = bcrypt($req['password']);
        $user->name     = $req['name'];
        $user->link_fb  = $req['link_fb'];
        $user->email    = $req['email'];
        $user->role     = 0;

        $user->save();
        return redirect('home')->with(['success' => 'Đăng ký thành công. Vui lòng đợi admin kích hoạt tài khoản của bạn.']);
    }
}
