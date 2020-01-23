@extends('layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
   
          <div class="col-12  my-2"> 
              <h4>Evaluation and Actions for meeting Course and Programme Outcomes	</h4>																																			
          </div>
         
      
          <div class="col-12  my-2"> 
          
              <h4 class="my-2">Course Code:	{{$result->ccode}}</h4>
              <h4 class="my-2">Course Name:	{{$result->cname}}</h4>	
              <h4 class="my-2">Number of students in class: {{$student}} </h4>		
              <h4 class="my-2">Number of students in survey: {{$number}}	</h4>	
              																															
          </div>
          <div class="col-12 ">
             
                <div class="col-4 offset-6 text-ceneter">
                  <h4 >Survey Results</h4>
                         @foreach($count as $value)
                          <span class="mx-5">{{$value->studentNo}}</span>
                         @endforeach
                  </div>
                  <div class="">
                      @foreach($result2 as $value)
                          <h5 class="font-weight-bold">{{$value->question}}</h5>
                         @endforeach

                        
                         <div>
                              @foreach($result3 as $value)
                                  <span class="my-2">{{$value->question}}</span>
                                   <div style="margin-left:760px;">
                                         <span>{{$value->answer}}</span>
                                  </div>
                               @endforeach
                               
                          </div>
                        
                         <div class='my-2'>
                              @foreach($result4 as $value)
                                <h5 class="font-weight-bold">{{$value->question}}</h5>
                              @endforeach

                         </div>

                         <div>
                              @foreach($result5 as $value)
                                  <span class="my-2">{{$value->question}}</span>
                                   <div style="margin-left:760px;">
                                         <span>{{$value->answer}}</span>
                                  </div>
                               @endforeach
                          </div>

                         <div class='my-3'>
                             @foreach($result6 as $value)
                                <h5 class="font-weight-bold">{{$value->question}}</h5>
                              @endforeach

                         </div>
                         <div>
                              @foreach($result7 as $value)
                                  <span class="my-2">{{$value->question}}</span>
                                   <div style="margin-left:760px;">
                                         <span>{{$value->answer}}</span>
                                  </div>
                               @endforeach
                          </div>
                         
                  </div>
            </div>
           
      </div>

    </div>
       
@endsection