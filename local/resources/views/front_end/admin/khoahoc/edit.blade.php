@extends('front_end.admin.master')
@section('title', 'Chỉnh sửa nội dung')

@section('header-admin-home')
    	</span> Chỉnh sửa :: <kbd>{{ $res->title }}</kbd>
@endsection

@section('content')
	<div class="row">
		<div class="col-md-6">
			@if(session()->has('Flash_session.message'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Thông báo!</strong> {{ session('Flash_session.message') }}
			</div>
			@endif
			<form method="POST">
				@csrf
				<div class="form-group">
					<label for="title"><span class="fa fa-paint-brush"></span> Tiêu đề của box <kbd>{{ $res->title }}</kbd>: </label>
					<input type="text" class="form-control" placeholder="Nhập vào tiêu đề của box 1" name="title" value="{{ isset($res->title) ? $res->title : null }}">
				</div>
				@if($errors->has('title'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('title') }}
				</div>
				@endif

				<div class="form-group">
					<label for="content"><span class="fa fa-font"></span> Nội dung của box <kbd>{{ $res->title }}</kbd>: </label>
					<textarea name="content" id="content-box">{{ isset($res->content) ? $res->content : null }} </textarea>
					<script type="text/javascript">
						confi = {};
						confi.entities_latin = false;
						confi.language = 'vi';
						confi.toolbarGroups = [
								{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
								{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
								{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
								{ name: 'forms', groups: [ 'forms' ] },
								{ name: 'document', groups: [ 'document', 'mode', 'doctools' ] },
								{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
								{ name: 'links', groups: [ 'links' ] },
								{ name: 'insert', groups: [ 'insert' ] },
								{ name: 'styles', groups: [ 'styles' ] },
								{ name: 'colors', groups: [ 'colors' ] },
								{ name: 'tools', groups: [ 'tools' ] },
								{ name: 'others', groups: [ 'others' ] },
								{ name: 'about', groups: [ 'about' ] }
							];
							confi.removeButtons = 'Form,Checkbox,TextField,Textarea,Select,Button,ImageButton,HiddenField,Undo,Redo,SelectAll,Replace,Outdent,Indent,CreateDiv,NewPage,Preview,Print,Radio,Templates,BidiLtr,BidiRtl,Language,Anchor,Smiley,Iframe,About,Flash,PageBreak,HorizontalRule,SpecialChar,Image,Unlink,JustifyLeft,JustifyCenter,JustifyRight,Maximize,ShowBlocks,Find,Paste,PasteText,PasteFromWord';
						CKEDITOR.replace('content-box', confi);
					</script>
				</div>

				@if($errors->has('content'))
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Thông báo!</strong> {{ $errors->first('content') }}
				</div>
				@endif

				<div class="form-group">
					<button class="btn btn-primary" type="submit"><span class="fa fa-check"></span> Cập nhật</button>
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa khóa học này không?')" href="{{ URL::route('admin.khoahoc.delete', ['id' => $res->id]) }}" class="btn btn-danger"><span class="fa fa-trash"></span> Xóa khóa học</a>
				</div>
			</form>
		</div>
	</div>
@endsection