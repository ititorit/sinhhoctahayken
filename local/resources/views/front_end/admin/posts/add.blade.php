@extends('front_end.admin.master')
@section('title', 'Thêm bài viết')
@section('header-admin-home', 'Thêm bài viết')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<form method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="title">Tiêu đề:</span></label>
					<input type="text" class="form-control" required="true" value="{{ old('title') }}" name="title" placeholder="Nhập vào tiêu đề của bài viết.">
				</div>
				@if($errors->has('title'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('title') }}
				</div>
				@endif
				
				<div class="form-group">
					<label for="img">Upload ảnh</label>
					<input type="file" name="image">
				</div>
				@if($errors->has('image'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('image') }}
				</div>
				@endif

				<div class="form-group">
				    <label for="khoahoc_luyenthi">Khóa học - Luyện thi:</label>
				    <select class="form-control" name="khoahoc_luyenthi">
						@foreach($khoahoc_luyenthi as $val)
			        	<option value="{{ $val->id }}">{{ $val->title }}</option>
						@endforeach
			      	</select>
				</div>
				
				@if($errors->has('content'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('content') }}
				</div>
				@endif
				<div class="form-group">
					<label for="content"><b>Nội dung bài viết</b></label>
					<textarea name="content" id="content-box">{{ old('content') }}</textarea>
					<script type="text/javascript">
						confi = {};
						confi.entities_latin = false;
						confi.language = 'vi';
						CKEDITOR.replace('content-box', confi);
					</script>
				</div>

				

				<div class="form-group">
					<button type="submit" class="btn btn-primary"><span class="fa fa-plus"></span> Thêm bài mới</button>
				</div>
			</form>
		</div>
	</div>
@endsection