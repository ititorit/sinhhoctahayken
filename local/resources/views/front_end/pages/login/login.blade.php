@extends('front_end.pages.master')
@section('title', 'Đăng nhập')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="well">
                <div class="widget-title">
                    <h2>đăng nhập</h2>
                    <hr>
                </div>
                @if(session('errorLogin'))
                <div class="alert alert-danger">
                    <strong>Thông báo</strong> {{ session('errorLogin') }}
                </div>
                @endif
                <form method="post">
                    @csrf
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" required="true" placeholder="Email">
                    </div>

                    <div class="input-group" style="margin-top: 20px;">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary" value="Đăng nhập" style="margin-top: 20px;">
                </form>
                <!-- <div style="margin-top: 10px;">
                    <a href="{{ URL::route('password.reset') }}"><span class="fa fa-key"></span> Quên mật khẩu</a>
                </div> -->
                <hr>
                <a href="{{ route('register') }}"><span class="fa fa-user-o"> </span> Đăng ký tài khoản.</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="well">
                @if($content->urlHinh)
                <img src="uploads/intro_register/{{$content->urlHinh}}" width="100%">
                @endif
                <hr>
                {!! $content->content !!}
            </div>
        </div>
    </div>
@endsection