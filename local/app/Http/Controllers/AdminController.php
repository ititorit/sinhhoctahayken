<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\tamnhin;
use App\sumenh;
use App\cotloi;
use App\User;
use App\slogan;
use App\khoahoc_luyenthi;
use App\contact;
use App\hinhanhnoibat;
use App\posts;
use App\intro_register;

class AdminController extends Controller
{
	public function __construct() {
		$tamnhin = tamnhin::all()->first();
		$sumenh  = sumenh::all()->first();
		$cotloi  = cotloi::all()->first();

		view()->share('tamnhin', $tamnhin);
		view()->share('sumenh', $sumenh);
		view()->share('cotloi', $cotloi);

		$daotao = khoahoc_luyenthi::all();
		view()->share('daotao', $daotao);

        // Lấy toàn bộ tài khoản.
        $users_actived = User::orderBy('id', 'DESC')->where('active', 1)->paginate(10);
        view()->share('users_actived', $users_actived);

        $users_not_active = User::orderBy('id', 'DESC')->where('active', 0)->paginate(10);
        view()->share('users_not_active', $users_not_active);

        $post = posts::all();
        view()->share('totalPost', $post);

        $image = hinhanhnoibat::all();
        view()->share('image', $image);
	}

	// Home của trang chủ admin.
    public function getHome() {
    	if(Auth::user()->role >= 1) {
    		return view('front_end.admin.dashboard.dashboard');
    	}
    	return redirect('home');
    }

    public function getTamnhin() {
    	if(Auth::user()->role == 2) {
    		$current = tamnhin::all()->first();
    		return view('front_end.admin.tamnhin_sumenh_cotloi.content.tamnhin', ['current_tamnhin' => $current]);
    	}
    	return redirect()->back();
    }
    // End

    // 3 box đầu tiên của trang web.
    public function postTamnhin(Request $req) {
    	$rules = [
    		'title' => 'required',
    		'content' => 'required|min:50'
    	];

    	$mess = [
    		'title.required' => 'Vui lòng nhập vào tiêu đề.',
    		'content.required' => 'Vui lòng nhập vào nội dung.',
    		'content.min' => 'Nội dung phải chứa ít nhất 50 ký tự.'
    	];

    	$validate = Validator::make($req->all(), $rules, $mess);
    	if($validate->fails()) {
    		return redirect()->back()->withInput()->withErrors($validate);
    	}

    	$current = tamnhin::all()->first();
    	if(!empty($current)) {
    		$current->delete();
    	}

    	$newTamnhin = new tamnhin;

    	$newTamnhin->title 	= $req['title'];
    	$newTamnhin->content = $req['content'];

    	$newTamnhin->save();

    	\Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Thay đổi nội dung thành công."
        ]);

    	return redirect()->back();
    }

    public function getSumenh() {
    	if(Auth::user()->role == 2) {
    		$current = sumenh::all()->first();
    		return view('front_end.admin.tamnhin_sumenh_cotloi.content.sumenh', ['current_sumenh' => $current]);
    	}
    	return redirect()->back();
    }

    public function postSumenh(Request $req) {
    	$rules = [
    		'title' => 'required',
    		'content' => 'required|min:50'
    	];

    	$mess = [
    		'title.required' => 'Vui lòng nhập vào tiêu đề.',
    		'content.required' => 'Vui lòng nhập vào nội dung.',
    		'content.min' => 'Nội dung phải chứa ít nhất 50 ký tự.'
    	];

    	$validate = Validator::make($req->all(), $rules, $mess);
    	if($validate->fails()) {
    		return redirect()->back()->withInput()->withErrors($validate);
    	}

    	$current = sumenh::all()->first();
    	if(!empty($current)) {
    		$current->delete();
    	}

    	$newSuMenh = new sumenh;

    	$newSuMenh->title = $req['title'];
    	$newSuMenh->content = $req['content'];

    	$newSuMenh->save();

    	\Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Thay đổi nội dung thành công."
        ]);

    	return redirect()->back();
    }

    public function getCotloi() {
    	if(Auth::user()->role == 2) {
    		$current = cotloi::all()->first();
    		return view('front_end.admin.tamnhin_sumenh_cotloi.content.cotloi', ['current_cotloi' => $current]);
    	}
    	return redirect()->back();
    }

    public function postCotloi(Request $req) {
    	$rules = [
    		'title' => 'required',
    		'content' => 'required|min:50'
    	];

    	$mess = [
    		'title.required' => 'Vui lòng nhập vào tiêu đề.',
    		'content.required' => 'Vui lòng nhập vào nội dung.',
    		'content.min' => 'Nội dung phải chứa ít nhất 50 ký tự.'
    	];

    	$validate = Validator::make($req->all(), $rules, $mess);
    	if($validate->fails()) {
    		return redirect()->back()->withInput()->withErrors($validate);
    	}

    	$current = cotloi::all()->first();
    	if(!empty($current)) {
    		$current->delete();
    	}

    	$newCotLoi = new cotloi;

    	$newCotLoi->title = $req['title'];
    	$newCotLoi->content = $req['content'];

    	$newCotLoi->save();

    	\Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Thay đổi nội dung thành công."
        ]);

    	return redirect()->back();
    }
    // End

    // Khóa học.
    public function getEditDaoTao($id) {
        if(Auth::user()->role < 2) {
            return redirect()->back();
        }
    	$res = khoahoc_luyenthi::findOrFail($id);
    	return view('front_end.admin.khoahoc.edit', ['res' => $res]);
    }

    public function postEditDaoTao(Request $req, $id) {
    	$rules = [
    		'title' => 'required',
    		'content' => 'required|min:50'
    	];

    	$mess = [
    		'title.required' => 'Vui lòng nhập vào tiêu đề.',
    		'content.required' => 'Vui lòng nhập vào nội dung.',
    		'content.min' => 'Nội dung phải chứa ít nhất 50 ký tự'
    	];

    	$validate = Validator::make($req->all(), $rules, $mess);
    	if($validate->fails()) {
    		return redirect()->back()->withInput()->withErrors($validate);
    	}

    	$current = khoahoc_luyenthi::findOrFail($id);

    	$current->title = $req['title'];
    	$current->name_without_accent = str_slug($req['title']);
    	$current->content = $req['content'];

    	$current->save();

    	\Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Thay đổi nội dung thành công."
        ]);

    	return redirect()->back();
    }

    public function getAddKhoaHoc() {
    	return view('front_end.admin.khoahoc.add');
    }

    public function postAddKhoaHoc(Request $req) {
    	$rules = [
    		'title' => 'required',
    		'content' => 'required|min:50'
    	];
    	$mess = [
    		'title.required' => 'Vui lòng nhập vào tiêu đề của khóa học.',
    		'content.required' => 'Vui lòng nhập vào nội dung của khóa học',
    		'content.min' => 'Nội dung phải chứa ít nhất 50 ký tự'
    	];
    	$validate = Validator::make($req->all(), $rules, $mess);
    	if($validate->fails()) {
    		return redirect()->back()->withInput()->withErrors($validate);
    	}

    	$newRecord = new khoahoc_luyenthi;

    	$newRecord->title = $req['title'];
    	$newRecord->name_without_accent = str_slug($req['title']);
    	$newRecord->content = $req['content'];

    	$newRecord->save();

    	\Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Thêm khóa học thành công."
        ]);
    	return redirect()->back();
    }

    public function getDeleteKhoaHoc($id) {
    	$curRecord = khoahoc_luyenthi::findOrFail($id);
    	$curRecord->delete();

    	\Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Xóa khóa học thành công. Vui lòng kiểm tra trong menu Khóa học - Luyện thi"
        ]);
        return redirect('admin/home');
    }
    // End

    // Contact
    public function getContact() {
        if(Auth::user()->role < 2) {
            return redirect()->back();
        }
        $contact = contact::findOrFail(1);
        return view('front_end.admin.contact.contact', ['contact' => $contact]);
    }

    public function postContact(Request $req) {
        $rules = [
            'address' => 'required',
            'email' => 'required|email',
            'website' => 'required',
            'number_phone' => 'required',
            'link_fb' => 'required',
        ];

        $mess = [
            'address.required' => 'Vui lòng nhập vào địa chỉ.',
            'email.required' => 'Vui lòng nhập vào email',
            'email.email' => 'Email không đúng định dạng.',
            'website.required' => 'Vui lòng nhập vào website.',
            'link_fb.required' => 'Vui lòng nhập vào link facebook'
        ];

        $validate = Validator::make($req->all(), $rules, $mess);
        if($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $newContact = contact::findOrFail(1);
        $newContact->name = $req['name'];
        $newContact->address = $req['address'];
        $newContact->email = $req['email'];
        $newContact->website = $req['website'];
        $newContact->number_phone = $req['number_phone'];
        $newContact->link_fanpage = $req['link_fb'];
        if(isset($req['link_youtube'])) {
            $newContact->link_youtube = $req['link_youtube'];
        }
        if(isset($req['link_google'])) {
            $newContact->link_google = $req['link_google'];
        }

        $newContact->save();

        \Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Cập nhật thông tin liên hệ thành công."
        ]);

        return redirect()->back();
    }
    // End

    // Thay đổi intro giới thiệu ở trang đăng ký.
    public function getGioiThieuDangKy() {
        $curContent = intro_register::orderBy('id', 'ASC')->first();
        return view('front_end.admin.intro_register.intro', ['res' => $curContent]);
    }

    public function postGioiThieuDangKy(Request $req) {
        $rules = [
            'image' => 'image|mimes:jpeg,png,jpg',
            'content' => 'required'
        ];

        $mess = [
            'image.mimes' => 'Vui lòng chọn file định dạng là ảnh.',
            'image.image' => 'Vui lòng chọn file định dạng là ảnh.',
            'content.required' => 'Vui lòng nhập vào nội dung.'
        ];

        $validate = Validator::make($req->all(), $rules, $mess);
        if($validate->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validate);
        }

        $curContent = intro_register::orderBy('id', 'DESC')->first();

        if($curContent) {
            if($req->hasFile('image')) {
                $file = $req['image'];
                $path = 'uploads/intro_register';

                $needToSave = time() . '.' . $file->getClientOriginalExtension();
                if($curContent->urlHinh) {
                    unlink(base_path() . '/../uploads/intro_register/' . $curContent->urlHinh);
                }

                $file->move($path, $needToSave);

                $curContent->urlHinh = $needToSave;


            } else {
                if($curContent->urlHinh) {
                    unlink(base_path() . '/../uploads/intro_register/' . $curContent->urlHinh);
                }
            }

            $curContent->content = $req['content'];
            $curContent->save();
            \Session::flash("Flash_session", [
                "level"     => "success",
                "message"   => "Cập nhật thành công."
            ]);

            return redirect()->back();
        }

        // Chưa có bài viết.
        $newIntro = new intro_register;

        if($req->hasFile('image')) {
            $file = $req['image'];
            $path = 'uploads/intro_register';

            $needToSave = time() . '.' . $file->getClientOriginalExtension();

            $file->move($path, $needToSave);
            $newIntro->urlHinh = $needToSave;
        }

        $newIntro->content = $req['content'];
        $newIntro->save();
        \Session::flash("Flash_session", [
            "level"     => "success",
            "message"   => "Cập nhật thành công."
        ]);

        return redirect()->back();
    }

    // End
}