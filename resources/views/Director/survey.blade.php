@extends('layouts.app')

@section('content')
<div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>DIRECTOR DASHBOARD</h3>
                <strong>DD</strong>
            </div>

            <ul class="list-unstyled components">
                <li class="active">
                    <a href="{{ url('Director/director') }}">
                        <i class="fas fa-home"></i>
                        Department
                    </a>

                </li>
                <li>
                    <a href="{{ url('Director/dept-chair') }}">
                        <i class="fas fa-briefcase"></i>
                        Chair
                    </a>

                </li>
                <li>
                    <a href="{{ route('survey.show') }}">
                        <i class="fas fa-copy"></i>
                        Survey
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
                     <section class="mx-auto" id="section">
                            <h2 style="margin-top: 12px;" class="alert alert-success text-center">Course Dashboard </h2><br>
                            <div class="row">
                            @foreach($result as $value)
                                  <div class="col-md-2"  >
                                  <form method="get" action="">

                                  <button type="submit" name="submit" value="submit1" class="btn-side">{{$value->ccode}}</button>
                                   
                                   </form>
                                  </div>
                                @endforeach
                           </div>
                       </section>
                </div>
           </div>
       </div>
</div>
@endsection

