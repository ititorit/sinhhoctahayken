@extends('front_end.pages.master')
@section('title', 'Thay đổi mật khẩu')

@section('content')
	<div class="col-md-6 col-md-offset-3">
    	<div class="widget-title">
	        <h2>Thay đổi mật khẩu :: {{ $user->name }}</h2>
	        <hr>
	    </div>
	    @if(session('danger'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo!</strong> {{ session('danger') }}
		</div>
		@endif
	    <form method="POST">
	    	@csrf
	    	<div class="form-group">
	    		<label for="oldPass"><span class="fa fa-key"></span> Mật khẩu cũ:</label>
	    		<input type="password" class="form-control" placeholder="Nhập mật khẩu để tiếp tục" required="true" value="{{ old('old-password') }}" name="old-password">
	    	</div>
			@if($errors->has('old-password'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{ $errors->first('old-password') }}
			</div>
			@endif

	    	<div class="form-group">
	    		<label for="newPass"><span class="fa fa-key"></span> Mật khẩu mới:</label>
	    		<input type="password" class="form-control" placeholder="Mật khẩu mới" required="true" value="{{ old('password') }}" name="password">
	    	</div>
	    	@if($errors->has('password'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{ $errors->first('password') }}
			</div>
			@endif

	    	<div class="form-group">
	    		<label for="re-newPass"><span class="fa fa-key"></span> Nhập lại mật khẩu mới:</label>
	    		<input type="password" class="form-control" placeholder="Nhập lại mật khẩu mới" required="true" value="{{ old('re-password') }}" name="re-password">
	    	</div>
	    	@if($errors->has('re-password'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{ $errors->first('re-password') }}
			</div>
			@endif


	    	<div class="form-group">
	    		<input type="submit" class="btn btn-success" value="Cập nhật">
	    	</div>
	    </form>
    </div>
@endsection