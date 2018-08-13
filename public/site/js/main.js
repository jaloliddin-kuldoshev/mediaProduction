$(document).ready(function(){

	// Находим блок карусели
	var carousel = $("#carousel");

	// Запускаем плагин карусели
	carousel.owlCarousel({
		items:4,
		itemsDesktop : [1200,4],
		itemsDesktopSmall : [992,2],
		itemsTablet: [768,2],
		itemsMobile : [0,1]
	});

	autoPlay: true

	// Запускаем плагин карусели
	carousel.owlCarousel({
		// Точки под каруселью
		pagination: true
	});

});


$('.block0').hover(function(){
	$('.0').siblings().removeClass('block');
	$('.0').addClass('block')
});

$('.block1').hover(function(){
	$('.1').siblings().removeClass('block');
	$('.1').addClass('block')
});

$('.block2').hover(function(){
	$('.2').siblings().removeClass('block');
	$('.2').addClass('block')
});


$(document).ready(function(){

	// Находим блок карусели
	var carousel = $("#carousel-blog");

	// Запускаем плагин карусели
	carousel.owlCarousel({
		items:2,
		itemsDesktop : [1200,1],
		itemsDesktopSmall : [992,1],
		itemsTablet: [768,1],
		itemsMobile : [0,1]
	});
});

$(document).ready(function(){

	// Находим блок карусели
	var carousel = $("#carousel-partners");

	// Запускаем плагин карусели
	carousel.owlCarousel({
		items:4,
		itemsDesktop : [1200,4],
		itemsDesktopSmall : [992,3],
		itemsTablet: [768,2],
		itemsMobile : [0,1]
	});
});

$(document).ready(function(){
	var owl = $(".mp_slider_items");
	owl.owlCarousel({
		items : 1, 
		itemsDesktop : [1000,1],
		itemsDesktopSmall : [900,1], 
		itemsTablet: [600,1], 
		itemsMobile : false,
		navigation: false,
		pagination: false,
		margin:30,
		autoPlay : 5000,
		slideSpeed : 300,
		stagePadding:30,
		smartSpeed:450,
		transitionStyle : "fade",    

	});
	$(".next").click(function(){
		owl.trigger('owl.next');
	})
	$(".prev").click(function(){
		owl.trigger('owl.prev');
	})

	var owl1 = $(".mp_service_slider");
	owl1.owlCarousel({

      // autoPlay: 3000, //Set AutoPlay to 3 seconds

      items:4,
      itemsDesktop : [1200,3],
      itemsDesktopSmall : [992,2],
      itemsTablet: [768,2],
      itemsMobile : [600,1]

    });
	var owl2 = $(".mp_blog_slider");
	owl2.owlCarousel({

      autoPlay: 5000, //Set AutoPlay to 3 seconds

      items:2,
      itemsDesktop : [1200,2],
      itemsDesktopSmall : [992,2],
      itemsTablet: [768,1],
      itemsMobile : [0,1]

    });

	$(".mp_partners_slider").owlCarousel({

      // autoPlay: 5000, //Set AutoPlay to 3 seconds

      items : 4,

    });

});
function openNav() {
	document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
	document.getElementById("myNav").style.height = "0%";
}

$(document).ready(function(){
	$('.mp_port_in_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		dots: true,
		asNavFor: '.mp_port_in_slider_for'
	});
	$('.mp_port_in_slider_for').slick({
		slidesToShow: 4,
		slidesToScroll: 3,
		asNavFor: '.mp_port_in_slider',
		dots: false,
		centerMode: false,
		prevArrow: '<div class="slick-button-left"><span class="fa fa-angle-left"></span><span class="sr-only">Prev</span></div>',

		nextArrow: '<div class="slick-button-right"><span class="fa fa-angle-right"></span><span class="sr-only">Next</span></div>',
		responsive: [
		{
			breakpoint: 768,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '40px',
				slidesToShow: 3
			}
		},
		{
			breakpoint: 480,
			settings: {
				arrows: false,
				centerMode: true,
				centerPadding: '90px',
				slidesToShow: 1
			}
		}
		]
	});
});

$(document).ready(function(){
	$('.mp_port_in_content_slider').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		fade: true,
		dots: true,
		lazyLoad:'progressive',
	});
});

$(document).ready(function(){
	$(document).on('click','.btn-more',function(){
		var element = $(this);
		var id = $(this).attr('data-id');;
		element.html("Загружается....");
		$.ajax({
			url : '/blogMore',
			method : "GET",
			data : {id:id},
			dataType : "text",
			success : function (data)
			{
				if(data != '') 
				{
					// $('.mp_blog_page_more').remove();
					$('.mp_blog_page_content_items').append(JSON.parse(data).content);
					element.attr("data-id", JSON.parse(data).id)
					element.html("показать еще");
					// console.log(data);
				}
				else
				{
					element.html("Нет данных");
				}
			}
		});
	});  
}); 
$(document).ready(function(){
	$(document).on('click','.client-more',function(){
		var element = $(this);
		var id = $(this).attr('data-id');;
		element.html("Загружается....");
		$.ajax({
			url : '/clientMore',
			method : "GET",
			data : {id:id},
			dataType : "text",
			success : function (data)
			{
				if(data != '') 
				{
					// $('.mp_blog_page_more').remove();
					$('.mp_client_content').append(JSON.parse(data).content);
					element.attr("data-id", JSON.parse(data).id)
					element.html("показать еще");
					// console.log(data);
				}
				else
				{
					element.html("Нет данных");
				}
			}
		});
	});  
});
$(document).ready(function(){
	$(document).on('click','.port-more',function(){
		var element = $(this);
		var id = $(this).attr('data-id');;
		element.html("Загружается....");
		$.ajax({
			url : '/portfolioMore',
			method : "GET",
			data : {id:id},
			dataType : "text",
			success : function (data)
			{
				if(data != '') 
				{
					// $('.mp_blog_page_more').remove();
					$('.mp_port_page_content_item').append(JSON.parse(data).content);
					element.attr("data-id", JSON.parse(data).id)
					element.html("показать еще");
					// console.log(data);
				}
				else
				{
					element.html("Нет данных");
				}
			}
		});
	});  
});
$(document).ready(function(){
	$(document).on('click','.cat-more',function(){
		var element = $(this);
		var id = $(this).attr('data-id');;
		var cat_id = $(this).attr('data-cat-id');
		element.html("Загружается....");
		$.ajax({
			url : '/categoryMore',
			method : "GET",
			data : {id:id, cat_id:cat_id},
			dataType : "text",
			success : function (data)
			{
				if(data != '') 
				{
					// $('.mp_blog_page_more').remove();
					$('.mp_port_page_content_item').append(JSON.parse(data).content);
					element.attr("data-id", JSON.parse(data).id)
					element.html("показать еще");
					// console.log(data);
				}
				else
				{
					element.html("Нет данных");
				}
			}
		});
	});  
});
$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$('#search').keydown(function(e){
		var keyCode = (e.keyCode ? e.keyCode : e.which);
		var search = escape($(this).val());
		if (keyCode == 13) {
			$.ajax({
				url: '/search/',
				data: {search: search},
				success: function(res){
					console.log(search);
					$('.mp_blog_page_content_items').html(res);
					$('.mp_blog_page_more').remove();
				}  
			});
		}
		return;
	});
});
$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	$(document).on('click','#blog_search',function(){
		var search = escape($("#search").val()); 
		$.ajax({
			url: '/searchBlog/',
			data: {search: search},
			success: function(res){
				console.log(search);
				$('.mp_blog_page_content_items').html(res);
				$('.mp_blog_page_more').remove();
			}  
		});
		return;
	});
});
$('.down-button').click(function () {
	var scrollFromTop = $('.mp_form_forms').offset().top;

	$('html,body').animate({ scrollTop: scrollFromTop }, 1000);

	return false;
});
var var1 = $('.mp_header_navigation_menu').offset().top;
$(window).scroll(function(){
	if ($(window).scrollTop() >= var1) {
		$('.mp_header').addClass('main_fixed-header');

	}
	else {
		$('.mp_header').removeClass('main_fixed-header');
	}
});