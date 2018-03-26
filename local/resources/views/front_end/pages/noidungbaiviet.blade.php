@extends('front_end.pages.master')
@section('title', 'Nội dung bài viết')

@section('content')
    <div class="row">
    	<div class="col-md-9">
	    	<div class="box-tin-tuc">
		    	<div class="header-tintuc">
		    		<img src="{{ isset($post->urlHinh) ? asset('uploads/images').'/'.$post->urlHinh : null }}" id="tinnnoibat" style="width:100%;">
		    	</div>
		    	<div class="body-tintuc">
		    		<h2 class="widget-title">
		    			{{ $post->title }}
		    		</h2>
		    		<div style="margin-top: 7px; margin-bottom: 7px;">
						<a href="{{ URL::route('profileUser', ['id' => $post->idUser]) }}" style="margin-right: 20px;"><span class="fa fa-user"></span> {{ $post->user->username }}</a>
						<span class="fa fa-clock-o"></span> {{ isset($post->created_at) ? $post->created_at->format('d/m/Y') : null }}
					</div>
					<div class="line"></div>

					<!-- Nội dung bài viết -->
					@if(Auth::check())
						{!! $post->content !!}
					@else
						{!! substr($post->content, 0, 1500) !!}
						<div class="alert alert-danger">
							<strong>Thông báo!</strong> Bạn phải đăng nhập để có thể đọc hết nội dung của bài viết này.<br> <br>
							<li>Nếu đã có tài khoản click <a href="{{ URL::route('login') }}" class="btn btn-danger btn-xs" target="_blank"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li> <br>
							<li>Nếu chưa có tài khooản click <a href="{{ URL::route('register') }}" class="btn btn-success btn-xs" target="_blank"><span class="fa fa-user"></span> Đăng ký</a></li>
						</div>
					@endif
					<!-- /Nội dung bài viết -->
		    	</div>
		    </div>
	    </div>
	    <div class="col-md-3">
	    	@include ('front_end.pages.sidebar-right.sidebar-right')
	    </div>
    </div>
    <div class="row">
		<div class="col-md-9">
			<hr>
			<h2 class="widget-title">
				<p>bài viết liên quan</p>
				<div class="line"></div>
			</h2>
		</div>
	</div>
    <div class="row">
    	<!-- Bài viết liên quan -->
    	@if(count($postLienQuan))
	    	@foreach($postLienQuan as $val)
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body">
		                <img src="{{ isset($val->urlHinh) ? asset('uploads/images').'/'.$val->urlHinh : null }}" id="tinnnoibat" style="width:100%;"><hr>
		                <div class="title-tintuc">
		                    <a href="{{ URL::route('post.detail', ['id' => $val->id]) }}">{{ $val->title }}</a>
		                    <div class="line"></div>
		                </div>
		                {!! substr($val->content, 0, 150) !!}
					</div>
					<div class="panel-footer clearfix">
						<a href="{{ URL::route('post.detail', ['id' => $val->id]) }}" class="btn btn-primary pull-right">Đọc tiếp »</a>
					</div>
				</div>
			</div>
			@endforeach
		@else
			<div class="col-md-9">
				<div class="alert alert-danger">
					<strong>Thông báo!</strong> Không có bài viết liên quan.
				</div>
			</div>
		@endif
		<!-- /Bài viết liên quan -->
    </div>
@endsection