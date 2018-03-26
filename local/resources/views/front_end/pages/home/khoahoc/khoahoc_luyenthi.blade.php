<hr>
<div class="widget-title">
	<h2>
		<span>khóa học</span>
	</h2>
</div>
<div class="" style="text-align: center; margin-bottom: 20px;">
	<span class="line-child"></span> <span class="fa fa-graduation-cap"></span> <span class="line-child"></span>
</div>
	<?php $cnt = 0; ?>
	@foreach($khoahoc_luyenthi as $val)
	<?php if($cnt % 3 == 0) { ?>
	<div class="row">
	<?php } ?>
	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading">
				<a href="#" class="title-tintuc">{{$val->title}}</a>
			</div>
			<div class="panel-body">
				<div>{!! $val->content !!}</div>
				<a href="{{ URL::route('list.postByCategory', ['name_without_accent' => $val->id]) }}" class="btn btn-primary pull-right">Xem thêm</a>
				<!-- <a href="" class="btn btn-primary pull-right">Xem thêm</a> -->
			</div>
		</div>
	</div>
	<?php ++ $cnt; if($cnt % 3 == 0) { ?>
		</div>
	<?php } ?>
	@endforeach
	<?php if($cnt % 3) {?>
	</div>
	<?php } ?>