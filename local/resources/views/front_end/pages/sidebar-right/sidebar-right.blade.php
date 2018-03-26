<div class="widget-title">
	<p>Tìm kiếm</p>
	<div class="line"></div>
</div>
<form method="GET" action="{{ URL::route('search') }}">
	<div class="input-group">
		<input type="text" class="form-control" name="keywords" value="{{ old('keywords') }}" placeholder="Nhập vào từ khóa">
		<div class="input-group-btn">
			<button class="btn btn-default" type="submit">
				<i class="fa fa-search"></i>
			</button>
		</div>
	</div>
	@if($errors->has('keywords'))
	<div class="alert alert-danger" id="thongbao">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Thông báo!</strong> {{ $errors->first('keywords') }}
	</div>
	@endif
</form> <hr>
<div class="widget-title">
	<p>Bài viết mới nhất</p>
	<div class="line"></div>
</div>
<table class="table table-hover">
	<tbody>
		@if(count($newPost))
			@foreach($newPost as $val)
			<tr>
				<td><a href="{{ URL::route('post.detail', ['id' => $val->id]) }}">{{ $val->title }}</a> <a href="{{ URL::route('profileUser', ['id' => $val->user->id]) }}"><span class="badge badge-secondary"> {{ $val->user->username }}</span></a></td>
			</tr>
			@endforeach
		@else
			<div class="alert alert-danger">
				<strong>Thông báo!</strong> Chưa có bài viết mới
			</div>
		@endif
	</tbody>
</table>


<div class="widget-title">
	<p>Fanpage</p>
	<div class="line"></div>
</div>
<div class="fb-page" data-href="https://www.facebook.com/KenSHTK" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/KenSHTK" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/KenSHTK">Sinh học Thầy Ken</a></blockquote></div>