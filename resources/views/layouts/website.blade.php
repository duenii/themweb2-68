<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  {{-- <meta charset="utf-8"> --}}
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>Web Template 2</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Health Care Medical Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Novena HTML Template v1.0">

  <!-- End layout styles -->
  <link rel="shortcut icon" href="{{ asset('assets/images/cos.ico')}}">

  <!-- 
  Essential stylesheets
  =====================================-->
  <link rel="stylesheet" href="{{ asset('assets/website/plugins/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/website/plugins/icofont/icofont.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/website/plugins/slick-carousel/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/website/plugins/slick-carousel/slick/slick-theme.css') }}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">
  
</head>

<body id="top">
<header>
	<div class="header-top-bar ">
	
			<div class="container-fluid">
			<div class="row align-items-center ">
				
					<img src="{{ asset('assets/website/images/web/headweb3.png') }}" alt="" class="img-fluid ">
			
				
			</div> 
				<div class="col-sm-12  d-block d-sm-none py-2" >
					<img src="{{ asset('assets/website/images/logo_mini.png') }}" class="w-25 px-2 py-2" alt="logo computercenter" />
				</div>
				
		</div>
			
			
		

	</div>
	<nav class="navbar navbar-expand-lg navigation bg-navmenu " id="navbar">
			<div class="container-fluid ">
				
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
					aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icofont-navigation-menu"></span>
				</button>
	
				<div class="collapse navbar-collapse " id="navbarmain">
				 	<div class="col-lg-3">
						<ul class="navbar-nav ml-auto mr-auto">
							<li class="nav-item font_tel">
								

							</li>
						</ul>
						

					</div> 
					<div class="col-lg-12">
						<ul class="navbar-nav ml-auto ">
						<li class="nav-item active">
							<a class="nav-link" href="{{ route('home') }}">หน้าหลัก</a>
						</li>
						@foreach ($navmenu as $menu)
						@if (!$menu->status == 1)
						<li class="nav-item">
							<a class="nav-link" href="{{ route('website.postabouts.show', $menu->id) }}">{{$menu->title}}</a>							
						</li>					
						@else
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="dropdown05"
								data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{
								$menu->title}} <i class="icofont-thin-down"></i></a>
							<ul class="dropdown-menu" aria-labelledby="dropdown05">

								@foreach ($submenu->Where('postabouts_id', $menu->id) as $submenux)
								@if (!$submenux->link == '')
								<li><a class="dropdown-item" href="{{ $submenux->link }}">{{
										$submenux->title}}</a></li>

								@else

								<li><a class="dropdown-item"
										href="{{ route('website.subabouts.show', $submenux->id) }}">{{
										$submenux->title}}</a></li>

								@endif

								@endforeach

							</ul>
						</li>	
						
							
						@endif

						
						@endforeach

					</ul>
					</div>
					
				</div>
			</div>
		</nav>
	
</header>
	 

	@yield('content')


	<!-- footer Start -->
	<footer class="footer py-4 px-5">
		<div class="container-fluid pad-cont mt-3">
			<div class="row ">
				<div class="col-lg-8 ">
					
		
					<ul class="list-inline footer-socials mt-2">
						<li class="list-inline-item">
							<a href="#"><i class="icofont-facebook icofont-2x"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="#"><i class="icofont-facebook-messenger icofont-2x"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="#"><i class="icofont-line  icofont-2x"></i></a>
						</li>
					
					</ul>
				</div>	
				<div class="col-lg-4 text-right text-light">
					<div>Template website 2   </div>	
					<div>สำนักคอมพิวเตอร์ มหาวิทยาลัยราชภัฏนครราชสีมา </div>	
					<div> 340 ถนนสุรนารายณ์ ตำบลในเมือง อำเภอเมือง จังหวัดนครราชสีมา</div>
					<div> 30000 เบอร์โทร 0-4400-9009 </div>
					<br />
				</div>
				
			</div>



			<div class="footer-btm py-2">
				
				<div class="row">
					<div class="col-lg-8">
						<div class="copyright text-dark">
							Copyright &copy; 2024, Designed &amp; Developed by Themefisher
						</div>
					</div>
					<div class="col-lg-4">
						<a class="backtop scroll-top-to" href="#top">
							<i class="icofont-long-arrow-up"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		
			
	</footer>

	<!-- 
    Essential Scripts
    =====================================-->
	<script src="{{ asset('assets/website/plugins/jquery/jquery.js') }}"></script>
	<script src="{{ asset('assets/website/plugins/bootstrap/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/website/plugins/bootstrap/util.js') }}"></script>
	<script src="{{ asset('assets/website/plugins/bootstrap/carousel.js') }}"></script>
	<script src="{{ asset('assets/website/plugins/slick-carousel/slick/slick.min.js') }}"></script>
	<script src="{{ asset('assets/website/plugins/shuffle/shuffle.min.js') }}"></script>

	<!-- Google Map
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA"></script>
	<script src="{{ asset('assets/website/plugins/google-map/gmap.js') }}"></script> 
 -->
	<script src="{{ asset('assets/website/js/script.js') }}"></script>
	

</body>

</html>