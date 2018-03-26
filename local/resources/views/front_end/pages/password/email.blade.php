@extends('front_end.pages.master')
@section('title', 'Quên mật khẩu.')
@section('content')
	<div class="col-md-6 col-md-offset-3">
		@if(session('status'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo!</strong> {{ session('status') }}
		</div>
		@endif
		<form action="{{ url('password/email') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" name="email" placeholder="Nhập vào email của bạn để thay đổi mật khẩu.">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Gửi link reset</button>
			</div>
		</form>
	</div>
@endsection