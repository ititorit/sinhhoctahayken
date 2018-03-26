
    <hr>
    <div class="widget-title">
        <h2>
            <span>thư viện hình ảnh</span>
        </h2>
    </div>
    <div style="text-align: center; margin-bottom: 20px;">
        <span class="line-child"></span> <span class="fa fa-image"></span> <span class="line-child"></span>
    </div>
    @if(count($hinhanhnoibat))
        <?php $cnt = 0; ?>
        @foreach($hinhanhnoibat as $val)
            <?php if($cnt % 4 == 0) { ?>
                <div class="row">
            <?php } ?>
                    <div class="col-md-3">
                        <div class="box-tin-tuc">
                            <div class="header-tintuc">
                                <a href="uploads/hinhanhnoibat/{{$val->urlHinh}}" target="_blank"><img src="uploads/hinhanhnoibat/{{$val->urlHinh}}" id="tinnnoibat" style="width:100%; border: 3px solid #002858;"></a>
                            </div>
                        </div>
                    </div> 
            <?php $cnt++; if($cnt % 4 == 0) { ?>
                </div>
            <?php } ?>
        @endforeach
        <?php if($cnt % 4) {?> </div> <?php } ?>
    @else
        <div class="alert alert-warning">
            <strong><span class="fa fa-warning"></span> Thông báo!</strong> Chưa có hình ảnh để hiển thị.
            @if(Auth::check() && Auth::user()->role == 2)
            <a href="{{ URL::route('admin.image.list') }}" target="_blank"><span class="fa fa-upload"></span> Click vào đây để upload.</a>
            @endif
        </div>
    @endif

