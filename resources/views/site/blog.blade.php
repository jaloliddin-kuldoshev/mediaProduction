@extends('layouts.front')
@section('title', Lang::get('main.blog'))
@section('content')
<!-- ________________________________________________________Blog Page Content Begins________________________________________________________ -->

<section class="mp_blog_page_breadcrumbs">
	<div class="mp_blog_page_block">
		<div class="container">
			<div class="row">
				<a href="{{action('IndexController@index')}}">@lang('main.main')  / </a>
			</div>
		</div>
	</div>
	<div class="mp_blog_page_content">
		<div class="container">
			<div class="row">
				<h3 class="unique_heading">@lang('main.blog')</h3>
				<div class="mp_icon_head_2">
					<span><img src="{{ asset('site/img/mini-logo2.png')}}"></span>
				</div>
				<div class="mp_blog_page_search">
					<input type="text" name="search" placeholder="Поиск" id="search">
					<button type="button" id="blog_search"><i class="fa fa-search" aria-hidden="true"></i></button>
				</div>
				<div class="mp_blog_page_content_items">
					@foreach ($blog as $element)
					<div class="mp_blog_page_items col-sm-4 col-md-3 col-lg-3 col-xs-6">
						<div class="mp_blog_page_item">
							<div class="mp_blog_page_item_img">
								<img src="{{$element->img}}" alt="">
							</div>
							<div class="mp_blog_page_item_content">
								<?php setlocale(LC_TIME, 'ru_RU'); ?>
								<p>{{  date("d M Y", strtotime($element->created_at)) }}</p>
								<h4>{{ $element->{'title_' . App::getLocale()} }}</h4>
								<p class="mp_blog_page_item_des">{{ str_limit(strip_tags($element->{'text_' . App::getLocale()}), 100) }}</p>
								<a href="{{ action('IndexController@oneBlog', ['slug' => $element->slug]) }}">@lang('main.brief')</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				@if (isset($element))
				<div class="mp_blog_page_more">
					<button class="btn-more" data-id="{{ $element->id }}">@lang('main.show')</button>
				</div>
				@endif
				<div class="mp_blog_page_popular">
					<div class="mp_blog_page_popular_heading">
						<h4>@lang('main.popular')</h4>
					</div>
					<div class="mp_blog_page_pop_block">
						@foreach ($pop as $element)
						<div class="mp_blog_page_pops col-sm-4 col-md-3 col-lg-3 col-xs-6">
							<div class="mp_blog_page_pop_item">
								<div class="mp_blog_page_pop_img">
									<img src="{{$element->img}}" alt="">
								</div>
								<div class="mp_blog_page_pop_content">
									<p>{{  date("d M Y", strtotime($element->created_at)) }}</p>
									<a href="{{ action('IndexController@oneBlog', ['slug' => $element->slug]) }}">{{ $element->{'title_' . App::getLocale()} }}</a>
								</div>
							</div>
						</div>
						@endforeach						

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ________________________________________________________Blog Page Content Ends________________________________________________________ -->
@endsection