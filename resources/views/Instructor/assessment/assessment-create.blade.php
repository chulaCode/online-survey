@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Verifications for courses (exams and semester workload)') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('assessment.store') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="sem_id" class="col-md-4 col-form-label text-md-right">{{ __('Activities') }}</label>

                            <div class="col-md-6">
                                <input id="activity" type="text"
                                 class="form-control @error('activity') is-invalid @enderror" 
                                 name="activity" required autocomplete="activity">

                                @error('activity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="number" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="number" value="{{ old('number') }}" 
                                required autocomplete="" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="duration" class="col-md-4 col-form-label text-md-right">{{ __('Duration (hours)') }}</label>

                            <div class="col-md-6">
                                <input id="duration" type="number" 
                                class="form-control @error('duration') is-invalid @enderror" 
                                name="duration" value="{{ old('duration') }}" 
                                 autocomplete="duration">

                                @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="workload" class="col-md-4 col-form-label text-md-right">{{ __('Total course Workload ') }}</label>

                            <div class="col-md-6">
                                <input id="workload" type="number"
                                 class="form-control @error('workload') is-invalid @enderror" 
                                 name="workload" required autocomplete="dept_id">

                                @error('dept_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Course Code') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="text" 
                                class="form-control @error('number') is-invalid @enderror" 
                                name="ccode" value="{{ old('number') }}" 
                                required autocomplete="number" autofocus>

                                @error('number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
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
