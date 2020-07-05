@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Movie') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('movies.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" required autofocus />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Genre') }}</label>

                            <div class="col-md-6">
                                <input id="genre" type="text" class="form-control" name="genre" required autofocus />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="director" class="col-md-4 col-form-label text-md-right">{{ __('Director') }}</label>

                            <div class="col-md-6">
                                <input id="director" type="text" class="form-control" name="director" required autofocus />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="number" class="form-control" name="year" required autofocus />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="minutes" class="col-md-4 col-form-label text-md-right">{{ __('Minutes') }}</label>

                            <div class="col-md-6">
                                <input id="minutes" type="number" class="form-control" name="minutes" required autofocus />
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
