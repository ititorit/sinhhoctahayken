@extends('front_end.pages.master')
@section('title', 'Danh sách bài viết')

@section('content')
	<div class="row">
		<div class="col-md-9">
			@if(count($listPost))
				@foreach($listPost as $val)
				<div class="box-tin-tuc">
					<div class="header-tintuc">
						<img src="{{ isset($val->urlHinh) ? asset('uploads/images').'/'.$val->urlHinh : null }}" id="tinnoibat">
					</div>
					<div class="body-tintuc">
						<a href="{{ URL::route('post.detail', ['id' => $val->id]) }}" class="title-tintuc">{{ $val->title }}</a>
						<div style="margin-top: 7px; margin-bottom: 7px;">
							<a href="{{ URL::route('profileUser', ['id' => $val->idUser]) }}" style="margin-right: 20px;"><span class="fa fa-user"></span> <kbd>{{ $val->user->username }}</kbd></a>
							<span class="fa fa-clock-o"></span> <kbd>{{ isset($val->created_at) ? $val->created_at->format('d/m/Y') : null }}</kbd>
						</div>
						<div class="line"></div>
						{!! substr($val->content, 0, 500) . '........' !!}
						<div class="readmore clearfix">
							<a href="{{ URL::route('post.detail', ['id' => $val->id]) }}" class="btn btn-primary">Đọc tiếp »</a>
						</div>
					</div>
				</div>
				@endforeach
				{{ $listPost->render() }}
			@else
				<div class="alert alert-warning">
					<strong><span class="fa fa-warning"></span> Thông báo! </strong> Chưa có bài viết để hiển thị.
				</div>
			@endif
		</div>
		<div class="col-md-3">
			@include ('front_end.pages.sidebar-right.sidebar-right')
		</div>
	</div>
@endsection