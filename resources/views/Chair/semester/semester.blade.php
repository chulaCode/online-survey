@extends('layouts.app')

@section('content')
<div class="wrapper">
        <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
          <h3>CHAIR DASHBOARD</h3>
            <strong>CD</strong>
        </div>

        <ul class="list-unstyled components">
          <li class="active">
          <a href="{{ route('chair.show') }}"> 
               <i class="fas fa-home"></i>
                   Survey
             </a>

           </li>
            <li>
             <a href="{{ route('semester.show') }}">
                  <i class="fas fa-briefcase"></i>
                        Semester
               </a>

            </li>
             <li>
              <a href="{{ route('teacher.show') }}">
                  <i class="fas fa-copy"></i>
                     Instructor
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
                     <section class="mx-auto" id="section">
                            <h2 style="margin-top: 12px;" class="alert alert-success text-center">Semester Dashboard </h2><br>
                            <div class="row">
                                <div class="col-12">
                                @if (session('status'))
                                  <div class="text-center alert alert-success">
                                   {{ session('status') }}
                                   <button type="button" class="close" data-dismiss="alert">&times;</button>
                                  </div>
                                @endif
                                    <a href="{{route('semester.create')}}" class="btn btn-info mb-2" id="create-new-user">Add Semester</a> 
                                                           
                                        <table class="table table-bordered" id="laravel_crud">
                                            <thead>
                                                <tr>
                                                    <th>Semester Id</th>
                                                    <th>Name</th>
                                                    <th>Calender year</th>
                                                
                                                    <td colspan="2">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody id="users-crud">
                                                @foreach($result as $info)
                                                <tr id="">
                                                    <td >{{ $info->id  }}</td>
                                                    <td>{{ $info->sname }}</td>
                                                    <td>{{ $info->year }}</td>
                                                    
                                                    <td colspan="2">
                                                        <a href="{{route('semester.edit',$info->id)}}" id="edit-user"  class="btn btn-info mr-2">Edit</a>
                                                        <form action="{{route('semester.destroy',$info->id)}}" method="post"class="text-right"style="margin-top:-37px; margin-left:-15px;">
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