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
		// client ID - playground : pny7awiybq67iag14dsmn7ycb90l37d
		function getstreamsbygame($game){
			$clientId = "pny7awiybq67iag14dsmn7ycb90l37d"; // playground ID, change to own id when live
			$ch = curl_init();

			curl_setopt_array($ch, array(
				CURLOPT_HTTPHEADER => array(
					'Client-ID: ' . $clientId
				),
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_URL => "https://api.twitch.tv/kraken/streams?game=" . $game
			));

			$streams = curl_exec($ch);
			curl_close($ch);

			return json_decode($streams);
		}

		//aom:tt Age%20of%20Mythology%3A%20The%20Titans
		//aom:ee Age%20of%20Mythology%3A%20Extended%20Edition
		//aom : Age%20of%20Mythology
		$aomeestreams = getstreamsbygame("Age%20of%20Mythology%3A%20Extended%20Edition");
		$aomttstreams = getstreamsbygame("Age%20of%20Mythology%3A%20The%20Titans");
		$aomstreams = getstreamsbygame("Age%20of%20Mythology");


		return view('pages.streams', compact("aomeestreams", "aomttstreams", "aomstreams"));
	}

}
