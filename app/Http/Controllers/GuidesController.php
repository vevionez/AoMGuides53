<?php namespace App\Http\Controllers;
use App\guides;
use App\gods;
use App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GuidesController extends Controller {

    public function __construct()
    {
        /*$this->middleware('auth', ['except' => ['index', 'show']]);
        $this->middleware('admin', ['except' => ['index', 'show']]);*/
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $godguides = guides::where('gods_id', '!=', 19)->get();
        $genguides = guides::where('gods_id', '=', 19)->get();
        return view('guides.index', compact('gods', 'godguides' , 'genguides'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $gods = gods::lists('name', 'id');
        return view('guides.create', compact('gods'));
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
            guides::create([
                'name' => $request->get('name'),
                'gods_id' => $request->get('gods_id'),
                'slug' => str_slug($request->get('name'), "-"),
                'description' => $request->get('description'),
                'author' => $request->get('author'),
                'image' => $filename,
            ]);
        }
        else{
            guides::create([
                'name' => $request->get('name'),
                'gods_id' => $request->get('gods_id'),
                'slug' => $request->get('name'),
                'description' => $request->get('description'),
                'author' => $request->get('author'),
            ]);
        }
        return redirect()->route('guides.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(\App\guides $guide)
	{
        $guide->increment('views');
        return view('guides.show' , compact('guide'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(guides $guide)
	{
        $gods = gods::pluck('name', 'id');
        return view('guides.edit', compact('guide', 'gods'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request, guides $guide)
    {
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $destinationPath = 'images';
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move($destinationPath, $filename);
            $data = [
                'name' => $request->get('name'),
                'gods_id' => $request->get('gods_id'),
                'slug' => str_slug($request->get('name'), "-"),
                'description' => $request->get('description'),
                'author' => $request->get('author'),
                'image' => $filename,
            ];
        }
        else{
            $data = [
                'name' => $request->get('name'),
                'gods_id' => $request->get('gods_id'),
                'slug' => str_slug($request->get('name'), "-"),
                'description' => $request->get('description'),
                'author' => $request->get('author'),
            ];
        }
        $guide->update($data);
        return redirect()->route('guides.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(guides $guide)
	{
        $guide->delete();
        // redirect
        Session::flash('success', 'Successfully deleted the guide: ' . $guide->name );
        return redirect()->route('guides.index');
	}

    public function upvote(guides $guide)
    {
        $guide->increment('votes');
        Session::put('voted_guide_' . $guide->id , true);
        return redirect()->back();
    }
    public function downvote(guides $guide)
    {
        $guide->decrement('votes');
        Session::put('voted_guide_' . $guide->id , true);
        return redirect()->back();
    }
}
