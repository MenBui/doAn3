@extends('admin.layout.layout')
@section('css')
<!-- Vendor CSS -->
<link rel="stylesheet" href="{{asset('vendor/bootstrap4/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/animate.css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/jscrollpane/jquery.jscrollpane.css')}}">
<link rel="stylesheet" href="{{asset('vendor/waves/waves.min.css')}}">
<link rel="stylesheet" href="{{asset('vendor/switchery/dist/switchery.min.css')}}">

<!-- Neptune CSS -->
<link rel="stylesheet" href="{{asset('css/admin/core.css')}}">
@endsection()
@section('content')
<div class="content-area py-1">
	<div class="container-fluid">
		<h4>Basic Form Elements</h4>
		<ol class="breadcrumb no-bg mb-1">
			<li class="breadcrumb-item"><a href="{{URL::route('authIndex')}}">Trang chủ</a></li>
			<li class="breadcrumb-item"><a href="{{URL::route('listProduct')}}">Danh sách sản phẩm</a></li>
			<li class="breadcrumb-item active">Sửa thông tin sách</li>
		</ol>
		
		<div class="box box-block bg-white">
			@if( count($errors) > 0)
		    	<div class="alert alert-danger">
		    		<ul>
		    			@foreach($errors->all() as $error)
		    				<li>{{$error}}</li>
		    			@endforeach
		    		</ul>
		    	</div>
		    	@endif
			<h5>Form controls</h5>
			<p class="font-90 text-muted mb-1">Bootstrap provides several form control styles, layout options, and custom components for creating a wide variety of forms.</p>
			<form action="{{URL::route('postEditProduct',[$book->id])}}" method="POST">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="form-group">
					<label for="exampleInputEmail1">Tên sách</label>
					<input type="text" class="form-control" name="name" placeholder="Tên sách" value="{{$book->name}}">	
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Link</label>
					<input type="text" class="form-control" name="url" placeholder="Link" value="{{$url_book->url}}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tiêu đề</label>
					<input type="text" class="form-control" name="title" placeholder="Tiêu đề" value="{{$url_book->title}}">					
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Keyword Seo</label>
					<input type="text" class="form-control" name="keyword_seo" placeholder="Keyword Seo" value="{{$url_book->keyword_seo}}">					
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Description Seo</label>
					<input type="text" class="form-control" name="description_seo" placeholder="Description Seo" value="{{$url_book->description_seo}}">					
				</div>
				<div class="form-group">
					<label for="exampleInputFile">Image Seo</label>
					<input type="file" class="form-control-file" name="image_seo" value="{{$url_book->image_seo}}}">
								
				</div>
				
				<div class="form-group">
					<label for="exampleInputEmail1">Giá</label>
					<input type="text" class="form-control" name="price" placeholder="Giá" value="{{$book->price}}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Tác giả</label>
					<select class="form-control" id="exampleSelect1" name="author_id">
						<option value="{{$author->id}}">{{$author->name}}</option>
						@foreach($authors as $au)
							@if($au->id == $author->id)
							@else
								<option value="{{$au->id}}">{{$au->name}}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Nhà xuất bản</label>
					<select class="form-control" id="exampleSelect1" name="nxb_id">
						<option value="{{$nxb->id}}">{{$nxb->name}}</option>
						@foreach($nxbs as $nxb0)
						    @if($nxb0->id == $nxb->id)
						    @else
						        <option value="{{$nxb0->id}}">{{$nxb0->name}}</option>
						    @endif    
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Năm xuất bản</label>
					<input type="text" class="form-control" name="namxb" placeholder="Năm xuất bản" value="{{$book->namxb}}">
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Danh mục</label>
					<select class="form-control" id="exampleSelect1" name="category_id">
						<option value="{{$cate->id}}">{{$cate->name}}</option>
						@foreach($categorys as $categ)
						@if($categ->id == $cate->id)
						@else
						     <option value="{{$categ->id}}">{{$categ->name}}</option>
						@endif     
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Thông tin sách</label>
					<textarea name="description1" class="form-control">{{$book->description1}}</textarea>
					<script type="text/javascript">
				      var editor = CKEDITOR.replace('description1',{
				       language:'vi',
				       filebrowserImageBrowseUrl : '../ckfinder/ckfinder.html?type=Images',
				       filebrowserFlashBrowseUrl : '../ckfinder/ckfinder.html?type=Flash',
				       filebrowserImageUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
				       filebrowserFlashUploadUrl : '../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
				       });
				     </script>﻿
				</div>

				<div class="form-group">
					<label for="exampleInputEmail1">Số lượng</label>
					<input type="text" class="form-control" name="count" placeholder="Số lượng" value="{{$book->count}}">
				</div>
				<div class="form-group">
					<label for="exampleInputFile">Ảnh đại diện</label>
					<input type="file" class="form-control-file" name="images" value="{{$book->images}}">
								
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="box box-block bg-white">
			
			
@endsection()
@section('js')
<!-- Vendor JS -->
		<script type="text/javascript" src="{{asset('vendor/jquery/jquery-1.12.3.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('vendor/tether/js/tether.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('vendor/bootstrap4/js/bootstrap.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('vendor/detectmobilebrowser/detectmobilebrowser.js')}}"></script>
		<script type="text/javascript" src="{{asset('vendor/jscrollpane/jquery.mousewheel.js')}}"></script>
		<script type="text/javascript" src="{{asset('vendor/jscrollpane/mwheelIntent.js')}}"></script>
		<script type="text/javascript" src="{{asset('vendor/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js')}}"></script>
		<script type="text/javascript" src="{{asset('vendor/waves/waves.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('vendor/switchery/dist/switchery.min.js')}}"></script>

		<!-- Neptune JS -->
		<script type="text/javascript" src="{{asset('js/admin/app.js')}}"></script>
		<script type="text/javascript" src="{{asset('js/admin/demo.js')}}"></script>

        <!-- <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>   -->
@endsection()