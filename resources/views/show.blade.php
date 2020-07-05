@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Show Movie') }}</div>

                <div class="card-body">
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control" name="title" value="{{ $movie->title }}" required autofocus />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                        <div class="col-md-6">
                            <input id="genre" type="text" class="form-control" name="genre" value="{{ $movie->genre }}" required autofocus />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="director" class="col-md-4 col-form-label text-md-right">{{ __('Director') }}</label>

                        <div class="col-md-6">
                            <input id="director" type="text" class="form-control" name="director" value="{{ $movie->director }}" required autofocus />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                        <div class="col-md-6">
                            <input id="year" type="number" class="form-control" name="year" value="{{ $movie->year }}" required autofocus />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="minutes" class="col-md-4 col-form-label text-md-right">{{ __('Minutes') }}</label>

                        <div class="col-md-6">
                            <input id="minutes" type="number" class="form-control" name="minutes" value="{{ $movie->minutes }}" required autofocus />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
