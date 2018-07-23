@extends('layouts.front')
@section('title', Lang::get('main.blog'))
@section('content')
<!-- ________________________________________________________Blog Inside Content Begins________________________________________________________ -->

<section class="mp_blog_in">
	<div class="mp_blog_page_block">
		<div class="container">
			<div class="row">
				<a href="{{action('IndexController@index')}}">@lang('main.main')  / </a><span href="#">@lang('main.blog')  / </span>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<h3 class="unique_heading">{{$blog->{'title_' . App::getLocale()} }}</h3>
			<div class="mp_icon_head_2">
				<span><img src="{{asset('site/img/mini-logo2.png')}}" alt=""></span>
			</div>
			<div class="mp_blog_in_content">
				<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12" style="padding: 0 15px;">
					<div class="mp_blog_in_img">
						<img src="{{$blog->img}}" alt="">
					</div>
					<div class="mp_blog_in_text">
						<h4 class="unique_heading" style="text-align: left;">{{  date("d M Y", strtotime($blog->created_at)) }}</h4>
						{!! $blog->{'text_' . App::getLocale()} !!}
					</div>
					<div class="mp_blog_in_back">
						<a href="javascript:history.go(-1)">@lang('main.back')</a>
					</div>
				</div>
				<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
					<div class="mp_blog_page_search mp_blog_in_search">
						<input type="text" name="search" placeholder="Поиск">
						<button type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
					</div>
					<div class="mp_blog_page_popular">
						<div class="mp_blog_page_popular_heading">
							<h4>@lang('main.popular')</h4>
						</div>
						@foreach ($pop as $element)	
						<div class="col-md-6 col-lg-12 col-sm-6 col-xs-6 mp_blog_page_pop_item">
							<div class="mp_blog_page_pop_img">
								<img src="{{$element->img}}" alt="">
							</div>
							<div class="mp_blog_page_pop_content">
								<p>{{  date("d M Y", strtotime($element->created_at)) }}</p>
								<a href="{{ action('IndexController@oneBlog', ['slug' => $element->slug]) }}">{{ $element->{'title_' . App::getLocale()} }}</a>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ________________________________________________________Blog Inside Content Ends________________________________________________________ -->
@endsection