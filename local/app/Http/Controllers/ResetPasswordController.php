<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
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
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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

    public function resetModify(Request $req) {
        $rules = [
            'password' => 'required|min:5',
            're-password' => 'required|same:password'
        ];
        $mess = [
            'password.required' => 'Vui lòng nhập vào tài khoản.',
            'password.min' => 'Mật khẩu phải chứa ít nhất 5 ký tự',
            're-password.required' => 'Vui lòng nhập vào mật khẩu.',
            're-password.same' => 'Mật khẩu không khớp. Vui lòng kiểm tra lại.'
        ];

        $validate = Validator::make($req->all(), $rules, $mess);
        if($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $user = User::where('email', '=', $req['email'])->first();
        if($user) {
            $user->password = bcrypt($req['password']);

            $user->save();

            return redirect('home')->with('success', 'Thay đổi mật khẩu thành công.');
        } else {
            return redirect()->back()->withInput()->with('danger', 'Email không tồn tại.');
        }

        
    }
}