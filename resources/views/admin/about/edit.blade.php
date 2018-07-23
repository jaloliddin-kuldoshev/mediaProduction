@extends('adminlte::page')
@section('title', 'Media Production')
@section('content_header')
<h1>
	Изменить
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
			<form role="form" method="post" action="{{ route('benefits.update', ['id' => $new->id]) }}"  enctype="multipart/form-data">

				{{ csrf_field() }}
				{{ method_field('put') }}
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Название_ru</label>
						<input type="text" class="form-control" name="title_ru" value="{{$new->title_ru}}">
						@if($errors->has('title_ru'))

						<small class="text-danger">{{ $errors->first('title_ru') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Название_uz</label>
						<input type="text" class="form-control" name="title_uz" value="{{$new->title_uz}}">
						@if($errors->has('title_uz'))

						<small class="text-danger">{{ $errors->first('title_uz') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Описание_ru</label>
						<input type="text" class="form-control" name="text_ru" value="{{$new->text_ru}}">
						@if($errors->has('text_ru'))

						<small class="text-danger">{{ $errors->first('text_ru') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Описание_uz</label>
						<input type="text" class="form-control" name="text_uz" value="{{$new->text_uz}}">
						@if($errors->has('text_uz'))

						<small class="text-danger">{{ $errors->first('text_uz') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Баннер</label>
						<input type="file" class="dropify" name="img" data-default-file="{{ asset($new->img) }}">
						@if($errors->has('img'))

						<small class="text-danger">{{ $errors->first('img') }}</small>

						@endif
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