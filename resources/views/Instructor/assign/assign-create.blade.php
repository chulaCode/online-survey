@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Assign student to a course ') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('assign.store') }}">
                        @csrf
                        <div class="form-group row">

                            <label for="sem_id" class="col-md-4 col-form-label text-md-right">{{ __('Courses') }}</label>
                            <div class="col-md-6">
                              <div class="input-group mb-3">
                             
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                </div>
                
                                <select class="custom-select" id="inputGroupSelect01" name="course">
                               
                                      <!--<option selected>Choose student...</option>-->
                                    @foreach($courses as $result)
                                    <option value="{{$result->ccode}}" selected>{{$result->cname}}</option>
                                 @endforeach
                                </select>
                                </div>
                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Student') }}</label>

                            <div class="col-md-6">
                           
                              <div class="input-group mb-3">
                
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="student">
                                    <!--<option selected>Choose student...</option>-->
                                    @foreach($student as $result)
                                    <option value="{{$result->number}}" selected>{{$result->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                             
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Assign') }}
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
