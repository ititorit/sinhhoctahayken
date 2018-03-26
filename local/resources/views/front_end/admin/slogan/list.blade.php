@extends('front_end.admin.master')
@section('title', 'Quản lý slogan')
@section('header-admin-home', 'Quản lý Slogan')

@section('content')
	<div class="row">
		<div class="col-md-6">
			@if(session()->has('Flash_session.message'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{ session('Flash_session.message') }}
			</div>
			@endif
			@if(session()->has('danger.message'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{ session('danger.message') }}
			</div>
			@endif
			<form method="POST" enctype="multipart/form-data">
				@csrf
				@if($errors->has('uploadSlogan'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('uploadSlogan') }}
				</div>
				@endif
				<div class="form-group">
					<label for="uploadSlogan">Click vào upload để upload slogan mới.</label>
					<input type="file" name="uploadSlogan">
				</div>
				

				<div class="form-group">
					<button class="btn btn-primary" type="submit"><span class="fa fa-upload"></span> Upload</button>
				</div>
			</form>

			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align: center;">STT</th>
						<th style="text-align: center;">Hình ảnh</th>
						<th style="text-align: center;">Quản lý</th>
					</tr>
				</thead>
				<tbody>
					<?php $stt = 1; ?>
					@foreach($slogan as $val)
					<tr style="text-align: center;">
						<td><?php echo($stt); $stt++; ?></td>
						<td>
							<img src="uploads/slogan/{{ $val->urlHinh }}" width="200px">
						</td>
						<td>
							<div class="form-group">
								@if($val->status == 0)
								<a onclick="return confirm('Bạn có chắc chắn muốn áp dụng slogan này cho trang web không?')" href="{{ URL::route('admin.slogan.apply', ['id' => $val->id]) }}" class="btn btn-primary btn-xs"><span class="fa fa-check"></span> Apply</a>
								@elseif($val->status == 1)
								<a href="javascript:void(0)" class="btn btn-success btn-xs"><span class="fa fa-check"></span> Đang sử dụng</a>
								@endif
								@if(count($slogan) > 1 && $val->status == 0)
								<a onclick="return confirm('Bạn có chắc chắn muốn xóa slogan này không?')" href="{{ URL::route('admin.slogan.delete', ['id' => $val->id]) }}" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
								@endif
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
@endsection