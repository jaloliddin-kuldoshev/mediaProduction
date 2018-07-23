 @extends('adminlte::page')
 @section('title', 'Media Production')
 @section('content_header')
 <h1>
 	Производственный Цех
 </h1>
 @stop
 @section('content')
 <div class="box">
 	<div class="box-header with-border">
 		<h3 class="box-title"></h3>
 		<div class="box-tools pull-right">
 			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
 			title="Collapse">
 			<i class="fa fa-minus"></i></button>
 			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
 				<i class="fa fa-times"></i></button>
 			</div>
 		</div>
 		<div class="box-body">
 			<form role="form" method="post" action="{{ action('Admin\AdminController@ware') }}"  enctype="multipart/form-data">
 				{{ csrf_field() }}
 				<div class="box-body">
 					<div class="form-group">
 						<label for="exampleInputEmail1">Контент_ru</label>
 						<textarea class="form-control ckeditor" name="text_ru" rows="3" id="">{{ $news->text_ru }}</textarea>
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Контент_uz</label>
 						<textarea class="form-control ckeditor" name="text_uz" rows="3" id="">{{ $news->text_uz }}</textarea>
 					</div>
 					<input type="hidden" name="id" value="{{ $news->id }}">
 				</div>
 				<!-- /.box-body -->

 				<div class="box-footer">
 					<button type="submit" class="btn btn-primary">Сохранить</button>
 				</div>
 			</form>
 		</div>
 		<!-- /.box-body -->
 		<div class="box-footer">
 			Footer
 		</div>
 		<!-- /.box-footer-->
 	</div>
 	@stop