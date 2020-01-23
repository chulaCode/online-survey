@extends('layouts.app')

@section('content')
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>INSTRUCTOR DASHBOARD</h3>
                <strong>ID</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="{{ route('survey.print') }}">
                        <i class="fas fa-home"></i>
                        Survey Questions
                    </a>

                </li>
                <li>
                    <a href="{{ route('student.show') }}">
                        <i class="fas fa-briefcase"></i>
                        Student
                    </a>

                </li>
                <li>
                    <a href="{{ route('course.show') }}">
                        <i class="fas fa-copy"></i>
                        Courses
                    </a>

                </li>
                <li>
                    <a href="{{ route('assessment.show') }}">
                        <i class="fas fa-copy"></i>
                        Assessment
                    </a>

                </li>
                <li>
                    <a href="{{ route('action.show') }}">
                        <i class="fas fa-copy"></i>
                        Actions
                    </a>

                </li>
                <li>
                    <a href="{{ route('instructor.show') }}">
                        <i class="fas fa-copy"></i>
                        Survey
                    </a>

                </li>
                <li>
                     <a href="{{ route('assign.show') }}">
                        <i class="fas fa-copy"></i>
                        Assign Student
                    </a>
               
            </ul>

        </nav>

        <!-- Page Content  -->
        
        <div class="container-fluid mx-5" id="content">
            <div class="row">
                <div class="col-12">
      
                    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
                        <div class="container-fluid">

                            <button type="button" id="sidebarCollapse" class="btn-side">
                                <i class="fas fa-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>
                            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fas fa-align-justify"></i>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="nav navbar-nav ml-auto">
                                    <li class="nav-item">
                                    <div class="card-body">
                                        @component('component.who')
                                        @endcomponent
                                    </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                     <section class="mx-auto "style="margin-top:-15px" id="section">
                            <h2 style="margin-top: 12px;" class="alert alert-success text-center">Assessments</h2><br>
                            <div class="row">
                                <div class="col-12">
                                @if (session('status'))
                                  <div class="text-center alert alert-success">
                                {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                           </div>
                            @endif
                            
                               <div> 
                                <a href="{{route('assessment.create')}}" class="btn btn-info mb-2 mr-3" id="questions">Add workload</a> 
                               
                                </div> 
                                <table class="table table-bordered" id="laravel_crud">
                                   <thead>
                                       <tr>
                                           <th>Activities</th>
                                           <th>Number</th>
                                           <th>Duration (hour)</th>
                                           <th>Total workload</th>
                                           <th>course code</th>
                                           <td colspan="2"> Action (delete/edit)</td>
                                       </tr>
                                   </thead>
                                   <tbody id="course"> 
                                  
                                   @foreach($result as $info)
                                        <tr id="">
                                            <td >{{ $info->activities }}</td>
                                            <td >{{ $info->number  }}</td>
                                            <td>{{ $info->duration }}</td> 
                                            <td>{{ $info->workload}}</td>    
                                            <td>{{ $info->ccode }}</td>  
                                                                     
                                            
                                            <td colspan="2">
                                                <a href="{{route('assessment.edit',$info->id)}}" id="edit-user" data-id="" class="btn btn-info mr-0">Edit</a>
                                                <form action="{{action('AssessmentController@destroy',$info->id)}}" method="post"class="text-right"style="margin-top:-37px;margin-left:-15px">
                                                @csrf
                                                 @method('DELETE')
                                                   <input value="Delete" type="submit" class="btn btn-danger" />
                                               </form>
                                         </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    {{ $result->links() }}
                                </div> 
                           </div>
                       </section>
                </div>
           </div>
       </div>
</div>
@endsection