<?php namespace App\Http\Controllers;

use App\guides;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
/*	public function __construct()
	{
		$this->middleware('auth');
	}*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $featguides = guides::where('featured', '=', 1)->take(5)->get();
        $topguides = guides::orderBy('votes' , 'DESC')->take(5)->get();
        $viewguides = guides::orderBy('views' , 'DESC')->take(5)->get();
		return view('home', compact('gods', 'featguides', 'topguides', 'viewguides'));
	}

	public function tools()
	{
		return view('pages.tools');
	}
	public function clans()
	{
		return view('pages.clans');
	}

	public function streams()
	{
		// client ID : pny7awiybq67iag14dsmn7ycb90l37d
		$clientid = "pny7awiybq67iag14dsmn7ycb90l37d";
		$ch = curl_init();

		curl_setopt_array($ch, array(
			CURLOPT_HTTPHEADER => array(
				'Client-ID: ' . $clientId
			),
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_URL => "https://api.twitch.tv/kraken/streams?game=World%20of%20Warcraft"
		));

		$aomeestreams = curl_exec($ch);
		curl_close($ch);

		dd($aomeestreams);
		return view('pages.streams');
	}

}
