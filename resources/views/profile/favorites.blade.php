@extends('layouts.web')

@section('title', 'Trang cá nhân')

@section('content')
<!-- Blog Section Begin -->
<section class="blog spad" style="padding-top: 70px">
		<div class="container">
			<div class="text-white text-center">
				<h4 class="font-weight-bold">Lịch Sử Giao Dịch</h4>
				<br>
			</div>
			<div class="blog__details__title">
				<jsp:useBean id="now" class="java.util.Date" />
				<h6>
					<fmt:formatDate value="${now}" pattern="EEE, HH:mm:ss, dd-MM-yyyy" />
				</h6>
				<div class="blog__details__social">
					<a href="#" class="facebook"><i class="fa fa-facebook-square"></i>
						Facebook</a> <a href="#" class="pinterest"><i
						class="fa fa-pinterest"></i> Pinterest</a> <a href="#"
						class="linkedin"><i class="fa fa-linkedin-square"></i>
						Linkedin</a> <a href="#" class="twitter"><i
						class="fa fa-twitter-square"></i> Twitter</a>
				</div>
			</div>
			<div class="row">
            @foreach ($videos as $video)
        
            @endforeach
	</section>
	<!-- Blog Section End -->
    @endsection