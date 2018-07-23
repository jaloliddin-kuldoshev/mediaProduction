@extends('adminlte::page')
@section('title', 'Media Production')
@section('content_header')
<h1>
	Изменить
</h1>
@stop
<style type="text/css">
	.check-input{
		display: none;
	}
	.img_style{
		border: 2px solid transparent !important;
		cursor: pointer;
	}
	.check-input:checked ~ label>.img_style{
		border-color: red !important;
	}

</style>
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
			<form role="form" method="post" action="{{ route('service.update', ['id' => $news->id]) }}"  enctype="multipart/form-data">

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
						<label for="exampleInputEmail1">Описание_ru</label>
						<textarea class="form-control ckeditor" name="text_ru" rows="3" id="">{{$news->text_ru}}</textarea>
						@if($errors->has('text_ru'))

						<small class="text-danger">{{ $errors->first('text_ru') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Описание_en</label>
						<textarea class="form-control ckeditor" name="text_uz" rows="3" id="">{{$news->text_uz}}</textarea>
						@if($errors->has('text_uz'))

						<small class="text-danger">{{ $errors->first('text_uz') }}</small>

						@endif
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">Баннер</label>
						<input type="file" name="img[]" multiple>
						@if($errors->has('img'))

						<small class="text-danger">{{ $errors->first('img') }}</small>

						@endif
					</div>
					<div class="row">
						@foreach ($img as $element)
						<div class="col-sm-3">
							<input class="check-input" id="{{ $element->id }}_img" type="checkbox" name="oldimg[]"
							value="{{ $element->id }}">
							<label for="{{ $element->id }}_img">
								<img class="img-thumbnail img_style" src="{{ $element->img }}" alt="" style="width: 250px;">
							</label>
						</div>
						@endforeach
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