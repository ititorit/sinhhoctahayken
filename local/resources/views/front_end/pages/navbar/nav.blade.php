<nav class="navbar navbar-default" role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand-modify" href="{{ route('home') }}"> <img src="{{ asset('uploads/slogan').'/'.$slogan->urlHinh }}" alt=""> </a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{ route('home') }}">Trang chủ</a></li>
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Giới thiệu <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ route('contact') }}">Liên hệ</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Các khoá học <b class="caret"></b></a>
						<ul class="dropdown-menu">
							@foreach($khoahoc_luyenthi as $val)
							<li><a href="{{ URL::route('list.postByCategory', ['name_without_accent' => $val->id]) }}">{{$val->title}}</a></li>
							@endforeach
						</ul>
					</li>
					<li><a href="{{ route('news') }}">Tin tức</a></li>
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">Thư viện <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="{{ URL::route('image.list') }}">Hình ảnh & video</a></li>
						</ul>
					</li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if(!Auth::check())
      				<li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-log-in"></span> Đăng ký</a></li>
					<li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>
					@else
					<li class="dropdown">
						<a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }} <b class="caret"></b></a>
						<ul class="dropdown-menu">
							@if(Auth::user()->role >= 1)
							<li><a href="{{ route('admin.home') }}" target="_blank">Trang admin</a></li>
							@endif
							<li><a href="{{ route('profileUser', ['id' => Auth::user()->id]) }}">My profile</a></li>
							<li><a href="{{ route('logout') }}">Đăng xuất</a></li>
						</ul>
					</li>
					@endif
				</ul>
			</div> <!-- /.navbar-collapse -->
		</div>
	</nav>