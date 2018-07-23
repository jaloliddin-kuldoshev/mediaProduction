@extends('layouts.front')
@section('title', Lang::get('main.workshop'))
@section('content')
<!-- ________________________________________________________Workshop Begins________________________________________________________ -->

<section class="mp_contacts">
	<div class="mp_blog_page_block">
		<div class="container">
			<div class="row">
				<a href="{{action('IndexController@index')}}">@lang('main.main')  / </a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<h3 class="unique_heading">@lang('main.workshop')</h3>
			<div class="mp_icon_head_2">
				<span><img src="{{asset('site/img/mini-logo2.png')}}" alt=""></span>
			</div>
			<div class="mp_contacts_timeline">
				{!! $work->{'text_' . App::getLocale()} !!}
			</div>	

		</div>
	</div>
</section>

<!-- ________________________________________________________Contacts Ends________________________________________________________ -->
@endsection