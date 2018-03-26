<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title')</title>
	<base href="{{ asset('') }}">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<script src="js/jquery.min.js"></script>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	<meta name="csrf-token" content="{{csrf_token()}}">
	<script language='JavaScript1.2'>
	function disableselect(e){return false}function reEnable(){return true}document.onselectstart = new Function ("return false");if (window.sidebar){document.onmousedown = disableselect;document.onclick = reEnable}var message="Function Disabled!";function clickIE4(){if(event.button==2){return false}}function clickNS4(e){if(document.layers||document.getElementById&&!document.all){if(e.which==2||e.which==3){return false}}}if(document.layers){document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS4}else if(document.all&&!document.getElementById){document.onmousedown=clickIE4}document.oncontextmenu=new Function("return false");</script>
</head>
<body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&autoLogAppEvents=1&version=v2.12&appId=192934957960828';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	
	<!-- Introduction -->
	@include ('front_end.pages.introduction.intro')
	<!-- /Introduction -->

	<!-- navbar -->
	@include ('front_end.pages.navbar.nav')
	<!-- /navbar -->
	
	<div class="container normal">

		@if(session('success'))
        <div class="alert alert-success" id="thongbao">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Thông báo! </strong>{{session('success')}}</div>
        @endif
        
		<!-- Carousel -->
		@yield('carousel')
		<!-- /Carousel -->

		<!-- Main -->
		@yield('content')
		<!-- /Main -->

		<!-- Thư viện hình ảnh -->
		@yield('images_library')
		<!-- /Thư viện hình ảnh -->

	</div>

	
	
	<!-- Footer -->
	@include ('front_end.pages.footer.footer')
	<!-- /Footer -->
	<div class="fa fa-chevron-up fa-2x back-to-top"></div>

	<script>
        $(document).ready(function (){var btt = $('.back-to-top');btt.hide();var amountScrolled = 300;$(window).scroll(function (){if ($(window).scrollTop() > amountScrolled){btt.fadeIn('slow')}else{btt.fadeOut('slow')}});$('.back-to-top').on('click',function(){$('html,body').animate({scrollTop:0},500)})
        $('#thongbao').delay(2000).slideUp();
    });
    </script>
	@yield('script')
</body>
</html>