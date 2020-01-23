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
                     <section class="mx-auto "style="margin-top:-15px" id="section">
                            <h2 style="margin-top: 12px;" class="alert alert-success text-center">Course Survey</h2><br>
                            <div class="row"style="margin-left:17px">
                                
                                @foreach($result as $value)
                                  <div class="col-md-2"  >
                                  <form method="get" action="{{route('display.index',$value->ccode)}}">
                                  @csrf
                                     <button type="submit" name="submit" value="submit1" class="btn-side">{{$value->ccode}}</button>
                                   
                                   </form>
                                  </div>
                                @endforeach
                                
                           </div>
                       </section>                                   
                                   
                       </section>
                </div>
           </div>
       </div>
</div>
@endsection
