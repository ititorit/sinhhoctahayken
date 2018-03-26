@extends('front_end.admin.master')
@section('title', 'Chỉnh sửa liên hệ')

@section('header-admin-home')
	Chỉnh sửa :: <kbd>Liên hệ</kbd>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6">
			@if(session()->has('Flash_session.message'))
			<div class="alert alert-success" id="thongbao">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{ session('Flash_session.message') }}
			</div>
			@endif
			<form method="POST">
				@csrf
				<div class="form-group">
					<label for="name"><span class="fa fa-taxi"></span> Địa chỉ: </label>
					<input type="text" class="form-control" name="name" value="{{ $contact->name }}" placeholder="Nhập vào địa chỉ.">
				</div>

				<div class="form-group">
					<label for="address"><span class="fa fa-taxi"></span> Địa chỉ: </label>
					<input type="text" class="form-control" name="address" value="{{ $contact->address }}" placeholder="Nhập vào địa chỉ.">
				</div>

				<div class="form-group">
					<label for="email"><span class="fa fa-envelope"></span> Email: </label>
					<input type="email" class="form-control" name="email" value="{{ $contact->email }}" placeholder="Nhập vào địa chỉ email.">
				</div>

				<div class="form-group">
					<label for="website"><span class="fa fa-globe"></span> Website: </label>
					<input type="text" class="form-control" name="website" value="{{ $contact->website }}" placeholder="Nhập vào địa chỉ website.">
				</div>

				<div class="form-group">
					<label for="number_phone"><span class="fa fa-taxi"></span> Số điện thoại: </label>
					<input type="text" class="form-control" name="number_phone" value="{{ $contact->number_phone }}" placeholder="Nhập vào số điện thoại">
				</div>

				<div class="form-group">
					<label for="link_fb"><span class="fa fa-facebook"></span> Địa chỉ fanpage-facebook: </label>
					<input type="text" class="form-control" name="link_fb" value="{{ $contact->link_fanpage }}" placeholder="Nhập vào địa chỉ facebook.">
				</div>

				<div class="form-group">
					<label for="link_youtube"><span class="fa fa-youtube"></span> Địa chỉ kênh youtube: </label>
					<input type="text" class="form-control" name="link_youtube" value="{{ $contact->link_youtube }}" placeholder="Nhập vào địa chỉ kênh youtube.">
				</div>

				<div class="form-group">
					<label for="link_fb"><span class="fa fa-google-plus"></span> Địa chỉ Google+: </label>
					<input type="text" class="form-control" name="link_google" value="{{ $contact->link_google }}" placeholder="Nhập vào địa chỉ google+.">
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary"><span class="fa fa-check"></span> Cập nhật</button>
				</div>
			</form>
		</div>
	</div>
@endsection