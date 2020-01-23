@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
       <div class="col-12">
       @if (session('status'))
         <div class="text-center alert alert-success">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
          </div>
       @endif
          <section>
                @foreach($result as $results)
                <div class="text-right my-3 " style="text-weight:bold"><h4>{{$results->sname}} {{$results->year}}</h4>  </div>
                <div class="text-center text-capitalize ">
                    <h2 class="font-weight-bold">course assessment survey</h2>
                    <h2 class="font-weight-bold">{{$results->ccode}}--{{$results->cname}}</h2>
                    <h2 class="font-weight-bold">{{$results->dname}}</h2>
                    <hr>
                    <h5> 
                        The results of the following questionnaire will be discussed by the quality management committee and the instructor to devise a correction plan if necessary to
                        verify if the targeted programme and course learning outcomes are satisfied by each course as well as the ECTS credits. Your cooperation and assistance is greatly
                        appreciated.
                    </h5>
                    <hr>
                </div>
               
            </section>

            <!--section 2-->
            <section>
            <form method="post" action="{{route('survey.store',$results->ccode)}}">
            @csrf

            <div class="body-top my-4">
               @foreach($question as $value)
                <h4>1. {{$value->question}}</h4>
                @endforeach

                <div class="table">
                      <table class="table table-bordered" id="">
                      
                          <thead>
                               <tr>
                                 @foreach($subquestion1 as $result)
                                    <th>{{$result->question}}</th>
                                    <input id="" type="hidden" name="ques{{$result->id}}"value="{{$result->id}}"/>
                                    <input id="" type="hidden" name="course{{$result->id}}"value="{{$results->ccode}}"/>
                                   
                                 @endforeach 
                                </tr>
                              
                            </thead>
                            <tbody id="">
                                 <tr id="">
                                 @foreach($subquestion1 as $result)
                                  <td > <input id="" type="number" name="result{{$result->id}}"value="" required/> </td>
                                  <input id="" type="hidden" name="course" value="{{$results->ccode}}"/>
                                  <input id="" type="hidden" name="one" value=1 />
                                 @endforeach 
                                     
                                 </tr>
                              
                          </tbody>
                          
                    </table>
                </div>

                <div>
                    <h4 class="my-4"> Please state the level to which you have attained as a result
                    of your education in the Department of Information Technology.</h4>
                    @foreach($question1 as $value)
                    <h4>2. {{$value->question}}</h4>
                    <input id="" type="hidden" name="ques{{$value->id}}"value="{{$value->id}}"/>
                    @endforeach
                     <h5 class="font-weight-bold my-3">Note: To answer this section 1(Strongly Disagree)-2(Disagree)-3(Neutral)- 4(Agree) - 5(Strongly Agree) choose  any of them.</h5>    
                    
                    <div class="table">
                      <table class="table table-bordered" id="">
                      
                          <thead>
                               <tr>
                                    <th>Number</th>
                                    <th>Questions</th>
                                    <th>Strongly Agree 5</th>
                                    <th>Agree 4</th>
                                    <th>Neutral 3</th>
                                    <th>Disagree 2</th>
                                    <th>Strongly Disagree 1</th>
                                </tr>
                              
                            </thead>
                            <tbody id="">
                            @foreach($sub2 as $result)
                                 <tr id="">
                                 
                                 <td>{{$result->number}}</td>
                                   <td>{{$result->question}}</td>
                                   <input id="" type="hidden" name="ques{{$result->id}}"value="{{$result->id}}"/>
                                   <input id="" type="hidden" name="course"value="{{$results->ccode}}"/>
                                   <input id="" type="hidden" name="two" value=2 />
                                   <td><label class="radio-inline"><input type="radio" 
                                   name="option{{$result->id}}" value='5'checked></label></td>

                                   <td><label class="radio-inline"><input type="radio" 
                                   name="option{{$result->id}}"value='4' checked></label></td>

                                   <td><label class="radio-inline"><input type="radio" 
                                   name="option{{$result->id}}" value='3' checked></label></td>

                                   <td><label class="radio-inline"><input type="radio" 
                                   name="option{{$result->id}}" value='2'  checked></label></td>

                                   <td><label class="radio-inline"><input type="radio" 
                                   name="option{{$result->id}}" value='1' checked></label></td>
                                 
                                 </tr>
                                 @endforeach
                          </tbody>
                          
                    </table>
                </div>
                <!--last question section-->
                <div class="my-3">
                
                    @foreach($question2 as $value)
                    <h4>3. {{$value->question}}</h4>
                   @endforeach
                    <div class="table">
                      <table class="table table-bordered" id="">
                      
                          <thead>
                               <tr>
                                    
                                </tr>
                              
                            </thead>
                            <tbody id="">
                            @foreach($sub3 as $result)
                                 <tr id="">
                                  <td>{{$result->number}}</td>
                                   <td>{{$result->question}}</td>
                                   <input id="" type="hidden" name="ques{{$result->id}}"value="{{$result->id}}"/>
                                   <input id="" type="hidden" name="course"value="{{$results->ccode}}"/>
                                   <input id="" type="hidden" name="three" value=3 />
                                   <td><label class="radio-inline"><input type="radio" 
                                   name="option{{$result->id}}"value=5  checked></label></td>

                                   <td><label class="radio-inline"><input type="radio" 
                                   name="option{{$result->id}}" value=4  checked></label></td>

                                   <td><label class="radio-inline"><input type="radio" 
                                   name="option{{$result->id}}" value=3 checked></label></td>

                                   <td><label class="radio-inline"><input type="radio" 
                                   name="option{{$result->id}}" value=2 checked></label></td>

                                   <td><label class="radio-inline"><input type="radio" 
                                   name="option{{$result->id}}" value=1  checked></label></td>
                                 
                                 </tr>
                                 @endforeach
                          </tbody>
                          
                    </table>

                </div>
                @endforeach
                <input id="" type="submit" name="submit" class="btn btn-info" value="SUBMIT  SURVEY"/>
             </div>
             </form>
            </section>
        </div>
    </div>
</div>
@endsection
