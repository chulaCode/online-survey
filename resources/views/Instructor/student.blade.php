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

                </li>
               
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
                            <h2 style="margin-top: 12px;" class="alert alert-success text-center">Student Dashboard</h2><br>
                            <div class="row">
                                <div class="col-12">
                                @if (session('status'))
                                  <div class="text-center alert alert-success">
                                {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                        </div>
                        @endif
                                <a href="{{route('student.create')}}" style="margin-top:-14px" class="btn btn-info mb-2" id="student">Add Student</a> 
                                   
                                   <table class="table table-bordered" id="student">
                                   <thead>
                                       <tr>
                                           <th>Student Number</th>
                                           <th>Name</th>
                                           <th>Email</th>
                                          
                                           <td colspan="2">Action</td>
                                       </tr>
                                   </thead>
                                   <tbody id="question">
                                   @foreach($result as $info)
                                        <tr id="">
                                            <td >{{ $info->number  }}</td>
                                            <td >{{ $info->name  }}</td>
                                            <td>{{ $info->email }}</td>   
                                                                     
                                            
                                            <td colspan="2">
                                                <a href="students/{{$info->studentNo}}/edit" id="edit-user" data-id="{{ $info->studentNo }}" class="btn btn-info mr-0">Edit</a>
                                                <form action="{{action('StudentController@destroy',$info->studentNo)}}" method="post"class="text-right"style="margin-top:-37px;margin-left:-15px">
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