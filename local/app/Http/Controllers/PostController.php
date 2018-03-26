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

class PostController extends Controller {
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

    public function getListPostAdmin() {
        $posts = posts::orderBy('id', 'DESC')->paginate(10);
    	return view('front_end.admin.posts.list', ['posts' => $posts]);
    }

    public function getAddPostAdmin() {
        $khoahoc_luyenthi = khoahoc_luyenthi::all();
        return view('front_end.admin.posts.add', ['khoahoc_luyenthi' => $khoahoc_luyenthi]);
    }

    public function postAddPostAdmin(Request $req) {
        $rules = [
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'khoahoc_luyenthi' => 'required',
            'content' => 'required|min:50'
        ];

        $mess = [
            'title.required' => 'Vui lòng nhập vào tiêu đề của bài viết.',
            'image.mimes' => 'File ảnh chỉ chứa đuôi mở rộng là *JPEG, *.JPG, *.PNG',
            'image.required' => 'Vui lòng chọn ảnh để upload. Mỗi bài viết bắt buộc phải có hình ảnh tượng trưng.',
            'image.max' => 'Kích thước ảnh quá lớn. Lui lòng chọn ảnh nhỏ hơn 2MB.',
            'image.image' => 'vui lòng chọn file là ảnh',
            'khoahoc_luyenthi.required' => 'Vui lòng chọn Khóa học - Luyện thi',
            'content.required' => 'Vui lòng nhập vào nội dung của bài viết'
        ];

        $validate = Validator::make($req->all(), $rules, $mess);
        if($validate->fails()) {
            $fileName = $req['image'];
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $__name = str_slug($req['title']);
        $check = posts::where('name_without_accent', $__name)->first();
        if($check) {
            \Session::flash("error-title", [
                "level"     => "danger",
                "message"   => "Tên bài đã trùng hoặc giống với một bài viết. Vui lòng kiểm tra lại."
            ]);
            return redirect()->back()->withInput();
        }

        $post = new posts;

        $post->title = $req['title'];

        if($req->hasFile('image')) {
            $file = $req['image'];
            $path = 'uploads/images';

            $needToSave = time() . '.' . $file->getClientOriginalExtension();

            $file->move($path, $needToSave);

            $post->urlHinh = $needToSave;
        }

        $post->name_without_accent = str_slug($req['title']);
        $post->idUser = Auth::user()->id;
        $post->idKhoaHoc_LuyenThi = $req['khoahoc_luyenthi'];
        $post->content = $req['content'];

        $post->save();

        \Session::flash("upload-post-success", [
            "level"     => "success",
            "message"   => "Thêm bài viết thành công."
        ]);

        return redirect('admin/post/list');
    }

    public function getDeletePostAdmin($id) {
        $curPost = posts::findOrFail($id);

        // Nếu bức ảnh tượng trưng không phải của người đang đăng nhập đăng hoặc là chưa đủ cấp admin thì không cho phép xóa.
        if($curPost->idUser != Auth::user()->id && Auth::user()->role < 2) {
            return redirect('admin/post/list');
        }

        // Nếu bài viết hiện đang xóa có ảnh tượng trưng, thì xóa đường dẫn tượng trưng trong folder lưu ảnh ở server
        if($curPost->urlHinh) {
            unlink(base_path() . '/../uploads/images/' . $curPost->urlHinh);
        }

        $curPost->delete();

        \Session::flash("delete-post-success", [
            "level"     => "success",
            "message"   => "Xóa bài viết thành công."
        ]);

        return redirect()->back();
    }

    public function getEditPostAdmin($id) {
        $curPost = posts::findOrFail($id);
        if($curPost->idUser != Auth::user()->id && Auth::user()->role < 2) {
            return redirect('admin/post/list');
        }

        $khoahoc_luyenthi = khoahoc_luyenthi::all();
        return view('front_end.admin.posts.edit', ['post' => $curPost, 'khoahoc_luyenthi' => $khoahoc_luyenthi]);

    }

    public function postEditPostAdmin(Request $req, $id) {
        $rules = [
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,png',
            'khoahoc_luyenthi' => 'required',
            'content' => 'required|min:50'
        ];

        $mess = [
            'title.required' => 'Vui lòng nhập vào tiêu đề của bài viết.',
            // 'image.required' => 'Vui lòng chọn file ảnh để upload.',
            'image.mimes' => 'File ảnh chỉ chứa đuôi mở rộng là *JPEG, *.JPG, *.PNG',
            'khoahoc_luyenthi.required' => 'Vui lòng chọn Khóa học - Luyện thi',
            'content.required' => 'Vui lòng nhập vào nội dung của bài viết'
        ];

        $validate = Validator::make($req->all(), $rules, $mess);
        if($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate);
        }

        $curPost = posts::findOrFail($id);

        // Nếu bài viết đang sửa có hỉnh ảnh.
        if(isset($curPost->urlHinh)) {
            // Ngược lại có upload ảnh mới thay thế ảnh cũ.
            if($req->hasFile('image')) {

                // Nếu có upload hình ảnh lên thì upload lên server và lưu đường dẫn hình ảnh xuống DB.
                // Nếu bài viết có hình ảnh tượng trưng thì xóa hình ảnh trong folder của server.
                if($curPost->urlHinh) {
                    unlink(base_path() . '/../uploads/images/' . $curPost->urlHinh);
                }

                $file = $req['image'];
                $path = 'uploads/images';

                $needToSave = time() . '.' . $file->getClientOriginalExtension();
                $file->move($path, $needToSave);

                $curPost->urlHinh = $needToSave;
            }
        } else {
            if($req->hasFile('image')) {
                $file = $req['image'];
                $path = 'uploads/images';

                $needToSave = time() . '.' . $file->getClientOriginalExtension();

                $file->move($path, $needToSave);

                $curPost->urlHinh = $needToSave;
            }
        }

        $curPost->title = $req['title'];
        $curPost->idUser = Auth::user()->id;
        $curPost->idKhoaHoc_LuyenThi = $req['khoahoc_luyenthi'];
        $curPost->content = $req['content'];

        $curPost->save();

        \Session::flash("upload-post-success", [
            "level"     => "success",
            "message"   => "Chỉnh sửa bài viết thành công."
        ]);
        return redirect('admin/post/list');
    }
}
