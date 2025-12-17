@extends('layouts.website')

@section('content')

  <section class=" blog-wrap">
    <div class="container">
      @foreach ($cat as $cat_row)

      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <h3 class="mt-4 mb-1">{{ $cat_row->name }}</h3>
          <div class="divider my-2"></div>
        </div> 
		  
		  
		  <div class="row  pt-2">
			@foreach ($posts->Where('category_id', $cat_row->id) as $post)
				<div class="col-lg-3 col-md-6 ">
				
					<a href="{{ route('website.posts.show', $post->id) }}">
					<div class="department-block mb-5 fadeout">
							
								<img src="{{asset('/storage/images/posts/thumbnail').'/'. $post->gallery->image }}" title="{{$post->title}}" class="img-fluid w-100 card-img px-2">
						
							<div class="content">
								<h6 class="mt-4 mb-2 title-color">{{$post->title}}</h6>

								<a href="{{ route('website.posts.show', $post->id) }}" class="read-more">อ่านเพิ่มเติม  <i class="icofont-simple-right ml-2"></i></a>
							</div>
				
						</div>
						</a>
				</div>	
			
			@endforeach

	</div>
   
	@endforeach

      

    </div>
    </div>
  </section>

  @endsection