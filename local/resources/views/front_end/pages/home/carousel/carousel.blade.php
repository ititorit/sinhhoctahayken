@if(count($hinhanhnoibat))
<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		        <li data-target="#myCarousel" data-slide-to="1"></li>
		        <li data-target="#myCarousel" data-slide-to="2"></li>
		    </ol>
		    <!-- Wrapper for slides -->
		    
		    <div class="carousel-inner">
		    	<?php $cnt = 0; ?>
		    	@foreach($hinhanhnoibat as $val)
		        <div class="item <?php if($cnt == 0) {echo 'active'; ++ $cnt;} ?>">
		            <img src="uploads/hinhanhnoibat/{{$val->urlHinh}}" alt="Los Angeles" style="width:100%;">
		        </div>
		        @endforeach
		    </div>
		   
		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left"></span>
			    <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right"></span>
			    <span class="sr-only">Next</span>
		    </a>
		</div>
@else
<div class="alert alert-warning">
	<strong><span class="fa fa-warning"></span> Thông báo! </strong>Chưa có hình ảnh để hiển thị.

	@if(Auth::check() && Auth::user()->role == 2)
	<a href="{{ URL::route('admin.image.list') }}" target="_blank"><span class="fa fa-upload"></span> Click vào đây để upload.</a>
	@endif
</div>
@endif