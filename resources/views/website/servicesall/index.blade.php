@extends('layouts.website')

@section('content')


  
  <section class=" blog-wrap">
    <div class="container">
     
		
		<div class="row py-3">
			<div class="col-lg-12 col-md-12 col-sm-12" >
				 <div class="blog-item-meta mb-3 mt-4 text-center pb-2">
                    <h5 class="text-black text-capitalize mr-3"> บริการของเรา </h5>
                    
                  </div>
			   </div>
				@foreach ($services as $rowservices)
						@if ($rowservices->link == " ")
						<div class="col-lg-3 col-md-2 col-sm-12 shrink pb-3" >
							<a href="{{ route('website.services.show', $rowservices->id) }}"> 
								<div class="title-color text-center">{{$rowservices->title}}</div>
								<img class="card-img" src="{{asset('/storage/images/services').'/'. $rowservices->image }}" alt="" class="img-fluid ">	
								
								</a>
						</div>
					@else
					   <div class="col-lg-3 col-md-2 col-sm-12 shrink pb-3" >
							  <a href="{{ $rowservices->link  }}"  target="_blank"> 
								  <div class="title-color text-center">{{$rowservices->title}}</div>
								<img class="card-img" src="{{asset('/storage/images/services').'/'. $rowservices->image }}" alt="" class="img-fluid ">	
								 
								</a>
						</div>
					@endif

				@endforeach
				
					</div>
		
		  </div>
  </section>

  @endsection