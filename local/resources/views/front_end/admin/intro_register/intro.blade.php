@extends('front_end.admin.master')
@section('title', 'Chỉnh sửa nội dung giới thiệu')

@section('header-admin-home')
    	</span> Chỉnh sửa :: <kbd>Giới thiệu đăng ký</kbd>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6">
			@if(session()->has('Flash_session.message'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{ session('Flash_session.message') }}
			</div>
			@endif
			<form method="POST" enctype="multipart/form-data">
				@csrf
				
				<div class="form-group">
					<label for="image">Upload ảnh</label>
					<input type="file" name="image" value="{{ $res->urlHinh }}">
					<hr>
				</div>

				@if($errors->has('image'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('image') }}
				</div>
				@endif

				<div class="form-group">
					<label>Ảnh tiêu đề của box</label>
					@if(isset($res->urlHinh))
					<div><img src="{{ asset('uploads/intro_register').'/'.$res->urlHinh }}" alt="{{ $res->urlHinh }}" width="30%;"></div>
					@else
					<br><kbd>Không có hình ảnh.</kbd> <hr>
					@endif
				</div>

				<div class="form-group">
					<label for="content"><span class="fa fa-font"></span> Nhập vào nội dung: </label>
					<textarea name="content" id="content-box">{!! isset($res->content) ? $res->content : null !!}</textarea>
					<script type="text/javascript">
						confi = {};
						confi.entities_latin = false;
						confi.language = 'vi';
						CKEDITOR.replace('content-box', confi);
					</script>
				</div>
				@if($errors->has('content'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('content') }}
				</div>
				@endif

				<div class="form-group">
					<button class="btn btn-primary" type="submit">
						<span class="fa fa-check"></span>
						Cập nhật
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection