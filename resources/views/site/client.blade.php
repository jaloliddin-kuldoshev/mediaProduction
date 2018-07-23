@extends('layouts.front')
@section('title', Lang::get('main.clients'))
@section('content')

<!-- ________________________________________________________Clients bEGINS________________________________________________________ -->

<section class="mp_clients" >
	<div class="mp_blog_page_block">
		<div class="container">
			<div class="row">
				<a href="{{action('IndexController@index')}}">@lang('main.main')  / </a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<h3 class="unique_heading">@lang('main.clients')</h3>
			<div class="mp_icon_head_2">
				<span><img src="{{asset('site/img/mini-logo2.png') }}" alt=""></span>
			</div>
			<div class="mp_client_content">
				@foreach ($client as $element)
				<div class="mp_client_items col-sm-4 col-md-3 col-lg-3 col-xs-6">
					<div class="mp_client_item">
						<div class="mp_client_item_img">
							<img src="{{$element->img}}" alt="">
						</div>
						<div class="mp_client_item_text">
							<h4>{{$element->{'title_' . App::getLocale()} }}</h4>
							{!!str_limit($element->{'text_' . App::getLocale()}, 100) !!}
							<a href="{{url('client/'.$element->slug)}}">@lang('main.brief')</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			@if (isset($element))
			<div class="mp_blog_page_more">
				<button class="client-more" data-id="{{$element->id}}">@lang('main.show')</button>
			</div>
			@endif
		</div>
	</div>
</section>

<!-- ________________________________________________________Clients Ends________________________________________________________ -->

@endsection