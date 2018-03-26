@extends('front_end.pages.master')
@section('title', 'Cập nhật thông tin')

@section('content')
	<div class="col-md-6 col-md-offset-3">
    	<div class="widget-title">
	        <h2>cập nhật thông tin :: {{ $user->name }}</h2>
	        <hr>
	    </div>
	    <form method="POST">
	    	@csrf
	    	<div class="form-group">
	    		<label for="user"><span class="fa fa-user-o"></span> Tên tài khoản:</label>
	    		<input type="text" class="form-control" placeholder="Tên tài khoản" disabled="true" required="true" value="{{ $user->username }}" name="username">
	    	</div>

	    	<div class="form-group">
	    		<label for="name"><span class="fa fa-pencil"></span> Tên: </label>
	    		<input type="text" class="form-control" placeholder="Tên" required="true" value="{{ $user->name }}" name="name">
	    	</div>

	    	<div class="form-group">
	    		<label for="email"><span class="fa fa-envelope"></span> Email: </label>
	    		<input type="email" class="form-control" placeholder="Email" disabled="true" value="{{ $user->email }}" name="email">
	    	</div>

	    	<div class="form-group">
	    		<label for="name"><span class="fa fa-taxi"></span> Địa chỉ: </label>
	    		<input type="text" class="form-control" placeholder="Địa chỉ" value="{{ isset($user->address) ? $user->address : null }}" name="address">
	    	</div>

			<div class="form-group">
	    		<label for="name"><span class="fa fa-phone"></span> Số điện thoại: </label>
	    		<input type="text" class="form-control" placeholder="Số điện thoại" value="{{ isset($user->number_phone) ? $user->number_phone : null }}" name="number_phone">
	    	</div>

			<div class="form-group">
	    		<label for="name"><span class="fa fa-graduation-cap"></span> Trường: </label>
	    		<input type="text" class="form-control" placeholder="Tên" value="{{ isset($user->school) ? $user->school : null }}" name="school">
	    	</div>

	    	<div class="form-group">
	    		<label for="fb"><span class="fa fa-facebook-f"></span> Link facebook: </label>
	    		<input type="text" class="form-control" placeholder="Copy link facebook cá nhân và paste vào ô này." required="true" value="{{ $user->link_fb }}" name="link_fb">
	    	</div>
	    	<div class="form-group">
	    		<input type="submit" class="btn btn-success" value="Cập nhật">
	    	</div>
	    </form>
    </div>
@endsection