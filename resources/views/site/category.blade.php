@extends('layouts.front')
@section('title', Lang::get('main.port'))
@section('content')
<!-- ________________________________________________________Portfolio Begins________________________________________________________ -->

<section class="mp_port_page">
	<div class="mp_blog_page_block">
		<div class="container">
			<div class="row">
				<a href="{{action('IndexController@index')}}">@lang('main.main')  / </a>
			</div>
		</div>
	</div>
	<div class="mp_port_page_content">
		<div class="container">
			<div class="row">
				<h3 class="unique_heading">@lang('main.port')</h3>
				<div class="mp_icon_head_2">
					<span><img src="{{asset('site/img/mini-logo2.png')}}" alt=""></span>
				</div>
				<div class="mp_port_nav">
					<a href="{{action('IndexController@portfolio')}}">@lang('main.all')</a>
					@foreach ($cat as $elements)					
					<a href="{{url('portfolio/category/'.$elements->slug)}}" {{ request()->is('$elements->slug') ? 'class="mp_port_all"' : '' }}>{{$elements->{'title_' . App::getLocale()} }}</a>
					@endforeach
				</div>
				<div class="mp_port_page_content_items">
					<div class="mp_port_page_content_item">
						@foreach ($cats->cat as $element)
						<div class="mp_port_page_items col-sm-4 col-md-3 col-lg-3 col-xs-6">
							<div class="mp_port_page_item">
								@if (isset($element->imgOne))		
								<img src="{{$element->imgOne->img}}" alt="">
								@endif
								<a href="{{url('portfolio/'.$element->slug)}}">{{ $element->{'title_' . App::getLocale()} }}</a>
							</div>
						</div>
						@endforeach
					</div>
					@if (isset($elements->id) && isset($element->id))		
					<div class="mp_port_page_more">
						<button class="cat-more" data-cat-id="{{$cats->id}}" data-id="{{$element->id}}">@lang('main.show')</button>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ________________________________________________________Portfolio Ends________________________________________________________ -->
@endsection