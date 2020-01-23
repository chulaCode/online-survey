@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Courses') }}</div>

                <div class="card-body">
                    <form  action="{{route('course.update',$result->id)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PATCH')
                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Course Code') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="text" 
                                class="form-control @error('number') is-invalid @enderror" 
                                name="ccode" value="{{ old('number') ?? $result->ccode }}" 
                                required autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Course Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') ?? $result->cname }}" 
                                required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       

                        <div class="form-group row">
                            <label for="max" class="col-md-4 col-form-label text-md-right">{{ __('maximum number of student') }}</label>

                            <div class="col-md-6">
                                <input id="max" type="number"
                                 class="form-control @error('max') is-invalid @enderror" 
                                 name="max" value="{{ old('max') ?? $result->max_num}}"
                                 required autocomplete="dept_id">

                                @error('max')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="credit" class="col-md-4 col-form-label text-md-right">{{ __('Course Credit') }}</label>

                            <div class="col-md-6">
                                <input id="credit" type="number"
                                 class="form-control @error('sem_id') is-invalid @enderror" 
                                 name="credit" value="{{ old('credit') ?? $result->credit}}"
                                 required autocomplete="credit">

                                @error('credit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input type="file" class="form-control-file" id="image" name="image">
                                 
                                @if ($errors->has('image'))
                                <strong>{{ $errors->first('image') }}</strong>
                               @endif

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
