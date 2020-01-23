@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Semester') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('semester.update',$result->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="sem_id" class="col-md-4 col-form-label text-md-right">{{ __('Semester Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                 class="form-control @error('name') is-invalid @enderror" 
                                 name="name" value="{{ old('ccode') ?? $result->sname}}"
                                  required autocomplete="name">
                                 

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">{{ __('Year') }}</label>

                            <div class="col-md-6">
                                <input id="year" type="text" 
                                class="form-control @error('year') is-invalid @enderror" 
                                name="year" value="{{ old('ccode') ?? $result->year}}"
                                required autocomplete="" autofocus>

                                @error('year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save Changes') }}
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
