@extends('adminlte::page')
@section('title', 'Media Production')
@section('content_header')
<h1>
	Добавить
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
			<form role="form" method="post" action="{{ route('service.store') }}"  enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Название_ru</label>
						<input type="text" class="form-control" name="title_ru" value="{{old('title_ru')}}">
						@if($errors->has('title_ru'))

						<small class="text-danger">{{ $errors->first('title_ru') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Название_uz</label>
						<input type="text" class="form-control" name="title_uz" value="{{old('title_uz')}}">
						@if($errors->has('title_uz'))

						<small class="text-danger">{{ $errors->first('title_uz') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Описание_ru</label>
						<textarea class="form-control ckeditor" name="text_ru" rows="3" id="">{{old('text_ru')}}</textarea>
						@if($errors->has('text_ru'))

						<small class="text-danger">{{ $errors->first('text_ru') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Описание_en</label>
						<textarea class="form-control ckeditor" name="text_uz" rows="3" id="">{{old('text_uz')}}</textarea>
						@if($errors->has('text_uz'))

						<small class="text-danger">{{ $errors->first('text_uz') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Баннер</label>
						<input type="file" name="img[]" value="" required multiple>
						@if($errors->has('img'))

						<small class="text-danger">{{ $errors->first('img') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label>Показать на главной странице</label>
						<select class="form-control"  name="show_on_main">
							<option value="1" selected="selected">Отображается</option>
							<option value="0">Скрыт</option>
						</select>
					</div>

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