@extends('layouts.front')
@section('title', Lang::get('main.contacts'))
@section('content')
<!-- ________________________________________________________Contacts Beginss________________________________________________________ -->

<section class="mp_contacts">
	<div class="mp_blog_page_block">
		<div class="container">
			<div class="row">
				<a href="{{action('IndexController@index')}}">@lang('main.main')  / </a><a href="#">@lang('main.contacts')  / </a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<h3 class="unique_heading">@lang('main.contacts')</h3>
			<div class="mp_icon_head_2">
				<span><img src="{{asset('site/img/mini-logo2.png')}}" alt=""></span>
			</div>
			<div class="mp_contacts_timeline">
				<div class="mp_contacts_items col-lg-3 col-md-3 col-sm-3 col-xs-6">
					<div class="mp_contacts_item">
						<h4>@lang('main.address')</h4>
						<p>{{ $con->{'address_' . App::getLocale()} }}</p>
					</div>
				</div>
				<div class="mp_contacts_items col-lg-3 col-md-3 col-sm-3 col-xs-6">
					<div class="mp_contacts_item">
						<h4>@lang('main.near')</h4>
						<p>{{ $con->{'near_' . App::getLocale()} }}</p>
					</div>
				</div>
				<div class="mp_contacts_items col-lg-3 col-md-3 col-sm-3 col-xs-6">
					<div class="mp_contacts_item">
						<h4>@lang('main.phone')</h4>
						<p>{{ $con->tel }} </p>
					</div>
				</div>
				<div class="mp_contacts_items col-lg-3 col-md-3 col-sm-3 col-xs-6">
					<div class="mp_contacts_item">
						<h4>@lang('main.email')</h4>
						<p><span>{{ $con->email }} </span></p>
					</div>
				</div>
			</div>	

		</div>
	</div>
	<div class="mp_contacts_map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2997.264326425316!2d69.28605371568669!3d41.30311300917778!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef52cb1d43c83%3A0x7372b85e933c0170!2zNjQg0YPQu9C40YbQsCDQodCw0LTRi9C60LAg0JDQt9C40LzQvtCy0LAsINCi0LDRiNC60LXQvdGCIDEwMDA0Nywg0KPQt9Cx0LXQutC40YHRgtCw0L0!5e0!3m2!1sru!2s!4v1531379991909"  frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
</section>

<!-- ________________________________________________________Contacts Ends________________________________________________________ -->
@endsection