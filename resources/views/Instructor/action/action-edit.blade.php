@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Action and Explaination') }}</div>

                <div class="card-body">
                    <form method="POST" id="comment" action="{{route('action.update',$result->id) }}">
                        @csrf
                        @method('PATCH')
                       <h5 class=""> To delete set the values to none thanks</h5>
                        <div class="form-group">
                            <label for="comment">Actions:</label>
                            <input type="text" class="form-control" rows="5" 
                            name="action"  value="{{ old('action') ?? $result->action }}"
                            id="action"/>
                        </div>
                        <div class="form-group">
                            <label for="comment">Explanations:</label>
                            <input type="text" class="form-control" rows="5"
                            name="explain"  value="{{ old('explain') ?? $result->explanation }}"
                            id="explain"/>
                        </div>
                         

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('SaveChanges') }}
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
