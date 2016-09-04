<?php namespace App\Http\Controllers;

use App\gods;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RecsController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
        /*$this->middleware('admin', ['except' => ['index', 'show']]);*/
    }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $recs = Recs::where("published", 1)->get();
            return view('recs.index', compact('gods', 'recs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        $gods = gods::pluck('name', 'id');
        return view('recs.create', compact('gods'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
/*        $this->validate($request, [
            'file_path' => 'required|mimes:rcx,zip,svx,rar,RCX,ZIP,SVX,RAR',
        ]);*/
        if ($request->hasFile('file_path')){
                $image = $request->file('file_path');
                $destinationPath = 'recs';
                $filename = time() . '-' . $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                Recs::create([
                    'name' => $request->get('name'),
                    'gods_id' => $request->get('gods_id'),
                    'slug' => str_slug($request->get('name'), "-"),
                    'description' => $request->get('description'),
                    'author' => $request->get('author'),
                    'patch' => $request->get('patch'),
                    'file_path' => $destinationPath . '/' . $filename,
                ]);
            }
                /*return redirect()->back()->withInput()->with('error' , 'Wrong file Extension! Make sure it is .rcx .zip or .rar!!');*/
        else{
            return redirect()->route('recorded_games.index')->withInput()->with('error' , 'You need to upload a recorded game!');
        }
        return redirect()->route('recorded_games.index')->withInput()->with('success' , 'Succesfully submitted recorded game!');
    }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Recs $rec)
	{

        $rec->increment('views');
        return view('recs.show', compact('rec'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Recs $rec)
	{
        $gods = gods::pluck('name', 'id');
        return view('recs.edit', compact('rec', 'gods'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function update(Request $request, Recs $rec)
    {
        if ($request->hasFile('file_path')){
            $image = $request->file('file_path');
            $destinationPath = 'recs';
            $filename = time() . '-' . $image->getClientOriginalName();
            $image->move($destinationPath, $filename);
            $data = [
                'name' => $request->get('name'),
                'gods_id' => $request->get('gods_id'),
                'slug' => str_slug($request->get('name'), "-"),
                'description' => $request->get('description'),
                'patch' => $request->get('patch'),
                'file_path' => $destinationPath . '/' . $filename,
            ];
        }
        else{
            $data = [
                'name' => $request->get('name'),
                'gods_id' => $request->get('gods_id'),
                'slug' => $request->get('name'),
                'description' => $request->get('description'),
                'author' => $request->get('author'),
                'patch' => $request->get('patch'),
            ];
        }
        $rec->update($data);
        return redirect()->route('recorded_games.index');
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy(Recs $rec)
    {
        $rec->delete();
        // redirect
        Session::flash('success', 'Successfully deleted the recorded game: ' . $rec->name );
        return redirect()->route('recorded_games.index');
    }

    public function upvote(Recs $rec)
    {
        $rec->increment('votes');
        Session::put('voted_rec_' . $rec->id , true);
        return redirect()->back();
    }
    public function downvote(Recs $rec)
    {
        $rec->decrement('votes');
        $rec->save();
        Session::put('voted_rec_' . $rec->id , true);
        return redirect()->back();
    }
}
