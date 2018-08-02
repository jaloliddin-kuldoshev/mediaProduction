<!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" type="text/css" href="{{asset('site/owl-carousel/owl.carousel.css')}}"/>

  <link rel="stylesheet" type="text/css" href="{{asset('site/owl-carousel/owl.transitions.css')}}"/>

  <link rel="stylesheet" href="{{asset('site/owl-carousel/owl.theme.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('site/css/slick.css')}}"/>

  <link rel="stylesheet" type="text/css" href="{{asset('site/css/slick-theme.css')}}"/>

  <link rel="stylesheet" type="text/css" href="{{asset('site/css/bootstrap.min.css')}}">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('site/css/font-awesome.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('site/css/main.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('site/css/media.css')}}">
</head>
<body>
  <!-- ________________________________________________________Header Begins________________________________________________________ -->
  @php
  $con = \App\Model\Contacts::find(1)
  @endphp
  <section class="mp_header">
    <div class="container">

      <div class="row">
        <div class="mp_header_language">
          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
          <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="<?= App::getLocale() == $localeCode ? 'active' : '' ?>">
            {{ $properties['regional'] }}
          </a>&nbsp/&nbsp
          @endforeach
        </div>
        <div class="mp_header_container">
          <div class="mp_header_logo col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
            <a href="{{ action('IndexController@index') }}" class="mp_header_logo_img">
              <img src="{{asset('site/img/logo.png')}}" alt="">
            </a>
          </div>
          <div class="mp_header_navigation col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="mp_header_navigation_worktime col-sm-12 col-md-12 col-lg-12 col-xs-12">
              <div class="flex-item">
                <i class="material-icons time">access_time</i>
                <div class="text text-left">
                  <h5>@lang('main.timetable')</h5>
                  <h5>{{ $con->worktime }}</h5>
                </div>
              </div>
              <div class="flex-item">
                <div class="flex-item_img location">
                  <img src="{{ asset('site/img/mark.png') }}">
                </div>
                <div class="text text-left">
                  <h5 class="top_address">{{ $con->{'address_' . App::getLocale()} }}</h5>
                </div>
              </div>
              <div class="flex-item">
                <div class="flex-item_img stay">
                  <img src="{{ asset('site/img/iPhone.png') }}">
                </div>
                <div class="text text-left">
                  <h5>@lang('main.tel')</h5>
                  <h5>{{ $con->tel }}</h5>
                </div>
              </div>
              <div class="flex-item flex-item-btn">
                <button class="btn btn-info down-button" type="button">
                  @lang('main.callback')
                </button>
              </div>
              <div class="flex-item language">

               @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
               <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="<?= App::getLocale() == $localeCode ? 'active' : '' ?>">
                {{ $properties['regional'] }}
              </a>
              &nbsp/&nbsp
              @endforeach

            </div>
          </div>
          <div class="mp_header_navigation_menu">
            <div class="mp_header_navigation_menu_item">
              <a href="{{action('IndexController@service')}}">@lang('main.service')</a>
              <a href="{{action('IndexController@portfolio')}}">@lang('main.port')</a>
              <a href="{{action('IndexController@workshop')}}">@lang('main.workshop')</a>
              <a href="{{action('IndexController@client')}}">@lang('main.clients')</a>
              <a href="{{action('IndexController@blog')}}">@lang('main.blog')</a>
              <a href="{{action('IndexController@contacts')}}">@lang('main.contacts')</a>
            </div>
            <span  onclick="openNav()" class="mobile_menu_icon">&#9776;</span>
          </div>
          <div id="myNav" class="overlay">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="overlay-content">
             <a href="{{action('IndexController@service')}}">@lang('main.service')</a>
             <a href="{{action('IndexController@portfolio')}}">@lang('main.port')</a>
             <a href="{{action('IndexController@workshop')}}">@lang('main.workshop')</a>
             <a href="{{action('IndexController@client')}}">@lang('main.clients')</a>
             <a href="{{action('IndexController@blog')}}">@lang('main.blog')</a>
             <a href="{{action('IndexController@contacts')}}">@lang('main.contacts')</a>
           </div>
         </div>
       </div>
     </div>
   </div>

 </div>
</section>
<!-- ________________________________________________________Header Ends________________________________________________________ -->

@yield('content')

<!-- ________________________________________________________Forms Begins________________________________________________________ -->

<section class="mp_form">
  <div class="container">
    <div class="row">
      <h3>@lang('main.coop')</h3>
      <div class="mp_icon_head">
        <span><img src="{{asset('site/img/mini-logo1.png')}}" alt=""></span>
      </div>
      <div class="mp_form_content">
        <div class="mp_form_items col-sm-12 col-md-12 col-lg-12 col-xs-12">
          <div class="flex-item col-sm-6 col-md-3 col-lg-3 col-xs-6">
            <i class="material-icons time">access_time</i>
            <div class="text text-left">
              <h5>@lang('main.timetable')</h5>
              <h5>{{ $con->worktime }}</h5>
            </div>
          </div>
          <div class="flex-item col-sm-6 col-md-3 col-lg-3 col-xs-6">
            <div class="flex-item_img location">
              <img src="{{asset('site/img/mark.png') }}">
            </div>
            <div class="text text-left">
              <h5 class="top_address">{{ $con->{'address_' . App::getLocale()} }}</h5>
            </div>
          </div>
          <div class="flex-item col-sm-6 col-md-3 col-lg-3 col-xs-6">
            <div class="flex-item_img stay">
              <img src="{{ asset('site/img/iPhone.png') }}">
            </div>
            <div class="text text-left">
              <h5>@lang('main.tel')</h5>
              <h5>{{ $con->tel }}</h5>
            </div>
          </div>
          <div class="flex-item col-sm-6 col-md-3 col-lg-3 col-xs-6">
            <i class="material-icons email">mail_outline</i>
            <div class="text text-left">
              <h5>@lang('main.write')</h5>
              <h5>{{ $con->email }}</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="mp_form_forms">
        <h4>@lang('main.callback')</h4>
        <form action="{{action('IndexController@send')}}" method="post">
          {!! csrf_field() !!}
          <div class="mp_form_inputs">
            <div class="mp_form_input col-sm-6 col-md-3 col-lg-3 col-xs-">
              <input type="text" name="name" placeholder="@lang('main.name')">
            </div>
            <div class="mp_form_input col-sm-6 col-md-3 col-lg-3 col-xs-">
              <input type="email" name="email" placeholder="Email">
            </div>
            <div class="mp_form_input col-sm-6 col-md-3 col-lg-3 col-xs-">
              <input type="tel" name="tel" placeholder="@lang('main.phone')">
            </div>
            <div class="mp_form_input col-sm-6 col-md-3 col-lg-3 col-xs-">
              <input type="text" name="comp" placeholder="@lang('main.comp')">
            </div>
          </div>  
          <div class="mp_form_textarea col-sm-12 col-md-12 col-lg-12 col-xs-12">
            <textarea name="mes" id="" cols="30" rows="10" placeholder="@lang('main.message')"></textarea>
          </div>
          <div class="mp_form_more">
            <button type="submit" class="btn btn-info">@lang('main.sendus')</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- ________________________________________________________Forms Ends________________________________________________________ -->


<!-- ________________________________________________________Footer Begins________________________________________________________ -->

<section class="mp_footer">
  <div class="container">
    <div class="row">
      <div class="mp_footer_content">
        <div class="mp_footer_wrap col-sm-6 col-md-3 col-lg-3 col-xs-6">
          <div class="mp_footer_info">
            <div class="mp_footer_logo">
              <img src="{{asset('site/img/mini-logo.png')}}" alt="">
              <p>@lang('main.rights')</p>
            </div>
            <h4>@lang('main.address')</h4>
            <p>{{ $con->{'address_' . App::getLocale()} }}</p>
            <h4>@lang('main.near')</h4>
            <p>{{ $con->{'near_' . App::getLocale()} }} </p>
            <h4>@lang('main.phone')</h4>
            <p>{{ $con->tel }} </p>
            <h4>@lang('main.email')</h4>
            <p><span>{{ $con->email }} </span></p>
          </div>
        </div>
        <div class="mp_footer_wrap col-sm-6 col-md-3 col-lg-3 col-xs-6">
          <div class="mp_footer_service">
            <h3>@lang('main.service')</h3>
            <div class="mp_footer_ser_menu">
              @foreach (\App\Model\Service::where('show_on_main', 1)->get() as $element)
              <a href="{{url('service/'.$element->slug)}}">{{$element->{'title_' . App::getLocale()} }}</a>
              @endforeach
            </div>
          </div>
        </div>
        <div class="mp_footer_wrap col-sm-6 col-md-3 col-lg-3 col-xs-6">
          <div class="mp_footer_service">
            <h3>@lang('main.port')</h3>
            <div class="mp_footer_ser_menu">
              @foreach (\App\Model\Portfolio::where('show_on_main', 1)->get()->take(5) as $element)
              <a href="{{url('portfolio/'.$element->slug)}}">{{$element->{'title_' . App::getLocale()} }}</a>
              @endforeach
            </div>
          </div>
        </div>
        <div class="mp_footer_wrap col-sm-6 col-md-3 col-lg-3 col-xs-6">
          <div class="mp_footer_service">
            <h3>@lang('main.social')</h3>
            <div class="mp_footer_social">  
              <a href="{{ $con->face }}">
                <img src="{{asset('site/img/f.png')}}" alt="">
              </a>
              <a href="{{ $con->twit }}">
                <img src="{{asset('site/img/t.png')}}" alt="">
              </a>
              <a href="{{ $con->ins }}">
                <img src="{{asset('site/img/i.png')}}" alt="">
              </a>
              <a href="{{ $con->tele }}">
                <img src="{{asset('site/img/tel.png')}}" alt="">
              </a>
              <a href="{{ $con->ok }}">
                <img src="{{asset('site/img/o.png')}}" alt="">
              </a>
              <a href="{{ $con->vk }}">
                <img src="{{asset('site/img/b.png')}}" alt="">
              </a>
            </div>              
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="{{asset('site/js/jquery-3.3.1.min.js')}}"></script>

<script type="text/javascript" src="{{asset('site/js/bootstrap.min.js')}}"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="{{asset('site/owl-carousel/owl.carousel.min.js')}}"></script>

<script type="text/javascript" src="{{asset('site/js/slick.js')}}"></script>

<script src="{{asset('site/js/main.js')}}"></script>



</body>
</html>