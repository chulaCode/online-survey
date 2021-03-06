@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('question.store')}}"  method="post">
        @csrf

        <div class="row">
            <div class="col-8 offset-2">

                <div class="row">
                    <h1>Add New Question</h1>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Question Number</label>

                    <input id="number"
                           type="number"
                           class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}"
                           name="number"
                           value="{{ old('number') }}"placeholder="Enter question number"
                           autocomplete="" autofocus>

                    @if ($errors->has('number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="title" class="col-md-4 col-form-label">Question title</label>

                    <input id="title"
                           type="text"
                           class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                           name="title"
                           value="{{ old('title') }}"
                           autocomplete="title" placeholder="Enter the title of question (header or sub)"autofocus>

                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">Question</label>

                    <input id="name"
                           type="text"
                           class="form-control{{ $errors->has('caption') ? ' is-invalid' : '' }}"
                           name="name"
                           value="{{ old('name') }}"placeholder="Enter question question"
                           autocomplete="name" autofocus>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label">course code</label>

                    <input id="ccode"
                           type="text"
                           class="form-control{{ $errors->has('caption') ? ' is-invalid' : '' }}"
                           name="ccode"
                           value="{{ old('ccode') }}"placeholder="Enter course code"
                           autocomplete="ccode" autofocus>

                    @if ($errors->has('ccode'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('ccode') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="row pt-4">
                    <button type="submit" name="submit" value="submit1" class="btn btn-primary">Add New Question</button>
                </div>
            </div>
          
        </div>
    </form>
</div>
@endsection