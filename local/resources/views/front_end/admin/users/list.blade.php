@extends('front_end.admin.master')
@section('title', 'Danh sách tài khoản')

@section('header-admin-home', 'Danh sách tài khoản đã kích hoạt')

@section('content')
	<div class="row">
		<div class="col-md-10">
			@if(session('success'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo! </strong>{{ session('success') }}
			</div>
			@endif
			<div class="form-group">
				<div class="input-group">
				    <input type="text" class="form-control" id="searchUser" placeholder="Nhập vào bất kỳ thông tin để tìm kiếm.">
				    <div class="input-group-btn">
				      	<button class="btn btn-default" type="submit">
				        	<i class="glyphicon glyphicon-search"></i>
				      	</button>
				    </div>
				</div>
			</div>
			<table class="table table-bordered table-hover table-re">
				<thead>
					<tr>
						<th style="text-align: center;">STT</th>
						<th style="text-align: center;">Tên tài khoản</th>
						<th style="text-align: center;">Tên</th>
						<th style="text-align: center;">Địa chỉ</th>
						<th style="text-align: center;">Số điện thoại</th>
						<th style="text-align: center;">Trường</th>
						<th style="text-align: center;">Email</th>
						<th style="text-align: center;">Link facebook</th>
						@if(Auth::user()->role == 2)
						<th style="text-align: center;">Quản lý</th>
						@endif
					</tr>
				</thead>
				<tbody id="myTable">
					<?php $cnt = 1; ?>
					@foreach($users_actived as $val)
					@if($val->active == 1)
					<tr style="text-align: center;">
						<td><?php echo $cnt; $cnt++ ?></td>
						<td>
							@if($val->role == 2)
								<span class="fa fa-user-secret" style="color: red;"></span>
							@elseif($val->role == 1)
								<span class="fa fa-user-md" style="color: green;"></span>
							@else
								<span class="fa fa-user-o"></span>
							@endif
							{{ $val->username }}
						</td>
						<td>{{ $val->name }}</td>
						<td>{{ isset($val->address) ? $val->address : 'Waiting for update' }}</td>
						<td>{{ isset($val->number_phone) ? $val->number_phone : 'Waiting for update' }}</td>
						<td>{{ isset($val->school) ? $val->school : 'Waiting for update' }}</td>
						<td>{{ $val->email }}</td>
						<td><a href="{{ $val->link_fb }}" target="_blank" class="btn btn-primary btn-xs"><span class="fa fa-facebook"></span> </a></td>
						<td>
							@if($val->role < 2)
							<div class="btn-group">
							    <button type="button" class="btn btn-primary dropdown-toggle btn-xs" id="btn-group-edit-profile" data-toggle="dropdown">Quản lý User <span class="caret"></span></button>
							    <ul class="dropdown-menu" role="menu">
									@if($val->role == 0 && $val->active == 1)
							        <li><a onclick="return confirm('Bạn có chắc chắn muốn chọn người này làm admin không?')" href="{{ URL::route('admin.user.setadmin', ['id' => $val->id]) }}"><span class="fa fa-cubes"></span> Set Moderater</a></li>
							        @elseif($val->role == 1)
							        <li><a onclick="return confirm('Bạn có chắc chắn muốn hủy quyền admin của người này không?')" href="{{ URL::route('admin.user.cancel', ['id' => $val->id]) }}"><span class="fa fa-close"></span> Hủy quyền Moderater</li>
							        @endif
										
									@if($val->active == 0)
							        <li><a onclick="return confirm('Bạn có chắc chắn muốn kích hoạt cho tài khoản này không?')" href="{{ URL::route('admin.user.active', ['id' => $val->id]) }}"><span class="fa fa-unlock"></span> Kích hoạt tài khoản</li>
							        @else
							        <li><a onclick="return confirm('Bạn có chắc chắn muốn khóa tài khoản này không?')" href="{{ URL::route('admin.user.cancel-active', ['id' => $val->id]) }}"><span class="fa fa-lock"></span> Khóa tài khoản</li>
									@endif

									@if($val->role < 2)
							        <li><a onclick="return confirm('Bạn có chắc là muốn xóa tài khoản này không?')" href="{{ URL::route('admin.user.delete', ['id' => $val->id]) }}"><span class="fa fa-trash"></span> Xóa tài khoản</a></li>
							        @endif
							    </ul>
							</div>
							@else
							<code>Not allow</code>
							@endif
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>
			{{ $users_actived->render() }}

			<hr>
			<h1><span class="fa fa-wrench"></span> Những tài khoản chưa được kích hoạt</h1>
			<table class="table table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align: center;">STT</th>
						<th style="text-align: center;">Tên tài khoản</th>
						<th style="text-align: center;">Tên</th>
						<th style="text-align: center;">Địa chỉ</th>
						<th style="text-align: center;">Số điện thoại</th>
						<th style="text-align: center;">Trường</th>
						<th style="text-align: center;">Email</th>
						<th style="text-align: center;">Link facebook</th>
						@if(Auth::user()->role == 2)
						<th style="text-align: center;">Active</th>
						@endif
					</tr>
				</thead>
				<tbody>
					<?php $cnt = 1; ?>
					@foreach($users_not_active as $val)
					@if($val->active == 0)
					<tr style="text-align: center;">
						<td><?php echo $cnt; $cnt++ ?></td>
						<td>
							@if($val->role == 2)
								<span class="fa fa-user-secret" style="color: red;"></span>
							@elseif($val->role == 1)
								<span class="fa fa-user-md" style="color: green;"></span>
							@else
								<span class="fa fa-user-o"></span>
							@endif
							{{ $val->username }}
						</td>
						<td>{{ $val->name }}</td>
						<td>{{ isset($val->address) ? $val->address : 'Waiting for update' }}</td>
						<td>{{ isset($val->number_phone) ? $val->number_phone : 'Waiting for update' }}</td>
						<td>{{ isset($val->school) ? $val->school : 'Waiting for update' }}</td>
						<td>{{ $val->email }}</td>
						<td><a href="{{ $val->link_fb }}" target="_blank" class="btn btn-primary btn-xs"><span class="fa fa-facebook"></span> </a></td>
						<td>
							@if($val->role < 2)
							<div class="btn-group">
							    <button type="button" class="btn btn-primary dropdown-toggle btn-xs" id="btn-group-edit-profile" data-toggle="dropdown">Quản lý User <span class="caret"></span></button>
							    <ul class="dropdown-menu" role="menu">
									@if($val->role == 0 && $val->active == 1)
							        <li><a onclick="return confirm('Bạn có chắc chắn muốn chọn người này làm admin không?')" href="{{ URL::route('admin.user.setadmin', ['id' => $val->id]) }}"><span class="fa fa-cubes"></span> Set Moderater</a></li>
							        @elseif($val->role == 1)
							        <li><a onclick="return confirm('Bạn có chắc chắn muốn hủy quyền admin của người này không?')" href="{{ URL::route('admin.user.cancel', ['id' => $val->id]) }}"><span class="fa fa-close"></span> Hủy quyền Moderater</li>
							        @endif
										
									@if($val->active == 0)
							        <li><a onclick="return confirm('Bạn có chắc chắn muốn kích hoạt cho tài khoản này không?')" href="{{ URL::route('admin.user.active', ['id' => $val->id]) }}"><span class="fa fa-unlock"></span> Kích hoạt tài khoản</li>
							        @else
							        <li><a onclick="return confirm('Bạn có chắc chắn muốn khóa tài khoản này không?')" href="{{ URL::route('admin.user.cancel-active', ['id' => $val->id]) }}"><span class="fa fa-lock"></span> Khóa tài khoản</li>
									@endif

									@if($val->role < 2)
							        <li><a onclick="return confirm('Bạn có chắc là muốn xóa tài khoản này không?')" href="{{ URL::route('admin.user.delete', ['id' => $val->id]) }}"><span class="fa fa-trash"></span> Xóa tài khoản</a></li>
							        @endif
							    </ul>
							</div>
							@else
							<code>Not allow</code>
							@endif
						</td>
					</tr>
					@endif
					@endforeach
				</tbody>
			</table>

		</div>
	</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
      $("#searchUser").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
@endsection