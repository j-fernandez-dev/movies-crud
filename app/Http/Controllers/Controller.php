<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected $fields = ['title', 'genre', 'director', 'year', 'minutes'];
	protected $paginate = 5;

	protected $created  = 'Movie created successfully';
	protected $updated  = 'Movie updated successfully';
	protected $deleted  = 'Movie deleted successfully';
	protected $uploaded = 'Movies uploaded successfully';
	protected $error    = 'There has been a error';

	protected function saveMovie($id, $fields)
	{
		$movie = $id == NULL ? new \App\Movie : \App\Movie::find($id);

		foreach ($fields as $key => $value)
			$movie->$key = $value;

		return $movie->save();
	}

	protected function uploadMovies($request)
	{
		if (!$request->hasFile('file') or !$request->file('file')->isValid() or $request->file('file')->clientExtension() != "csv")
			return FALSE;

		$fp = fopen($request->file('file')->path(), "r");
		$n = 0;

		while (($linea = fgetcsv($fp, 0, ";")) !== FALSE) {
			if (count($linea) != count($this->fields))
				continue;

			try {
				$save = $this->saveMovie(NULL, [
					'title' => $linea[0],
					'genre' => $linea[1],
					'director' => $linea[2],
					'year' => $linea[3],
					'minutes' => $linea[4]
				]);

				if ($save)
					$n++;
			} catch (\Exception $e) {

			}
		}

		return $n;
	}
}
