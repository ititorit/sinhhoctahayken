<hr>
<div class="widget-title">
	<h2>
		<span>Tin tức nổi bật</span>
	</h2>
</div>
<div class="" style="text-align: center; margin-bottom: 20px;">
	<span class="line-child"></span> <span class="fa fa-globe"></span> <span class="line-child"></span>
</div>
<div class="row">
    @foreach($tinNoiBat as $val)
	<div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- Tiêu đề của bài viết về tin tức -->
                <img src="{{ isset($val->urlHinh) ? asset('uploads/images').'/'.$val->urlHinh : null }}" id="tinnnoibat" width="100%">
                <!-- /Tiêu đề của bài viết về tin tức -->
                <hr>
                <div class="title-tintuc">
                    <a href="#">{{ $val->title }}</a>
                    <div class="line"></div>
                </div>

                <!-- Nội dung của bài viết về tin tức -->
                {!! substr($val->content, 0, 180) !!}
                <!-- /Nội dung của bài viết về tin tức -->
            </div>
            <div class="panel-footer clearfix">
                 <a href="{{ URL::route('post.detail', ['id' => $val->id]) }}" class="btn btn-primary pull-right">Đọc tiếp »</a>
            </div>
        </div>
	</div>
    @endforeach
</div>
<div class="row">
    <div style="text-align: center">
        <a href="{{ route('news') }}" class="btn btn-primary" style="font-size: 17px;">Xem thêm tin tức</a>
    </div>
</div>