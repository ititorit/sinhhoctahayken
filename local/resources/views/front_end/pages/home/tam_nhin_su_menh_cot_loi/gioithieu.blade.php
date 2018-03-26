<div class="row">
	<hr>
	<div class="widget-title">
		<h2>
			<span>Giới thiệu</span>
		</h2>
	</div>
<div class="" style="text-align: center; margin-bottom: 20px;">
	<span class="line-child"></span> <span class="fa fa-globe"></span> <span class="line-child"></span>
</div>
	<div class="col-md-4">
		<div class="box-tam-nhin">
			<a href="javascript:void(0)" class="boxgioithieu"><b><h4 style="text-transform: uppercase;">{{ $tamnhin->title }}</h4></b></a>
			<hr>
			<div class="noidung">
				{!! $tamnhin->content !!}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box-su-menh">
			<a href="javascript:void(0)" class="boxgioithieu"><b><h4 style="text-transform: uppercase;">{{ $sumenh->title }}</h4></b></a>
			<hr>
			<div class="noidung">
				{!! $sumenh->content !!}
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="box-cot-loi">
			<a href="#" class="boxgioithieu"><b><h4 style="text-transform: uppercase;">{{ $cotloi->title }}</h4></b></a>
			<hr>
			<div class="noidung">
				{!! $cotloi->content !!}
			</div>
		</div>
	</div>
</div>