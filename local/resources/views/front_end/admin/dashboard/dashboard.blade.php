@extends('front_end.admin.master')
@section('title', 'Dashboard')

@section('header-admin-home', 'Dashboard')

@section('content')
	<div class="row">
		<div class="col-md-9">
			@if(session()->has('Flash_session.message'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{ session(Flash_session.message) }}
			</div>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="fa fa-folder"></span> Thống kê bài viết.
			</div>
			<div class="panel-body">
				<p>Hiện đang có <b>{{ count($totalPost) }}</b> bài viết trên website.</p>
				<a href="{{ URL::route('admin.post.list') }}" class="btn btn-primary pull-right">Chi tiết <span class="fa fa-arrow-circle-right"></span></a>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="fa fa-user"></span> Thống kê số lượng tài khoản
			</div>
			<div class="panel-body">
				<li>Có <b>{{ count($users_actived) }}</b> tài khooản đã kích hoạt.</li>
				<li>Có <b>{{ count($users_not_active) }}</b> tài khoản chưa kích hoạt.</li>
				<a href="{{ URL::route('admin.users.list') }}" class="btn btn-primary pull-right">Chi tiết <span class="fa fa-arrow-circle-right"></span></a>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="fa fa-image"></span> Thống kê số lượng hình ảnh nổi bật
			</div>
			<div class="panel-body">
				<p>Hiện đang có <b>{{ count($image) }}</b> hình ảnh.</p>
				<a href="{{ URL::route('admin.image.list') }}" class="btn btn-primary pull-right">Chi tiết <span class="fa fa-arrow-circle-right"></span></a>
			</div>
		</div>
	</div>
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<span class="fa fa-eye"></span> Tài khoản đang online
			</div>
			<div class="panel-body">
				<div class="alert alert-warning">
					<strong><span class="fa fa-warning"></span> Thông báo! </strong>
					<hr>
					<li>Hiển thị những người đang online, lúc online thì cập nhật ngay lập tức, nhưng lúc offline hoặc không làm gì ở website <strong>1</strong> phút, thì <strong>1</strong> phút sau mới update ở bảng này.</li>
					<li>Muốn update lại danh sách online, nhấn <kbd>F5</kbd></li>
				</div>
				@if(count($users_actived))
				@foreach($users_actived as $val)
					@if($val->isOnline())
					<span class="fa fa-circle" style="color: green;"></span> {{ $val->name }} <br>
					@endif
				@endforeach
				@endif
			</div>
		</div>
	</div>
	</div>
@endsection