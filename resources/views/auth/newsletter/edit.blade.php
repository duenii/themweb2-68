@extends('layouts.home')

@section('tatle', 'Edit News Letter')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
       
        <div class="row">

            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit News Letter </h4>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>

                                @endforeach


                            </ul>

                        </div>


                        @endif


                        <form method="post" action="{{ route('newsletter.update', $newsletter->id) }}" class="forms-sample" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="exampleInputUsername2" placeholder="name" value="{{ $newsletter->name }}" require>
                                </div>
                            </div>                           
                            <div class="form-group row">
                                <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Cover Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control file-upload-info" require>
                                    <label for="exampleInputEmail2" class="col-sm-12 col-form-label">{{ $newsletter->image }}</label> 
                                    <img src="{{ asset('/storage/images/newsletter').'/'. $newsletter->image }}" alt="images" width="250px">
                                </div>
                            </div>
                          
							
							 <div class="form-group row">
                                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">link</label>
                                <div class="col-sm-9">
                                    <input type="text" name="linkdata" class="form-control" id="exampleInputUsername2" placeholder="link" value="{{ $newsletter->link }}" require>
                                </div>
                            </div>                           
                           
                            <div class="form-group row">
                                <label for="exampleTextarea1" class="col-sm-3 col-form-label">content</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="content" id="summernote" require> {{ $newsletter->content }} </textarea>
                                </div>
                            </div>

                           
                            <div class="form-group row">
                                <label for="exampleFormControlSelect3" class="col-sm-3 col-form-label"> Published</label>
                                <div class="col-sm-9">
                                    <select class="form-control form-control-sm" name="status" id="exampleFormControlSelect3" require>
                                        <option selected>เลือกสถานะ</option>
                                       
                                        <option @selected( $newsletter->status == 1) value="1">แสดง</option>
                                        <option @selected( $newsletter->status == 2) value="2">ไม่แสดง</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row text-center">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-gradient-primary mr-2">Save</button>
                                    <a href="{{ route('newsletter.index') }}" class="btn btn-light">Cancel</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection

@section('scripts')

<!-- summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 400
        });

    });
</script>

@endsection