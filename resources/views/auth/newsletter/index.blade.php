@extends('layouts.home')

@section('content')




<div class="main-panel">
  <div class="content-wrapper">
   <div class="page-header">
      <h3 class="page-title"> News Letter </h3>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
  
          <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('newsletter.create') }}" class="btn btn btn-gradient-success">เพิ่มข้อมูล</a></li>
        </ol>
      </nav>
    </div> 
    <div class="rowletter">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card">
            <div class="card-body table-responsive">
              @if (count($newsletter) > 0 )

              {{-- <h4 class="card-title">Main Menu</h4> --}}

                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                      <i class="mdi mdi-check icon-md"> </i> {{ $message }}
                    </div>
                @elseif ($message = Session::get('warning'))
                    <div class="alert alert-warning">
                      <i class="mdi mdi-tooltip-edit icon-md"></i> {{ $message }}
                    </div>

                @elseif($message = Session::get('danger'))
                    <div class="alert alert-danger">
                        <i class="mdi mdi-delete icon-md"></i> {{ $message }}
                    </div>

                @endif
              <table class="table table-hover table-bordered pb-2">
                <thead>
                  <tr >
                    <th class="text-center">#</th> 
					  
					<th class="text-center">Image</th>
                    <th class="text-center">month</th>                 
                    <th class="text-center">Link</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Update</th>
                    <th class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>                
                  @foreach($newsletter as $rowletter)
                  <tr class="text-center">
                    <td >{{ $loop->iteration }}</td>
					  <td class="w-25"><img src="{{ asset('/storage/images/newsletter/' . $rowletter->image) }}" class="w-25 h-25" /></td>
                    <td> 
                      {{ $rowletter->name }}
                     </td>
                    <td> 
                      @if(!$rowletter->link =='')                        
                         <a href="{{ $rowletter->link  }}" class="btn btn-info btn-sm" target="_blank"> <i class="mdi mdi-link-variant"></i> View File</a>
                      @endif
                     </td>
                    <td> 
                      @if ( $rowletter->status == 1)
                        <label class="badge badge-gradient-success"> <i class="mdi mdi-eye"></i> แสดง </label>                                                                     
                      @else
                        <label class="badge badge-gradient-danger"> <i class="mdi mdi-eye-off"></i> ไม่แสดง </label>
                      @endif
                    </td>
                    <td> {{ date('d M Y', strtotime($rowletter->updated_at)) }} </td>
                    <td>
                      
                        <a href="{{ route('newsletter.edit', $rowletter->id) }}" class="btn btn-warning btn-sm">Edit</a>
                       
                        <!--<input type="submit" class="btn btn-danger btn-sm" value="DELETE" />-->
                        <Button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $rowletter->id }}">DELETE</Button>

                        <!-- Modal -->
                        <div class="modal" id="modal{{ $rowletter->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title" id="exampleModalLabel">Delete Data</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <h5>ลบข้อมูล </h5><br>
                                 
                                <img src="{{ asset('/storage/images/newsletter/' . $rowletter->image) }}" class="w-50" />
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary  btn-sm" data-bs-dismiss="modal">Cancel</button>
                                <form method="post" action="{{ route('newsletter.destroy', $rowletter->id) }}">
                                  @csrf
                                  @method('DELETE')
                                <!--<button type="button" class="btn btn-primary">Delete</button>-->
                                <input type="submit" class="btn btn-danger btn-sm" value="DELETE" />
                                
                                                
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      


                    </td>
                  </tr>
                                                
                @endforeach
                </tbody>
            </table>
            {{ $newsletter->links() }}
            @else
            <h3 class="text-center text0"> No post found</h3>


            @endif
                  
            </div>
          </div>
          @endsection
        </div>
      </div>
      
    

    </div>
  </div>

</div>
