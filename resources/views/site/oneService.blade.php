@extends('layouts.front')
@section('title', Lang::get('main.service'))
@section('content')
<!-- ________________________________________________________Service Inside Beginss________________________________________________________ -->

<section class="mp_serve_in">
	<div class="mp_blog_page_block">
		<div class="container">
			<div class="row">
				<a href="{{action('IndexController@index')}}">@lang('main.main')  / </a><span href="#">@lang('main.blog')  / </span>
			</div>
		</div>
	</div>
	<div class="mp_serve_in_content">
		<div class="container">
			<div class="row">
				<h3 class="unique_heading">{{$service->{'title_' . App::getLocale()} }}</h3>
				<div class="mp_icon_head_2">
					<span><img src="{{asset('site/img/mini-logo2.png')}}" alt=""></span>
				</div>
				<div class="mp_port_in_content_slider">
					@foreach ($serImg->img as $element)
					<img src="{{$element->img}}" alt="">
					@endforeach
				</div>
				<div class="mp_serve_in_content_items">
					<div class="mp_serve_in_items col-sm-6 col-md-6 col-lg-6 col-xs-12">
						<div class="mp_serve_in_items_text">
							<h4>{{$service->{'title_' . App::getLocale()} }}</h4>
							{!! $service->{'text_' . App::getLocale()} !!}
						</div>		
					</div>
					<div class="mp_serve_in_items col-sm-6 col-md-6 col-lg-6 col-xs-12">
						<div class="mp_serve_in_items_text">
							<h4>Мы сделали лайтбоксы для:</h4>
							<div class="mp_serve_in_comps">
								
								<div class="mp_serve_in_comp">
									<?php $k=1; foreach ($comp as $element): ?>
									<a href="{{url('portfolio/'.$element->slug)}}">{{$element->portfolio->{'title_' . App::getLocale()} }}</a>
									<?php if($k % 10 == 0){ echo "</div><div class='mp_serve_in_comp'>"; } $k++; endforeach; ?>
									</div>

								</div>
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- ________________________________________________________Service Inside Ends________________________________________________________ -->
	@endsection