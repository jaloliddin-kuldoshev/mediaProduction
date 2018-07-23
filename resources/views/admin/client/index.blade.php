@extends('adminlte::page')
@section('title', 'Media Production')

@section('content_header')
<div class="col-lg-12">
	@if(session('message'))

	<div class="col-md-12">

		<div class="alert alert-success-outline alert-success alert-dismissible fade in" role="alert">

			<button type="button" class="close" data-dismiss="alert" aria-label="Close">

				<span aria-hidden="true">×</span>

			</button>

			{{ session('message') }}

		</div>

	</div>

	@endif
</div>
<h1>
	Клиенты
</h1>

@stop
@section('content')

<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title"><a type="button" href="/admin-panel/client/create" class="btn btn-block btn-success">Добавить</a></h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
			title="Collapse">
			<i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
				<i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body">
			<table id="example" class="display nowrap" style="width:100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Название</th>
						<th>Действия</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($news as $new)
					<tr>
						<td>{{ $new->id }}</td>
						<td>{{ $new->title_ru }}</td>
						<td>
							<a class="btn btn-social-icon btn-bitbucket" href="{{ route('client.edit', ['id' => $new->id]) }}" title="Редактировать"  style="margin-right: 5px;"><i class="fa fa-pencil"></i></a>
							<form action="{{ route('client.destroy', ['id' => $new->id]) }}" method="post" style="all: initial;">
								{{ csrf_field() }}

								{{ method_field('delete') }}
								<button class="btn btn-social-icon btn-google" title="Удалить"><i class="fa fa-trash"></i></button></td>
							</form>
						</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>ID</th>
							<th>Название</th>
							<th>Действия</th>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				Footer
			</div>
			<!-- /.box-footer-->
		</div>

		@stop
