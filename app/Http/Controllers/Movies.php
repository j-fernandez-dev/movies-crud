<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class Movies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$movies = \App\Movie::where('title', 'like', '%' . $request->input('title', '') . '%')->paginate($this->paginate);

		return view('index', ['movies' => $movies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$save = $this->saveMovie(NULL, $request->only($this->fields));

		return Redirect::to('movies')->with('message', $save ? $this->created : $this->error);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$movie = \App\Movie::find($id);

		return view('show', ['movie' => $movie]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$movie = \App\Movie::find($id);

		return view('edit', ['movie' => $movie]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$save = $this->saveMovie($id, $request->only($this->fields));

		return Redirect::to('movies')->with('message', $save ? $this->updated : $this->error);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$delete = \App\Movie::find($id)->delete();

		return Redirect::to('movies')->with('message', $delete ? $this->deleted : $this->error);
    }

	public function upload(Request $request)
	{
		$upload = $this->uploadMovies($request);

		return Redirect::to('movies')->with('message', $upload === FALSE ? $this->error : $this->uploaded . " ($upload)");
	}
}
