@extends('front_end.admin.master')

@section('title', 'Danh sách hình ảnh')

@section('header-admin-home', 'Danh sách hình ảnh')

@section('content')
	<form method="POST" enctype="multipart/form-data">
		@csrf
		<div class="form-group">
			<label for="upload"><span class="fa fa-upload"></span> Upload ảnh</label>
			<input type="file" name="image">
		</div>
		@if($errors->has('image'))
		<div class="row">
			<div class="col-md-3">
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('image') }}
				</div>
			</div>
		</div>
		@endif
		<button class="btn btn-primary"><span class="fa fa-upload"></span> Upload</button>
	</form> <hr>
	{{ $listImage->render() }}
	<?php $cnt = 0; ?>
	@foreach($listImage as $val)
	<?php if($cnt % 4 == 0) { ?>
	<div class="row"> <?php } ?>
		<div class="col-md-3">
			<div class="panel panel-default">
				<div class="panel-body">
					<img src="{{ asset('uploads/hinhanhnoibat').'/'.$val->urlHinh }}" alt="Avatar" style="width:100%">
				</div>
				<div class="panel-footer clearfix">
					@if(Auth::user()->id == $val->idUser || Auth::user()->role == 2)
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh này không?')" href="{{ URL::route('admin.image.delete', ['id' => $val->id]) }}" class="btn btn-danger pull-right"><span class="fa fa-trash"></span> Delete</a>
					@endif
					<span class="fa fa-user-o"></span> {{ $val->user->username }}
				</div>
			</div>
		</div> <?php ++ $cnt; if($cnt % 4 == 0) { ?>
	</div>
	<?php } ?>
	@endforeach
	{{ $listImage->render() }}
@endsection