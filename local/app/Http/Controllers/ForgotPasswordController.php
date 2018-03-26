<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

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

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

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
}
