@extends('front_end.pages.master')

@section('title', 'Danh sách hình ảnh.')

@section('content')
	<h4><span class="fa fa-image"></span> DANH SÁCH HÌNH ẢNH</h4>
	@if(count($images))
		<?php $cnt = 0; ?>
		{{ $images->render() }}
		@foreach($images as $val)
			<?php if($cnt % 4 == 0) { ?>
			<hr>
			<div class="row">
			<?php } ?>
				<div class="col-md-3">
					<a href="{{ asset('uploads/hinhanhnoibat').'/'.$val->urlHinh }}" target="_blank" ><img style="border: 3px solid #002858;" src="{{ asset('uploads/hinhanhnoibat').'/'.$val->urlHinh }}" alt="" width="100%" data-toggle="tooltip" data-placement="bottom" title="Click vào ảnh để xem!"></a>
				</div>
			<?php $cnt++; if($cnt % 4 == 0) { ?>
			</div>
			<?php } ?>
		@endforeach
		<?php if($cnt % 4) { ?>
		</div>
		<?php } ?>

		{{ $images->render() }}
	@else
	<div class="alert alert-warning">
		<strong>Thông báo! </strong>Chưa có hình ảnh nổi bật nào.
	</div>
	@endif
@endsection

@section('script')
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
@endsection