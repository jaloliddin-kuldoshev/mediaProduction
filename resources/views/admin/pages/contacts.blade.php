 @extends('adminlte::page')
 @section('title', 'Media Production')
 @section('content_header')
 <h1>
 	Контакты
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
 			<form role="form" method="post" action="{{ action('Admin\AdminController@contacts') }}"  enctype="multipart/form-data">
 				{{ csrf_field() }}
 				<div class="box-body">
 					<div class="form-group">
 						<label for="exampleInputEmail1">Режим работы</label>
 						<input type="text" class="form-control" name="worktime" value="{{ $news->worktime }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Адрес_ru</label>
 						<input type="text" class="form-control" name="address_ru" value="{{ $news->address_ru }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Адрес_uz</label>
 						<input type="text" class="form-control" name="address_uz" value="{{ $news->address_uz }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Ориентир_ru</label>
 						<input type="text" class="form-control" name="near_ru" value="{{ $news->near_ru }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Ориентир_uz</label>
 						<input type="text" class="form-control" name="near_uz" value="{{ $news->near_uz }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Email</label>
 						<input type="text" class="form-control" name="email" value="{{ $news->email }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Телефон</label>
 						<input type="text" class="form-control" name="tel" value="{{ $news->tel }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Гугл карта</label>
 						<input type="text" class="form-control" name="map" value="{{ $news->map }}">
 					</div>
					<div class="form-group">
 						<label for="exampleInputEmail1">Facebook</label>
 						<input type="text" class="form-control" name="face" value="{{ $news->face }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Twitter</label>
 						<input type="text" class="form-control" name="twit" value="{{ $news->twit }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Instagram</label>
 						<input type="text" class="form-control" name="ins" value="{{ $news->ins }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Telegram</label>
 						<input type="text" class="form-control" name="tele" value="{{ $news->tele }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Odnoklassniki</label>
 						<input type="text" class="form-control" name="ok" value="{{ $news->ok }}">
 					</div>
 					<div class="form-group">
 						<label for="exampleInputEmail1">Vkontakte</label>
 						<input type="text" class="form-control" name="vk" value="{{ $news->vk }}">
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