<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Contacts;
use App\Model\Blog;
use App\Model\Service;
use App\Model\Client;
use App\Model\Portfolio;
use App\Model\PortImages;
use App\Model\Category;
use App\Model\Slider;
use App\Model\Benefits;
use App\Model\Warehouses;
use Mail;
use Lang;
use DB;

class IndexController extends Controller
{
    //
	public function index()
	{
		$slider = Slider::all();
		$service = Service::where('show_on_main', 1)->with('imgOne')->get();
		$client = Client::where('show_on_main', 1)->get();
		$blog = Blog::where('show_on_main', 1)->get();
		$cat = Category::where('show_on_main', 1)->get();
		$ben = Benefits::all();
		$port = Portfolio::where('show_on_main', 1)->with('imgOne')->get();
		return view('site.index', [
			'slider' => $slider,
			'service' => $service,
			'client' => $client,
			'blog' => $blog,
			'cat' => $cat,
			'ben' => $ben,
			'port' => $port,
		]);
	}
	public function contacts()
	{
		$contacts = Contacts::find(1);
		return view('site.contacts', [
			'con' => $contacts
		]);
	}
	public function blog()
	{
		$blog = Blog::orderBy('id','DESC')->limit(6)->get();
		$pop = Blog::orderBy('view', 'desc')->get()->take(4);
		return view('site.blog', [
			'blog' => $blog,
			'pop' => $pop
		]);
	}
	public function blogMore(Request $request)
	{
		$output = '';
		$id = $request->id;

		$posts = Blog::where('id','<',$id)->orderBy('id','DESC')->limit(2)->get();

		if(!$posts->isEmpty())
		{
			foreach($posts as $element)
			{
				$url = url('blog/'.$element->slug);

				$output .= '<div class="mp_blog_page_items col-sm-4 col-md-3 col-lg-3 col-xs-6">
				<div class="mp_blog_page_item">
				<div class="mp_blog_page_item_img">
				<img src="'.$element->img.'" alt="">
				</div>
				<div class="mp_blog_page_item_content">
				<p>'.  date("d M Y", strtotime($element->created_at)) .'</p>
				<h4>'.$element['title_' . Lang::getLocale()] .'</h4>
				<p class="mp_blog_page_item_des">'. str_limit(strip_tags($element['text_' . Lang::getLocale()]), 100) .'</p>
				<a href="'.$url.'">подробнее</a>
				</div>
				</div>
				</div>';
			}

			// $output .= '<div class="mp_blog_page_more">
			// <button class="btn-more" data-id="'.$element->id.'" type="button">показать еще</button>
			// </div>';

			return response()->json(['content' => $output, 'id' => $element->id]);
		}
	}

	public function search(Request $request){

		$input = $request->all();
		$search = $input['search'];
		$data = DB::table('blogs')
		->where('title_ru', 'like', "%$search%")
		->orWhere('title_uz', 'like', "%$search%")
		->orWhere('text_uz', 'like', "%$search%")
		->orWhere('text_ru', 'like', "%$search%")
		->get();
		return response()->view('site.partials.search', ['search' => $data]);
	}
	public function searchBlog(Request $request){

		$input = $request->all();
		$search = $input['search'];
		$data = DB::table('blogs')
		->where('title_ru', 'like', "%$search%")
		->orWhere('title_uz', 'like', "%$search%")
		->orWhere('text_uz', 'like', "%$search%")
		->orWhere('text_ru', 'like', "%$search%")
		->get();
		return response()->view('site.partials.search', ['search' => $data]);
	}
	public function oneBlog($slug)
	{
		$blog = Blog::where('slug', $slug)->first();
		$pop = Blog::orderBy('view', 'desc')->get()->take(4);
		$blog->view = $blog->view + 1;
		$blog->save();
		// echo "<pre>";
		// print_r($blog);
		// echo "</pre>";
		// die();
		return view('site.oneBlog', [
			'blog' => $blog,
			'pop' => $pop,
		]);
	}
	public function client()
	{
		$client = Client::orderBy('id','DESC')->limit(6)->get();
		return view('site.client', [
			'client' => $client,
		]);
	}
	public function clientMore(Request $request)
	{
		$output = '';
		$id = $request->id;

		$posts = Client::where('id','<',$id)->orderBy('id','DESC')->limit(2)->get();

		if(!$posts->isEmpty())
		{
			foreach($posts as $element)
			{
				$url = url('client/'.$element->slug);
				$title = $element['title_' . Lang::getLocale()];
				$text = str_limit($element['text_' . Lang::getLocale()], 100);

				$output .= '<div class="mp_client_items col-sm-4 col-md-3 col-lg-3 col-xs-6">
				<div class="mp_client_item">
				<div class="mp_client_item_img">
				<img src="'.$element->img.'" alt="">
				</div>
				<div class="mp_client_item_text">
				<h4>'.$title.'</h4>
				'.$text.'
				<a href="'.$url.'">читать далее</a>
				</div>
				</div>
				</div>';
			}

			// $output .= '<div class="mp_blog_page_more">
			// <button class="btn-more" data-id="'.$element->id.'" type="button">показать еще</button>
			// </div>';

			return response()->json(['content' => $output, 'id' => $element->id]);
		}
	}
	public function oneClient($slug)
	{
		$client = Client::where('slug', $slug)->first();
		$works = Client::where('slug', $slug)->first()->portfolio;
		return view('site.oneClient', [
			'client' => $client,
			'works' => $works,
		]);
	}
	public function service()
	{
		$service = Service::orderBy('id','DESC')->with('imgOne')->get();
		// echo "<pre>";
		// print_r($service);
		// echo "</pre>";
		// die();
		return view('site.service', [
			'service' => $service,

		]);
	}
	public function oneService($slug)
	{
		$service = Service::where('slug', $slug)->first();
		$serImg = Service::where('slug', $slug)->with('img')->first();
		$comp = Service::where('slug', $slug)->first()->ser;
		return view('site.oneService', [
			'service' => $service,
			'serImg' => $serImg,
			'comp' => $comp
		]);
	}
	public function portfolio()
	{
		$port = Portfolio::orderBy('id','DESC')->limit(16)->with('imgOne')->get();
		$cat = Category::orderBy('id','DESC')->get();

		return view('site.portfolio', [
			'port' => $port,
			'cat' => $cat,
		]);

	}
	public function portfolioMore(Request $request)
	{
		$output = '';
		$id = $request->id;

		$posts = Portfolio::where('id','<',$id)->orderBy('id','DESC')->limit(2)->get();

		if(!$posts->isEmpty())
		{
			foreach($posts as $element)
			{
				$url = url('portfolio/'.$element->slug);
				$title = $element['title_' . Lang::getLocale()];
				$text = str_limit($element['text_' . Lang::getLocale()], 100);

				$output .= '<div class="mp_port_page_items col-sm-4 col-md-3 col-lg-3 col-xs-6">
				<div class="mp_port_page_item">
				<img src="'.$element->imgOne->img.'" alt="">
				<a href="'.$url.'">'.$title.'</a>
				</div>
				</div>';
			}
			return response()->json(['content' => $output, 'id' => $element->id]);
		}
	}
	public function onePortfolio($slug)
	{
		$port = Portfolio::where('slug', $slug)->with('portfolio')->first();
		$porImg = Portfolio::where('slug', $slug)->first()->img;
		return view('site.onePortfolio', [
			'port' => $port,
			'porImg' => $porImg,
		]);
	}
	public function category($slug)
	{
		$cat = Category::orderBy('id','DESC')->get();
		$cats = Category::where('slug', $slug)->with('cat')->limit(16)->first();
		// echo "<pre>";
		// print_r($cats);
		// echo "</pre>";
		// die();
		return view('site.category', [
			'cat' => $cat,
			'cats' => $cats
		]);
	}
	public function categoryMore(Request $request)
	{
		$output = '';
		$id = $request->id;
		$cat_id = $request->cat_id;
		$posts = Portfolio::where([['id','<',$id],['categories_id', $cat_id]])->orderBy('id','DESC')->limit(2)->get();

		if(!$posts->isEmpty())
		{
			foreach($posts as $element)
			{
				$url = url('portfolio/'.$element->slug);
				$title = $element['title_' . Lang::getLocale()];
				$text = str_limit($element['text_' . Lang::getLocale()], 100);

				$output .= '<div class="mp_port_page_items col-sm-4 col-md-3 col-lg-3 col-xs-6">
				<div class="mp_port_page_item">
				<img src="'.$element->imgOne->img.'" alt="">
				<a href="'.$url.'">'.$title.'</a>
				</div>
				</div>';
			}
			return response()->json(['content' => $output, 'id' => $element->id]);
		}
	}
	public function workshop()
	{
		$work = Warehouses::find(1);
		return view('site.workshop', [
			'work' => $work,
		]);
	}
	public function send(Request $request)
	{
		$input = $request->all();
		$name = $request->input('name');
		$tel = $request->input('tel');
		$comp = $request->input('comp');
		$email = $request->input('email');
		$mes = $request->input('mes');
		$data = [
			'name' => $request->name,
			'comp' => $request->comp,
			'email' => $request->email,
			'tel' => $request->tel,
			'mes' => $request->mes,
		];
		Mail::send('email.mail', $data, function ($mail) use($request){
			$mail->from('test@ekrossovki.uz', $request->name);
			$mail->to('parker_gu@mail.ru')->subject('Site message');
		});
		return back();
	}

}