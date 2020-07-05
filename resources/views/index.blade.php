@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
					@if (session('message'))
						<div class="alert alert-primary">{{ session('message') }}</div>
					@endif

					<div class="form-group">
						<a href="{{ route('movies.create') }}">
							<button type="button" class="btn btn-success">Create</button>
						</a>
					</div>

					<div class="form-group">
						<form method="GET" action="{{ route('movies.index') }}">
							<div class="form-group row">
								<label for="title" class="col-md-1 col-form-label text-md-left">{{ __('Title') }}</label>

								<div class="col-md-6">
									<input id="title" type="title" class="form-control" name="title" autofocus />
								</div>

								<button type="submit" class="btn btn-primary">{{ __('Search') }}</button>
							</div>
						</form>
					</div>

					<div class="form-group">
						<form method="POST" action="{{ route('movies.upload') }}" enctype="multipart/form-data">
							@csrf
							<div class="form-group row">
								<label for="file" class="col-md-1 col-form-label text-md-left">{{ __('File') }}</label>

								<div class="col-md-6">
									<input id="file" type="file" name="file" required autofocus />
								</div>

								<button type="submit" class="btn btn-dark">{{ __('Upload') }}</button>
							</div>
						</form>
					</div>
				</div>

                <div class="card-body">
					{{ $movies->withQueryString()->links() }}

					<table class="table">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">Title</th>
								<th scope="col"></th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach ($movies as $movie)
								<tr>
									<th scope="row">{{ $movie->id }}</th>
									<td>{{ $movie->title }}</td>
									<td>
										<form action="{{ route('movies.edit', $movie->id) }}" method="GET">
											<button type="submit" class="btn btn-primary">Edit</button>
										</form>
									</td>
									<td>
										<form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn btn-danger">Delete</button>
										</form>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
