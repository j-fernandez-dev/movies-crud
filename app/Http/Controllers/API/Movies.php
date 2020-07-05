<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Movies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		return \App\Movie::where('title', 'like', '%' . $request->input('title', '') . '%')->paginate($this->paginate)->withQueryString();
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

		return response()->json([
			'message' => $this->created
		]);
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

		return response()->json($movie);
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

		return response()->json([
			'message' => $this->updated
		]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		\App\Movie::find($id)->delete();

		return response()->json([
			'message' => $this->deleted
		]);
    }

	public function upload(Request $request)
	{
		$upload = $this->uploadMovies($request);

		return response()->json([
			'message' => $upload === FALSE ? $this->error : $this->uploaded . " ($upload)"
		]);
	}
}
