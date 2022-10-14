<!DOCTYPE html>
<html lang="en">
<head>
    @include('frontend.component.head')
</head><!--/head-->

<body>
	@include('frontend.component.header')
	
	@yield('slider')
	
	
	<section>
		<div class="container">
			<div class="row">
				@include('frontend.component.slider-bar')
				
				@yield('content')
			</div>
		</div>
	</section>
	
	<!--Footer-->
	@include('frontend.component.footer')
	<!--/Footer-->
	

	@include('frontend.component.script')

	@yield('script')
    
</body>
</html>