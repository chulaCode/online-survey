@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Department') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('dept.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Department Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('number') is-invalid @enderror" w
                                name="name" value="{{ old('name') }}" 
                                required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Assign Chair ') }}</label>

                            <div class="col-md-6">
                            <div class="input-group mb-3">
                             
                             <div class="input-group-prepend">
                                 <label class="input-group-text" for="inputGroupSelect01">Options</label>
                             </div>
             
                             <select class="custom-select" id="inputGroupSelect01" name="chair_id">
                         
                                 @foreach($teachers as $result)
                                 <option value="{{$result->id}}" selected >{{$result->name}}</option>
                                 @endforeach
                             </select>
                             </div>
                            </div>
                        </div>

                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Department') }}
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
