@extends('front_end.pages.master')
@section('title', 'Liên hệ')

@section('content')
    <div class="box-tin-tuc">
        <div class="body-tintuc">
            <div class="widget-title">
                trung tâm luyện thi đại học sinh học thầy ken
                <div class="line" style="margin-top: 10px;"></div>
            </div>
            <p><span class="fa fa-taxi"></span> Địa chỉ: {{ $contact->address }}</p>
            <p><span class="fa fa-envelope"></span> Email: {{ $contact->email }}</p>
            <p><span class="fa fa-link"></span> Website: <a href="#">{{ $contact->website }}</a></p>
            <p><span class="fa fa-phone"></span> Hotline: {{ $contact->number_phone }}</p>
            <div class="line"></div>
            <p>Mọi thông tin các bạn có thể liên hệ <a href="{{ $contact->link_fanpage }}" target="_blank">FANPAGE</a> facebook để được giải đáp mọi thắc mắc.</p>
        </div>
    </div>
@endsection