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
			<form role="form" method="post" action="{{ route('category.update', ['id' => $news->id]) }}"  enctype="multipart/form-data">

				{{ csrf_field() }}
				{{ method_field('put') }}
				<div class="box-body">
					<div class="form-group">
						<label for="exampleInputEmail1">Название_ru</label>
						<input type="text" class="form-control" name="title_ru" value="{{$news->title_ru}}">
						@if($errors->has('title_ru'))

						<small class="text-danger">{{ $errors->first('title_ru') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Название_uz</label>
						<input type="text" class="form-control" name="title_uz" value="{{$news->title_uz}}">
						@if($errors->has('title_uz'))

						<small class="text-danger">{{ $errors->first('title_uz') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label>Показать на главной странице</label>
						<select class="form-control"  name="show_on_main">
							<option value="1" @if ($news->show_on_main == 1) selected="selected" @endif >Отображается</option>
							<option value="0" @if ($news->show_on_main == 0) selected="selected" @endif>Скрыт</option>
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