@extends('layouts.front')
@section('title', Lang::get('main.port'))
@section('content')
<!-- ________________________________________________________Portfolio Inside Begins________________________________________________________ -->

<section class="mp_port_in">
	<div class="mp_blog_page_block">
		<div class="container">
			<div class="row">
				<a href="{{action('IndexController@index')}}">@lang('main.main')  / </a><span href="#">@lang('main.port')  / </span>
			</div>
		</div>
	</div>
	<div class="mp_port_in_content">
		<div class="container">
			<div class="row">
				<h3 class="unique_heading">{{$port->{'title_' . App::getLocale()} }}</h3>
				<div class="mp_icon_head_2">
					<span><img src="{{asset('site/img/mini-logo2.png') }}" alt=""></span>
				</div>
				<div class="mp_port_in_content_items">
					<div class="mp_port_in_items col-sm-5 col-md-3 col-lg-3 col-xs-5">
						<div class="mp_port_in_items_img">
							<img src="{{$port->portfolio->img}}" alt="">
						</div>
					</div>
					<div class="mp_port_in_items col-sm-7 col-md-9 col-lg-9 col-xs-7">
						<div class="mp_port_in_items_text">
							<h4>{{$port->{'title_' . App::getLocale()} }}</h4>
							{!! $port->{'text_' . App::getLocale()} !!}
						</div>
					</div>
				</div>

				<div class="mp_port_in_thumb">
					<div class="mp_port_in_slider">
						@foreach ($porImg as $element)
						<img src="{{$element->img}}" alt="">
						@endforeach
					</div>
					<div class="mp_port_in_slider_for">

						@foreach ($porImg as $element)
						<img src="{{$element->img}}" alt="">
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ________________________________________________________Portfolio Inside Begins________________________________________________________ -->
@endsection