@extends('layouts.home')

@section('content')

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                   
                    <h4 class="font-weight-normal mb-3">Total Post News <i class="mdi mdi-file-document mdi-24px float-right"></i>
                    </h4>
                    <h1 class="mb-5">{{ $posts }}</h1>
                    <a  href="{{ url('/auth/posts') }}"> 
                      <button type="button" class="btn btn-gradient-danger btn-lg"><p class="card-text"> View Details</p></button>
                      </a>
					  
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    
                    <h4 class="font-weight-normal mb-3">Total Banner News<i class="mdi mdi-image-area mdi-24px float-right"></i>
                    </h4>
                    <h1 class="mb-5">{{ $banner }}</h1>
                    <a  href="{{ url('/auth/banner' )}}"><button type="button" class="btn btn-gradient-info"> <p class="card-text">View Details  </p></button></a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                   
                    <h4 class="font-weight-normal mb-3">Total Upload Files<i class="mdi mdi-folder-upload mdi-24px float-right"></i>
                    </h4>
                     <h1 class="mb-5">{{ $files }}</h1>
                    <a class="" href="{{ url('/auth/files' )}}"><button type="button" class="btn btn-gradient-success"><p class="card-text">View Details  </p></button></a>
                  </div>
                </div>
              </div>
            </div> 
            
            <div class="content-wrapper">
              <div class="page-header">
                <h3 class="page-title"> UserAdmin </h3>
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    {{-- <li class="breadcrumb-item"><a href="#">Forms</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Form elements</li> --}}
                  </ol>
                </nav>
              </div>
              <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                     
                      
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> First name </th>
                            <th> email </th>                         
                            <th> role </th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($adminweb as $row)
                          <tr>
                            <td class="py-1">
                              {{ $row->id }}
                            </td>
                            <td> {{ $row->name }} </td>
                            <td> {{ $row->email }} </td>
                            <td>  {{ $row->role_as }} </td>
                           
                          </tr> 
                          @endforeach                  
                        </tbody>
                      </table>
                    </div>
                  </div>
                  
                </div>
               
              </div>
              
            </div>
            
          
          </div>
          <!-- content-wrapper ends -->


@endsection