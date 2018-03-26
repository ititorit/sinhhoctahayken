@extends('front_end.admin.master')
@section('title', 'Quản lý bài viết')
@section('header-admin-home', 'Danh sách bài viết')

@section('content')
	<div class="form-group">
		<a href="{{ URL::route('admin.post.add') }}" class="btn btn-primary"><span class="fa fa-pencil"></span> Thêm bài viết</a>
	</div>
	@if(session()->has('upload-post-success.message'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo!</strong> {{ session('upload-post-success.message') }}
	</div>
	@endif
	@if(session()->has('delete-post-success.message'))
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo!</strong> {{ session('delete-post-success.message') }}
	</div>
	@endif
	@if(session()->has('error-title.message'))
	<div class="alert alert-danger">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo!</strong> {{ session('error-title.message') }}
	</div>
	@endif
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th style="text-align: center;">STT</th>
				<th style="text-align: center;">Tiêu đề</th>
				<th style="text-align: center;">Tóm tắt</th>
				<th style="text-align: center;">URL Hình</th>
				<th style="text-align: center;">Người viết</th>
				<th style="text-align: center;">Khóa học - luyện thi</th>
				<th style="text-align: center;">Ngày đăng</th>
				<th style="text-align: center;">Quản lý</th>
			</tr>
		</thead>
		<tbody>
			<?php $cnt = 1; ?>
			@foreach($posts as $val)
			<tr style="text-align: center;">
				<td><?php echo($cnt); $cnt++; ?></td>
				<td>{{ $val->title }}</td>
				<td>{!! substr($val->content, 0, 107) . '...' !!}</td>
				<td><img src="{{ isset($val->urlHinh) ? asset('uploads/images').'/'.$val->urlHinh : null }}" width="100px">
					@if(!$val->urlHinh)
					Không có hình ảnh
					@endif
				</td>
				<td><a href="{{ URL::route('profileUser', ['id' => $val->user->id]) }}" target="_blank">{{ $val->user->username }}</a></td>
				<td>{{ $val->khoahoc_luyenthi->title }}</td>
				<td>{{ isset($val->created_at) ? $val->created_at->format('d/m/Y') : 'update' }}</td>
				<td>
					@if(Auth::user()->id == $val->idUser || Auth::user()->role == 2)
					<a onclick="return confirm('Bạn có chắc chặn muốn sửa bài viết này không?')" href="{{ URL::route('admin.post.edit', ['id' => $val->id]) }}" class="btn btn-primary btn-xs"><span class="fa fa-edit"></span> Edit</a>
					<a onclick="return confirm('Bạn có chắc chặn muốn xóa bài viết này không?')" href="{{ URL::route('admin.post.delete', ['id' => $val->id]) }}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
					@else
					<p style="color: red;">
						Chưa đủ cấp độ
					</p>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $posts->render() }}
@endsection