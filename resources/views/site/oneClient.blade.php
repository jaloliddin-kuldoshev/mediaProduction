@extends('layouts.front')
@section('title', Lang::get('main.clients'))
@section('content')
<!-- ________________________________________________________Client Inside begins________________________________________________________ -->

<section class="client_in">
	<div class="mp_blog_page_block">
		<div class="container">
			<div class="row">
				<a href="{{action('IndexController@index')}}">@lang('main.main')  / </a><span href="#">@lang('main.clients')  / </span>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<h3 class="unique_heading">{{ $client->{'title_' . App::getLocale()} }}</h3>
			<div class="mp_icon_head_2">
				<span><img src="{{asset('site/img/mini-logo2.png')}}" alt=""></span>
			</div>
			<div class="client_in_content">
				<div class="client_in_items col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="client_in_items_img">
						<img src="{{$client->img}}" alt="">
					</div>
				</div>
				<div class="client_in_items col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="client_in_items_text">
						<h4>{{ $client->{'title_' . App::getLocale()} }}</h4>
						{!! $client->{'text_' . App::getLocale()} !!}
					</div>
				</div>
			</div>
			<div class="client_in_work">
				<h4>@lang('main.work') {{ $client->{'title_' . App::getLocale()} }}</h4>
				<div class="client_in_work_content">
					@if (isset($works))
					@foreach ($works as $element)
					<div class="client_in_work_items col-lg-3 col-md-3 col-sm-4 col-xs-6">
						<div class="client_in_work_item">
							<img src="{{$element->img[0]->img}}" alt="">
							<a href="#">{{ $element->{'title_' . App::getLocale()} }}</a>
						</div>
					</div>
					@endforeach
					@endif
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ________________________________________________________Client Inside Ends________________________________________________________ -->
@endsection