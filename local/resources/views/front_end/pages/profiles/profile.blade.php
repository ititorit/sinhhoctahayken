@extends('front_end.pages.master')
@section('title', 'Thông tin tài khoản')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h2 class="widget-title">
				<p>thông tin tài khoản :: {{ $user->username }}</p>
				<div class="line"></div>
			</h2>
			<table class="table table-hover">
				<tbody>
					<tr>
						<td><b>Tên tài khoản:</b> </td>
						<td>{{ $user->username }}</td>
					</tr>
					<tr>
						<td><b>Tên: </b></td>
						<td>{{ $user->name }}</td>
					</tr>
					<tr>
						<td><b>Email: </b></td>
						<td>{{ $user->email }}</td>
					</tr>
					<tr>
						<td><b>Địa chỉ: </b></td>
						<td>
							{{ $user->address ? $user->address : 'Chưa cập nhật'}}
						</td>
					</tr>
					<tr>
						<td><b>Số điện thoại: </b></td>
						<td>
							{{ $user->number_phone ? $user->number_phone : 'Chưa cập nhật'}}
						</td>
					</tr>
					<tr>
						<td><b>Trường học: </b></td>
						<td>{{ $user->school ? $user->school : 'Chưa cập nhật'}}</td>
					</tr>
					<tr>
						<td><b>Link facebook: </b></td>
						<td>
							<?php 
							if(isset($user->link_fb)) {
								?>
								<a href="{{ $user->link_fb }}" target="_blank">{{ $user->link_fb }}</a>
								<?php
							} else {
								echo "Chưa cập nhật";
							}
							?>
						</td>
					</tr>
				</tbody>
			</table>
			
			@if(Auth::check())
			@if(Auth::user()->id == $user->id)
			<div class="btn-group">
			    <button type="button" class="btn btn-primary dropdown-toggle" id="btn-group-edit-profile" data-toggle="dropdown">Tùy chọn thông tin tài khoản <span class="caret"></span></button>
			    <ul class="dropdown-menu" role="menu">
			        <li><a href="{{ route('updateInfo', ['id' => Auth::user()->id]) }}">Cập nhật thông tin tài khoản</a></li>
			        <li><a href="{{ route('changepassword', ['id' => Auth::user()->id]) }}">Thay đổi mật khẩu</a></li>
			    </ul>
			</div>
			@endif
			@endif
		</div>
	</div>
@endsection