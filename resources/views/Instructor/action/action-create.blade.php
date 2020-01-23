@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Action and Expalanation for Survey Result') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('action.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Question ID:</label>
                            <input type="text" class="form-control"placeholder="Enter same question id with th one in actio page"
                            name="questionId"  value="{{ old('question') }}"
                            id="question" />
                        </div>

                        <div class="form-group">
                            <label for="comment">Average:</label>
                            <input type="text" class="form-control" placeholder="Enter same avg with th one in actio page"
                            name="avg"  value="{{ old('ccode')  }}"
                            id="question" />
                        </div>

                        <div class="form-group">
                            <label for="comment">Course Code:</label>
                            <input type="text" class="form-control" placeholder="Enter same avg with th one in actio page"
                            name="ccode"  value="{{ old('ccode')  }}"
                            id="question" />
                        </div>

                        
                        
                        <div class="form-group">
                            <label for="comment">Actions:</label>
                            <textarea class="form-control" rows="5" 
                            name="action"  value="{{ old('action')  }}"
                            id="action" ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="comment">Explanations:</label>
                            <textarea class="form-control" rows="5"
                            name="explain"  value="{{ old('number') }}"
                            id="explain"></textarea>
                        </div>
                         
                    

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Action & Explaination') }}
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
