@extends('layouts.front')
@section('title', Lang::get('main.main'))
@section('content')
<!-- ________________________________________________________Slider Begins________________________________________________________ -->

<section class="mp_slider">

	<div class="mp_slider_wrapper">
		<div class="mp_slider_items owl-carousel">

			@foreach ($slider as $element)
			<div class="mp_slider_item" style="background-image: url({{$element->img}});">
				<div class="container ">

					<div class="row mp_slider_caption">
						<div class="mp_slider_caption_item" style="background-image: url({{ asset('site/img/bg.png') }});">
							<div class="mp_slider_caption_desk">
								<h3>{{$element->{'title_' . App::getLocale()} }} </h3>
								<div class="mp_slider_mini_logo">
									<span><img src="{{ asset('site/img/13.png') }}" alt=""></span>
								</div>
								<h5>{{$element->{'text_' . App::getLocale()} }}</h5>
							</div>
						</div>
					</div>

				</div>
			</div>
			@endforeach

		</div>
		<div class="mp_slider_mask">
			<div class="mp_slider_item" >
				<div class="container ">
					<div class="row mp_slider_caption">
						<div class="mp_slider_caption_item" >
							<div class="mp_slider_caption_desk">
								<h3>лайтбоксы и световые короба </h3>
								<div class="mp_slider_mini_logo">
									<span><img src="{{ asset('site/img/13.png') }}" alt=""></span>
								</div>
								<h5>Оформление магазина «Solarmarket»</h5>
								<div class="customNavigation">
									<a class="btn prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
									<a class="btn next" style="margin-right: 0;"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- ________________________________________________________Slider Ends________________________________________________________ -->


<!-- ________________________________________________________Service Begins________________________________________________________ -->
<section class="mp_services">
	<div class="container">
		<h3>@lang('main.service')</h3>
		<div class="mp_icon_head">
			<span><img src="{{ asset('site/img/mini-logo1.png') }}" alt=""></span>
		</div>
		<div class="mp_service_slider owl-carousel">
			<?php $k=1; foreach ($service as $element): ?>
			<div class="mp_service_slider_img">
				<div class="mp_service_slider_item mp_service_slider_border_<?php echo $k ?>">
					<img src="{{$element->imgOne->img}}" alt="">
				</div>
				<h4>{{$element->{'title_' . App::getLocale()} }}</h4>
			</div>
			<?php if($k % 4 == 0){ $k=1; } $k++; endforeach; ?>
		</div>
	</div>
</section>


<!-- ________________________________________________________Service Ends________________________________________________________ -->


<!-- ________________________________________________________Portfolio Begins________________________________________________________ -->

<section class="mp_port">
	<div class="container">

		<div class="row">
			<h3>@lang('main.port')</h3>
			<div class="mp_icon_head_2">
				<span><img src="{{ asset('site/img/mini-logo2.png') }}" alt=""></span>
			</div>
			<div class="mp_port_nav">
				<a href="{{action('IndexController@index')}}" class="mp_port_all">@lang('main.all')</a>
				@foreach ($cat as $element)
				<a href="{{url('portfolio/category/'.$element->slug)}}">{{ $element->{'title_' . App::getLocale()} }}</a>
				@endforeach
			</div>
			<div class="mp_port_projects col-sm-12 col-md-12 col-lg-12 col-xs-12">
				<?php $k=1; foreach ($port as $key => $item): ?>
				<?php if (in_array($key, [0, 9])): ?>
					<a href="{{url('portfolio/'.$item->slug)}}">
						<div class="mp_port_one_project col-sm-12 col-md-6 col-lg-6 col-xs-12">
							<div class="mp_port_one_project_block">
								<img src="{{$item->imgOne->img}}" alt="">
								<div class="mp_port_porject_caption">
									<h4>{{ $item->{'title_' . App::getLocale()} }}</h4>
									<div class="mp_slider_mini_logo">
										<span><img src="{{ asset('site/img/13.png') }}" alt=""></span>
									</div>
									{{-- <h5>Оформление магазина «Solarmarket»</h5> --}}
								</div>
							</div>
						</div>
					</a>
				<?php else: ?>
					<?php if ($key == 1): ?>
						<div class="mp_port_one_project col-sm-12 col-md-6 col-lg-6 col-xs-12">
						<?php endif; ?>
						<a href="{{url('portfolio/'.$item->slug)}}">
							<div class="mp_port_one_project_<?php echo $k -1 ?> col-sm-6 col-md-6 col-lg-6 col-xs-6">
								<div class="mp_port_one_project_block">
									<img src="{{$item->imgOne->img}}" alt="">
									<div class="mp_port_porject_caption">
										<h4>{{ $item->{'title_' . App::getLocale()} }}</h4>
										<div class="mp_slider_mini_logo">
											<span><img src="{{ asset('site/img/13.png') }}" alt=""></span>
										</div>
										{{-- <h5>Оформление магазина «Solarmarket»</h5> --}}
									</div>
								</div>
							</div>
						</a>
						<?php if ($key == 4): ?>
						</div><div class="mp_port_one_project col-sm-12 col-md-6 col-lg-6 col-xs-12">
						<?php endif; ?>
					<?php endif; ?>
					<?php if ($key == (count($port) - 1) || $key == 8): ?>
					</div>
				<?php endif; ?>
				<?php if($k % 5 == 0){ $k=1; } $k++; endforeach ?>
			</div>
			<div class="mp_port_more">
				<a href="{{action('IndexController@portfolio')}}">@lang('main.more')</a>
			</div>
		</div>

	</div>
</section>

<!-- ________________________________________________________Portfolio Ends________________________________________________________ -->

<!-- ________________________________________________________Blog Begins________________________________________________________ -->

<section class="mp_blog">
	<div class="container">
		<div class="row">
			<h3>@lang('main.blog')</h3>
			<div class="mp_icon_head_2">
				<span><img src="{{ asset('site/img/mini-logo2.png') }}" alt=""></span>
			</div>
			<div class="mp_blog_slider owl-carousel">
				@foreach ($blog as $element)	
				<div class="mp_blog_slider_items col-sm-6 col-md-6 col-lg-6 col-xs-6">
					<div class="mp_blog_slider_item">
						<div class="col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<img src="{{$element->img}}" alt="">
						</div>
						<div class="mp_blog_slider_text col-sm-6 col-md-6 col-lg-6 col-xs-12">
							<p>{{  date("d M Y", strtotime($element->created_at)) }}</p>
							<h4>{{$element->{'title_' . App::getLocale()} }}</h4>
							{!! str_limit($element->{'text_' . App::getLocale()}, 100) !!}
							<a href="{{ action('IndexController@oneBlog', ['slug' => $element->slug]) }}">@lang('main.brief')</a>
						</div>
					</div>
				</div>	
				@endforeach
			</div>
		</div>
	</div>
</section>

<!-- ________________________________________________________Blog Ends________________________________________________________ -->

<!-- ________________________________________________________Benefits Begins________________________________________________________ -->

<section class="mp_benefit">
	<div class="container">
		<div class="row">
			<h3>@lang('main.benefit')</h3>
			<div class="mp_icon_head">
				<span><img src="{{ asset('site/img/mini-logo1.png') }}" alt=""></span>
			</div>
			<div class="mp_benefit_content">
				<div class="col-sm-12 col-md-6 col-lg-6 col-xs-12" >
					<div class="mp_benefit_right" style="background-image: url({{ asset('site/img/bg2.png') }});">
						@foreach ($ben as $key => $element)
						<img src="{{$element->img}}" alt="" class="{{$key}} {{ $key == 0  ? 'block' : '' }}" >					
						@endforeach
					</div>
				</div>
				<div class="mp_benefit_left col-sm-12 col-md-6 col-lg-6 col-xs-12">
					@foreach ($ben as $key => $element)
					@if ($key == 0)
					<div class="mp_benefit_left_item block{{$key}}">
						<div class="mp_benefit_left_img img1">
							<img src="{{ asset('site/img/people.png') }}">
						</div>
						<div class="mp_benefit_left_text">
							<h4>{{$element->{'title_' . App::getLocale()} }}</h4>
							<p>{{$element->{'text_' . App::getLocale()} }}</p>
						</div>
					</div>
					@endif
					@if ($key == 1)
					<div class="mp_benefit_left_item block{{$key}}">
						<div class="mp_benefit_left_img img2">
							<img src="{{ asset('site/img/trophy.png') }}">
						</div>
						<div class="mp_benefit_left_text">
							<h4>{{$element->{'title_' . App::getLocale()} }}</h4>
							<p>{{$element->{'text_' . App::getLocale()} }}</p>
						</div>
					</div>
					@endif
					@if ($key == 2)
					<div class="mp_benefit_left_item block{{$key}}">
						<div class="mp_benefit_left_img img3">
							<img src="{{ asset('site/img/flag.png') }}" alt="">
						</div>
						<div class="mp_benefit_left_text">
							<h4>{{$element->{'title_' . App::getLocale()} }}</h4>
							<p>{{$element->{'text_' . App::getLocale()} }}</p>							
						</div>
					</div>
					@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<!-- ________________________________________________________Benefits Ends________________________________________________________ -->

<!-- ________________________________________________________Partners Begins________________________________________________________ -->

<section class="mp_partners">
	<div class="container">
		<div class="row">
			<h3>@lang('main.clients')</h3>
			<div class="mp_icon_head_2">
				<span><img src="{{ asset('site/img/mini-logo2.png') }}" alt=""></span>
			</div>
			<div class="mp_partners_slider owl-carousel">

				<div class="mp_partners_item col-sm-3 col-md-3 col-lg-3 col-xs-3">
					<div class="mp_partners_items">
						<?php $k=1; foreach ($client as $element): ?>
						<a href="{{ action('IndexController@oneClient', ['slug' => $element->slug]) }}">
							<img src="{{$element->img}}" alt="">
						</a>
						<?php if($k % 2 == 0){ echo "</div></div><div class='mp_partners_item col-sm-3 col-md-3 col-lg-3 col-xs-3'><div class='mp_partners_items'>"; } 
						$k++; endforeach; ?>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<!-- ________________________________________________________Partners Ends________________________________________________________ -->
@endsection