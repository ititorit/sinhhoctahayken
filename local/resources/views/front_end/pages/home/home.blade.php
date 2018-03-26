@extends('front_end.pages.master')
@section('title', 'Trang chủ')

@section('carousel')
	@include ('front_end.pages.home.carousel.carousel')
@endsection

@section('content')
	
	@include ('front_end.pages.home.tam_nhin_su_menh_cot_loi.gioithieu')

	@include ('front_end.pages.home.khoahoc.khoahoc_luyenthi')

	@include ('front_end.pages.home.tinnoibat.tinnoibat')
@endsection

@section('images_library')
    @include ('front_end.pages.home.thuvienhinhanh.thuvienhinhanh')
@endsection