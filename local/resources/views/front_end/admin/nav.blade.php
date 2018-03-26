<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="javascript:void(0)">Sinh Học Thầy Ken</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                {{ Auth::user()->username }}
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="{{ route('home') }}"><i class="fa fa-user fa-fw"></i> Trở lại trang chủ</a>
                </li>
                <li class="divider"></li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{ route('admin.home') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>
                <li>
                    <a href="{{ URL::route('admin.slogan.list') }}"><i class="fa fa-image fa-fw"></i> Quản lý slogan</a>
                </li>
                <li>
                    <a href="{{ URL::route('admin.post.list') }}"><i class="fa fa-copy fa-fw"></i> Quản lý bài viết</a>
                </li>
                <li>
                    <a href="{{ URL::route('admin.users.list') }}"><i class="fa fa-user-o fa-fw"></i> Quản lý tài khoản</a>
                </li>
                <li>
                    <a href="javascript:void(0)"><i class="fa fa-wrench fa-fw"></i> Chỉnh sửa nội dung Website<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="javascript:void(0)">Box giới thiệu<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="{{ URL::route('tamnhin') }}">{{ $tamnhin->title }}</a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('sumenh') }}">{{ $sumenh->title }}</a>
                                </li>
                                <li>
                                    <a href="{{ URL::route('cotloi') }}">{{ $cotloi->title }}</a>
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                        <li>
                            <a href="javascript:void(0)">Đào tạo (khóa học - luyện thi)<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                @foreach($daotao as $val)
                                <li><a href="{{ URL::route('admin.khoahoc.edit', ['id' => $val->id]) }}">{{ $val->title }}</a></li>
                                @endforeach
                                <li><a href="{{ URL::route('admin.khoahoc.add') }}"><span class="fa fa-plus"></span> THÊM KHÓA HỌC</a></li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{ URL::route('admin.contact.edit') }}"><span class="fa fa-cogs"></span> Chỉnh sửa thông tin liên hệ.</a>
                </li>
                <li>
                    <a href="{{ URL::route('admin.image.list') }}"><span class="fa fa-image"></span> Hình ảnh nổi bật</a>
                </li>
                <li>
                    <a href="{{ URL::route('admin.gioithieu-dangky.edit') }}"><span class="fa fa-image"></span> Chỉnh sửa box giới thiệu đăng ký</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>