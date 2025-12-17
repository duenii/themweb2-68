@extends('layouts.website')

@section('content')

<!-- Slider Start -->
<div class="container-fluid bg-contant bg-showdata">
		
			<div class="col-lg-12">
				<section class="banner">
				<div id="carouselExampleIndicators" class="carousel slide h-75" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						@foreach (range(1,count($banners)-1) as $i)
						<li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"></li>
						@endforeach
		
					</ol>
					<div class="carousel-inner">
						@foreach ($banners as $ban)
							@if($ban->id == $banners->max('id'))
							<div class="carousel-item active">
								@else
								<div class="carousel-item">
									@endif
									@if (!$ban->name =="")
									 <a href="{{ $ban->name  }}"  target="_blank">

										<img class="d-block w-100" src="{{ asset( '/storage/images/banners/'.$ban->image) }}" alt="banner slide">
									</a>
									@else
									<img class="d-block w-100" src="{{ asset( '/storage/images/banners/'.$ban->image) }}" alt="banner slide">
									@endif

							</div>
						@endforeach
		
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
					</div>
			</section>
			</div>
			
		
		<section id="gtco-pricing" class="bg-grey">
				<div class="container">
				
								<div class="row  pt-2">
								<div class="col-lg-12 ">
									<div class="section-title">
										<h3>บริการของเรา</h3>

									</div>
								</div>

	<!-- /END container -->
							</div>
	
							<div class="row">
								@foreach ($services->slice(0, 12) as $rowservices)
									@if (!$rowservices->link =="")
									<div class="col-lg-2 col-md-3 col-sm-12 shrink py-2" >
										  <a href="{{ $rowservices->link  }}"  target="_blank">
												<!--     -->
											<img class="card-img" src="{{asset('/storage/images/services').'/'. $rowservices->image }}" title="{{$rowservices->title}}" class="img-fluid ">
												<div class="title-color text-center text-secondary"><small>{{$rowservices->title}}</small></div>
											</a>
									</div>
									
								@else
								   <div class="col-lg-2 col-md-3 col-sm-12 shrink py-2" >
										<a href="{{ route('website.services.show', $rowservices->id) }}"> 
												<!--	  -->
											<img class="card-img" src="{{asset('/storage/images/services').'/'. $rowservices->image }}" title="{{$rowservices->title}}" class="img-fluid ">	
												<div class="title-color text-center  text-secondary"><small>{{$rowservices->title}}</small></div>
											</a>
									</div>
								@endif

							@endforeach

							</div>

						<div class="row pt-3">
							<div class="col-lg-12 text-right pb-3">


								<a class="" href="{{ route('website.servicesall.show')}}"><h6> ดูบริการทั้งหมด </h6></a>


							</div>

						</div>
				</div>
			</section>
	

	@foreach ($cat as $cat_row)
	
	<section class="section">
		<div class="container">
			<div class="row ">
			<div class="col-lg-12 ">
				<div class="section-title">
					<h3>{{ $cat_row->name }}</h3>
					
				</div>
			</div>
				
		</div>
			
			
		<div class="row  pt-2">
			@foreach ($posts->Where('category_id', $cat_row->id)->slice(0, 4) as $post)
				<div class="col-lg-3 col-md-6 ">
				
					<a href="{{ route('website.posts.show', $post->id) }}">
					<div class="department-block mb-2 fadeout">
							
								<img src="{{asset('/storage/images/posts/thumbnail').'/'. $post->gallery->image }}" title="{{$post->title}}" class="img-fluid w-100 card-img px-2">
						
							<div class="content">
								<h6 class="mt-4 mb-2 title-color">{{$post->title}}</h6>

								<a href="{{ route('website.posts.show', $post->id) }}" class="read-more">อ่านเพิ่มเติม  <i class="icofont-simple-right ml-2"></i></a>
							</div>
				
						</div>
						</a>
				</div>	
			
			@endforeach
			<div class="col-lg-12 text-right ">
			
					<a class="" href="{{ route('website.postsall.show',$cat_row->id)}}"><h6> ดูข่าวสารทั้งหมด </h6></a>
			</div>	
		</div>
		</div>
		<!-- /END container -->
	</section>

	@endforeach

		<section class="section">
			<div class="container">

				
			<div class="row align-items-center">	
					<div class="col-lg-12">
						<div class="row align-items-center">

							<div class="col-lg-12 ">
							<div class="section-title">
								<h3>จดหมายข่าว</h3>

							</div>
						 </div>
						</div>
						
						<div class="row">
								@foreach ($newsletter->slice(0, 6) as $rowletter)
							<div class="col-lg-2 col-md-3 col-sm-12 shrink" >
								<a href="{{ $rowletter->link  }}" target="_blank"> 
									
									<img  src="{{asset('/storage/images/newsletter').'/'. $rowletter->image }}" title="{{$rowletter->name}}" class="img-fluid px-1">
									<div class="text-center pt-1">{{ $rowletter->name }}</div>
									
								</a>
							</div>
								@endforeach

							</div>
						</div>

		</div>
	</div>
</section>			

		 <!--
	<section class="section team">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="section-title">
					<h3>สถิติการให้บริการ</h3>
								
				</div>
			</div>
		</div>

		<div class="row ">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<a href="https://lookerstudio.google.com/u/0/reporting/18b20780-4e8e-4cb1-9b5f-a6e20f7fca20/page/xoepD" target="_blank">
				<div class=" team-block mb-5 mb-lg-0 text-center">
					<img src="{{ asset( 'assets/images/icon/customer-review.png') }}" alt="" class="img-fluid w-50">

					<div class="content">
						<h5 class="mt-4 mb-0">ความพึงพอใจของผู้ใช้</h5>
						
					</div>
				</div>
				</a>
			</div>
			
			<div class="col-lg-3 col-md-6 col-sm-6 justify-content-center">
				<a href="https://lookerstudio.google.com/u/0/reporting/0499bf67-ec94-48c0-84ef-be117664b2d7/page/WWirD" target="_blank">
				<div class="team-block mb-5 mb-lg-0 text-center">
					<img src="{{ asset( 'assets/images/icon/meetings.png') }}" alt="" class="img-fluid w-50">

					<div class="content">
						<h5 class="mt-4 mb-0">บริการห้องปฏิบัติการอาคาร 27 </h5>
						
					</div>
				</div>
				</a>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6 justify-content-center">
				<a href="https://monitor.nrru.ac.th/cacti/plugins/weathermap/weathermap-cacti-plugin.php" target="_blank">
				<div class="team-block mb-5 mb-lg-0 text-center">
					<img src="{{ asset( 'assets/images/icon/computer.png') }}" alt="" class="img-fluid w-50">

					<div class="content">
						<h5 class="mt-4 mb-0">ตรวจสอบสัญญาณ</h5>
						
					</div>
				</div>
				</a>
			</div>

			
			<div class="col-lg-3 col-md-6 col-sm-6 justify-content-center">
				<a href="https://cos.nrru.ac.th/nrruservice/" target="_blank">
				<div class="team-block mb-5 mb-lg-0 text-center">
					<img src="{{ asset( 'assets/images/icon/information.png') }}" alt="" class="img-fluid w-50">

					<div class="content">
						<h5 class="mt-4 mb-0">บริการซ่อมบำรุงคอมพิวเตอร์</h5>
						
					</div>
				</div>
				</a>
			</div>
		</div>
	</div>
</section>
		-->	
			
		
</div> {{-- div close contant --}}

@endsection
	
	
	   
