<?php namespace App\Http\Controllers;

use App\gods;
use App\guides;
use App\Http\Requests;
use App\Recs;
use Illuminate\Http\Request;

class GodsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $gods = gods::where('displayed', '=', 1)->orderBy('id', 'ASC')->get()->chunk(3);
        $guides = guides::get();
        $recs = Recs::get();
        return view('gods.index', compact('gods', 'guides', 'recs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return view('gods.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $destinationPath = 'images';
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move($destinationPath, $filename);
            gods::create([
                'name' => $request->get('name'),
                'slug' => $request->get('name'),
                'description' => $request->get('description'),
                'image' => $filename,
                'tier' => $request->get('tier')
            ]);
        }
        else{
            gods::create([
                'name' => $request->get('name'),
                'slug' => $request->get('name'),
                'description' => $request->get('description'),
                'tier' => $request->get('tier')
            ]);
        }
        return redirect('gods');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(gods $god)
	{
        $recs = $god->Recs()->orderBy('votes', 'DESC')->get();
        $guides = $god->guides()->orderBy('votes', 'DESC')->get();
		$videos = $god->videos()->get();
        return view('gods.show' , compact('god', 'guides', 'recs', 'videos'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(gods $gods)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(gods $gods)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(gods $gods)
	{
		//
	}

}
