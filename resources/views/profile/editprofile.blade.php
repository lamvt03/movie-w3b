@extends('layouts.web')

@section('title', 'Trang cá nhân - Chỉnh Sửa Thông Tin')

@section('content')

<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif
@if ($errors->any())
	<div class="alert alert-danger alert-dismissible" role="alert">
		<ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
	</div>
@endif

<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg"
		data-setbg="{{ asset('img/profile/normal-breadcrumb.jpg') }}">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="normal__breadcrumb__text">
						<h2>Trang Cá Nhân</h2>
						<p>Chào Mừng Bạn Đến Blog Chính Thức Của MOVIE W3B.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Normal Breadcrumb End -->

	<!-- Login Section Begin -->
	<section class="login spad container">
		<div class="row bg-white rounded-4 p-5 m-1"
			style="box-shadow: 4px 4px 4px rgba(190, 190, 190, 0.5); border-radius: 6px">

			<div class="col-12 col-md-3 col-lg-3">

				<div class="img-profile">

					<img src="{{ asset('img/profile/profile-logo.png') }}"
						class="img-fluid rounded-top" width="60%">

				</div>

			</div>

			<div class="col-12 col-md-9 col-lg-9">

				<div class="profile-name">

					<div class="row">

						<div class="col-6 col-md-8 col-lg-9">

							<span> <a href="profile"
								class="text-info fs-6 text-decoration-none font-weight-bold ">
								<i class="fa-solid fa-angle-left"></i> Quay về
							</a>
							</span>

						</div>

						<div class="col-6 col-md-4 col-lg-3">

							<span> <a href="{{route('showFrmChangePass')}}"
								class="text-info fs-6 text-decoration-none font-weight-bold">
									Đổi mật khẩu </a>
							</span>

						</div>

					</div>

					<hr class="text-dark">

				</div>

				<div class="info mt-5">

					<h4 class="text-dark mb-4 font-weight-bold">Thông tin người
						dùng</h4>

					<div class="row">

						<div class="col-12 col-md-12 col-lg-12">

							<form id="form" onsubmit="return checkEditProfile()" 
								autocomplete="off" action="{{ route('updateProfile') }}" method="POST">
								@csrf
								<fieldset disabled>
									<div class="mb-4">
										<input type="text" class="form-control disable"
											value="{{Auth::user()->email}}" name="username" placeholder="username">
									</div>
								</fieldset>

								<div class="mb-4">
									<input type="text" class="form-control" value="{{Auth::user()->fullname}}"
										name="fullname" placeholder="Họ và tên">
								</div>

								<div class="mb-4">
									<input type="text" class="form-control" value="{{Auth::user()->phone}}"
										name="phone" placeholder="Số điện thoại">
								</div>

								<input type="hidden" name="confirmation" id="confirmationField"
									value="false" />

								<button type="submit" class="btn btn-outline-success">Lưu
									thông tin</button>


							</form>

						</div>

					</div>

				</div>

			</div>

		</div>

	</section>
	<!-- Forgotpass Section End -->
    @endsection
