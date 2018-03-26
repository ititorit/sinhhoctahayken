@extends('front_end.pages.master')
@section('title', 'Quên mật khẩu.')
@section('content')
	<div class="col-md-6 col-md-offset-3">
		@if(session('danger'))
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Thông báo! </strong>{{ session('danger') }}
		</div>
		@endif
		<form action="{{ url('password/reset') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" name="email">
			</div>
			@if($errors->has('email'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo! </strong>{{ $errors->first('email') }}
			</div>
			@endif

			<div class="form-group">
				<label for="password">Mật khẩu mới.:</label>
				<input type="password" class="form-control" name="password">
			</div>
			@if($errors->has('password'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo! </strong>{{ $errors->first('password') }}
			</div>
			@endif

			<div class="form-group">
				<label for="re-password">Nhập lại mật khẩu mới:</label>
				<input type="password" class="form-control" name="re-password">
			</div>
			@if($errors->has('re-password'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo! </strong>{{ $errors->first('re-password') }}
			</div>
			@endif

			<div class="form-group">
				<button class="btn btn-primary" type="submit">Cập nhật mật khẩu.</button>
			</div>
		</form>
	</div>
@endsection