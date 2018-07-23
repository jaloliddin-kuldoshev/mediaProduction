@extends('layouts.front')
@section('title', Lang::get('main.service'))
@section('content')
<!-- ________________________________________________________Service Page Begins________________________________________________________ -->

<section class="mp_serve_page">
	<div class="mp_blog_page_block">
		<div class="container">
			<div class="row">
				<a href="{{action('IndexController@index')}}">@lang('main.main')  / </a>
			</div>
		</div>
	</div>
	<div class="mp_serve_page_content">
		<div class="container">
			<div class="row">
				<h3 class="unique_heading">@lang('main.service')</h3>
				<div class="mp_icon_head_2">
					<span><img src="{{asset('site/img/mini-logo2.png')}}" alt=""></span>
				</div>
				<div class="mp_serve_page_content_items">
					@foreach ($service as $element)					
					<div class="mp_serve_page_items col-sm-4 col-md-3 col-lg-3 col-xs-6">
						<div class="mp_serve_page_item">
							@if (isset($element->imgOne))		
							<img src="{{$element->imgOne->img}}" alt="">
							@endif
							<a href="{{action('IndexController@oneService', ['slug' => $element->slug])}}">{{ $element->{'title_' . App::getLocale()} }}</a>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ________________________________________________________Service Page Ends________________________________________________________ -->
@endsection