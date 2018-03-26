<?php
	function changeColorWords($str, $keywords) {
		return str_replace($keywords, "<span style='background-color: yellow;'>$keywords</span>", $str);
	}
?>

@extends('front_end.pages.master')
@section('title', 'Kết quả tìm kiếm')

@section('content')
	<div class="row">
		<div class="col-md-9">
			@if(!count($result))
				<div class="alert alert-danger">
					<strong>Thông báo!</strong> Không tìm thấy kết quả với từ khóa <code>{{ $keywords }}</code>
				</div>
				<form action="{{ URL::route('search') }}" method="GET">
					<hr>
					<label for="search"><span class="fa fa-search"></span> Tìm kiếm</label>
					<div class="input-group">
						<input type="text" class="form-control" id="fucking_milions" required="true" name="keywords" value="{{ old('keywords') }}" placeholder="Nhập vào từ khóa để tìm kiếm">
						<div class="input-group-btn">
							<button class="btn btn-default" type="submit">
								<i class="fa fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			@else
				<div class="alert alert-success">
					<strong>Kết quả!</strong> Có {{ count($result) }} kết quả được tìm thấy.
				</div>
				@foreach($result as $val) 
				<div class="box-tin-tuc">
					<div class="header-tintuc">
						<img src="{{ isset($val->urlHinh) ? asset('uploads/images').'/'.$val->urlHinh : null }}" id="tinnoibat">
					</div>
					<div class="body-tintuc">
						<a href="{{ URL::route('post.detail', ['id' => $val->id]) }}" class="title-tintuc">{{ $val->title }}</a>
						<div style="margin-top: 7px; margin-bottom: 7px;">
							<a href="{{ URL::route('profileUser', ['id' => $val->idUser]) }}" style="margin-right: 20px;"><span class="fa fa-user"></span> <kbd>{{ changeColorWords($val->user->username, $keywords) }}</kbd></a>
							<span class="fa fa-clock-o"></span> <kbd>{{ isset($val->created_at) ? $val->created_at->format('d/m/Y') : null }}</kbd>
						</div>
						<div class="line"></div>
						{!! changeColorWords(substr($val->content, 0, 500), $keywords) . '........' !!}
						<div class="readmore clearfix">
							<a href="{{ URL::route('post.detail', ['id' => $val->id]) }}" class="btn btn-primary">Đọc tiếp »</a>
						</div>
					</div>
				</div>
				@endforeach
			@endif
		</div>
		<div class="col-md-3">
			@include ('front_end.pages.sidebar-right.sidebar-right')
		</div>
	</div>
@endsection