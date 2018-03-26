@extends('front_end.admin.master')
@section('title', 'Home :: Admin')

@section('header-admin-home')
    Home
@endsection

@section('content')
		<p>Bạn có thể quản lý website với tất cả các chức năng của thanh menu ở phía bên phải.</p>
		@if(session()->has('Flash_session.message'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo!</strong> {{ session('Flash_session.message') }}
		</div>
		@endif
@endsection