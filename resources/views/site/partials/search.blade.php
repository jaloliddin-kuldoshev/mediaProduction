@foreach ($search as $element)
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
			<a href="{{url('blog/'.$element->slug)}}">подробнее</a>
		</div>
	</div>
</div>
@endforeach