@extends('front_end.pages.master')
@section('title', 'Đăng ký')

@section('content')
    <div class="row">
    	<div class="col-md-6">
    		<div class="well">
		    	<div class="widget-title">
			        <h2>đăng ký</h2>
			        <hr>
			    </div>
			    <div class="alert alert-success">
			    	<span class="fa fa-warning"></span><strong> Lưu ý! </strong>đọc kỹ hướng dẫn phía bên phải để có thể đăng nhập và xem full nội dung bài viết.
			    </div>
			    <form method="POST">
			    	@csrf
			    	<div class="form-group">
			    		<label for="user"><span class="fa fa-user-o"></span> Tên tài khoản:</label>
			    		<input type="text" class="form-control" placeholder="Tên tài khoản" required="true" value="{{ old('username') }}" name="username">
			    	</div>
			    	@if(session('errorUsername'))
			        <div class="alert alert-danger">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			            <strong>Thông báo</strong> {{ session('errorUsername') }}
			        </div>
			        @endif
					@if($errors->has('username'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('username') }}
					</div>
					@endif
					

			    	<div class="form-group">
			    		<label for="password"><span class="fa fa-key"></span> Mật khẩu: </label>
			    		<input type="password" class="form-control" placeholder="Mật khẩu" required="true" value="{{ old('password') }}" name="password">
			    	</div>
			    	@if($errors->has('password'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('password') }}
					</div>
					@endif

			    	<div class="form-group">
			    		<label for="re-password"><span class="fa fa-key"></span> Nhập lại mật khẩu: </label>
			    		<input type="password" class="form-control" placeholder="Nhập lại mật khẩu" required="true" value="{{ old('re-password') }}" name="re-password">
			    	</div>
			    	@if($errors->has('re-password'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('re-password') }}
					</div>
					@endif

			    	<div class="form-group">
			    		<label for="name"><span class="fa fa-pencil"></span> Tên: </label>
			    		<input type="text" class="form-control" placeholder="Tên" required="true" value="{{ old('name') }}" name="name">
			    	</div>
			    	@if($errors->has('name'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('name') }}
					</div>
					@endif

			    	<div class="form-group">
			    		<label for="email"><span class="fa fa-envelope"></span> Email: </label>
			    		<input type="email" class="form-control" placeholder="Email" required="true" value="{{ old('email') }}" name="email">
			    	</div>
			    	@if($errors->has('email'))
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>Thông báo!</strong> {{ $errors->first('email') }}
					</div>
					@endif
			    	<div class="form-group">
			    		<label for="fb"><span class="fa fa-facebook-f"></span> Link facebook: </label>
			    		<input type="text" class="form-control" placeholder="Copy link facebook cá nhân và paste vào ô này." required="true" value="{{ old('link_fb') }}" name="link_fb">
			    	</div>
			    	<div class="form-group">
			    		<input type="submit" class="btn btn-success" value="Đăng ký">
			    		<input type="reset" class="btn btn-danger" value="Reset">
			    	</div>
			    </form>
		   </div>
	    </div>
	    <div class="col-md-6">
	    	<div class="well">
	    		@if($content->urlHinh)
	    		<img src="{{ asset('uploads/intro_register') . '/' . $content->urlHinh }}" width="100%">
	    		@endif
	    		<hr>
	    		{!! $content->content !!}
	    	</div>
	    </div>
    </div>
@endsection