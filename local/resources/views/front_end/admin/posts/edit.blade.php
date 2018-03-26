@extends('front_end.admin.master')
@section('title', 'Chỉnh sửa bài viết')
@section('header-admin-home', 'Chỉnh sửa bài viết')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<form method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="title">Tiêu đề:</span></label>
					<input type="text" class="form-control" required="true" name="title" value="{{ $post->title }}" placeholder="Nhập vào tiêu đề của bài viết.">
				</div>
				@if($errors->has('title'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('title') }}
				</div>
				@endif
				
				<div class="form-group">
					<label for="img">Upload ảnh</label>
					<input type="file" name="image" value="{{ $post->urlHinh }}">
				</div>
				@if($errors->has('image'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo! </strong> {{ $errors->first('image') }}
				</div>
				@endif

				<div class="form-group">
					<label>Ảnh tiêu đề của bài viết</label>
					@if(isset($post->urlHinh))
					<div><img src="{{ asset('uploads/images').'/'.$post->urlHinh }}" alt="{{ $post->urlHinh }}" width="30%;"></div>
					@else
					<kbd>Không có hình ảnh.</kbd>
					@endif
				</div>
				

				<div class="form-group">
				    <label for="khoahoc_luyenthi">Khóa học - Luyện thi:</label>
				    <select class="form-control" name="khoahoc_luyenthi">
						@foreach($khoahoc_luyenthi as $val)
			        	<option
						@if($val->id == $post->idKhoaHoc_LuyenThi)
						{{ "selected" }}
						@endif
			        	value="{{ $val->id }}">{{ $val->title }}</option>
						@endforeach
			      	</select>
				</div>

				<div class="form-group">
					<label for="content"><b>Nội dung bài viết</b></label>
					<textarea name="content" id="content-box">{!! $post->content !!}</textarea>
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
					<button type="submit" class="btn btn-primary"><span class="fa fa-check"></span> Chỉnh sửa bài viết</button>
				</div>
			</form>
		</div>
	</div>
@endsection