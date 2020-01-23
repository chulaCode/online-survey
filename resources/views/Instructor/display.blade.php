@extends('layouts.app')
@section('content')
  <div class="container-fluid">
    <div class="row">
   
          <div class="col-12  my-2"> 
          @foreach($dept as $value)
            <table class="table table-bordered" id="laravel_crud">
                 <thead>
                        <tr class="text-center" style="font-size:22px">
                            <th></th>
                            <th class="">
                            <p> Evaluation and Actions for meeting Course and programmes Outcomes</p>
                            <p>Department of {{$value->dname}}</p>
                    
                            <p>School ofcomputing and Technology</p>
                            <p>Eastern mediterranean University</p>
                            <p>{{$value->sname}} {{$value->year}}</p>
                           
                            </th>
                            <th></th>
                         </tr>
                 </thead>
                 <tbody id="course">
                                        
                 </tbody>
            </table>

            <table class="table table-bordered" class="text-center" style="font-size:18px">
                 <thead>
                        <tr>
                          
                            <th class="">Courses </th>
                            <th class=""> {{$value->ccode}}-{{$value->cname}}</th>
                            
                         </tr>
                         <tr>
                              <th>Lecturer </th>
                              <th>{{$value->name}}</th>
                         </tr>  
                         <tr>
                              <th>Number of students in class </th>
                              <th>{{$student}}</th>
                         </tr>       
                         <tr>
                              <th>Number of students in survey </th>
                              <th>{{$number}}</th>
                         </tr> 
                 </thead>
                 <tbody id="course">
                               
                 </tbody>
            </table>
            <h4 class="font-weight-bold "> Questions to asses Course outcomes:</h4>
        @endforeach

        <table class="table table-bordered" class="text-center" style="font-size:18px">
                 <thead>
                        <tr>
                          
                            <th class=""> </th>
                            <th class=""> Average(%)</th>
                            <th class=""> Evaluation Results **</th>
                            <th class=""> Explaination</th>
                            <th class=""> Action</th>
                         </tr>
                        
                        
                 </thead>
                 <tbody id="course">
                  @foreach($evaluation as $value)

        
                        <tr>
                        <td>{{$value->question}}</td>
                         <td>{{$value->avg}}</td>
                         @if($satisfaction>74)
                            <td>Target meet</td>
                         @elseif($satisfaction>59 and $satisfaction<=74)
                            <td>Target partially meet</td>
                            @else
                            <td>Target not meet</td>
                          @endif
                            <td>{{$value->explanation}}</td>
                            <td>{{$value->action}}</td>
                        </tr>
                    @endforeach
                 </tbody>
            </table>
           
            <h4 class="font-weight-bold "> Questions to asses programme outcomes:</h4>
            <table class="table table-bordered" class="text-center" style="font-size:18px">
                 <thead>
                        <tr>
                          
                            <th class=""> </th>
                            <th class=""> Average(%)</th>
                            <th class=""> Evaluation Results **</th>
                            <th class=""> Explaination</th>
                            <th class=""> Action</th>
                         </tr>
                        
                        
                 </thead>
                 <tbody id="course">
                  @foreach($evaluation1 as $value)
                        <tr>
                            <td>{{$value->question}}</td>
                            <td>{{$value->avg}}</td>
                         @if($satisfaction>74)
                            <td>Target meet</td>
                         @elseif($satisfaction<=59)
                            <td>Target not meet</td>
                         @elseif($satisfaction>59 and $satisfaction<=74)
                            <td>Target partially meet</td>
                          @endif
                            <td>{{$value->explanation}}</td>
                            <td>{{$value->action}}</td>
                        </tr>
                    @endforeach
                 </tbody>
            </table>
            <div class="col-md-5 my-3" align="right">
                 <a href="" class="btn btn-danger">Convert into PDF</a>
             </div>
    </div>
       
@endsection