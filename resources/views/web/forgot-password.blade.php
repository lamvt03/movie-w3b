@extends('layouts.web')

@section('title', 'Quên mật khẩu')

@section('content')
<section class="normal-breadcrumb set-bg"
         data-setbg="{{asset('img/login-banner.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Quên Mật Khẩu</h2>
                    <p>Chào Mừng Bạn Đến Blog Chính Thức Của MOVIE.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->

<!-- Login Section Begin -->
<section class="login spad">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card-forgot card p-3 mb-4 rounded-0"
                     style="color: grey;">
                    <h3 class="mb-2" style="font-weight: 700; color: grey;">Quên
                        Mật Khẩu ?</h3>
                    <p class="mb-3">thay đổi mật khẩu của bạn trong ba bước đơn
                        giản. Điều này sẽ giúp bạn bảo mật mật khẩu của bạn.</p>

                    <div class="step_form" style="color: grey;">
                        <p>
                            <strong><Strong class="text-info">1</Strong> .Nhập địa
                                chỉ Email của bạn. Hệ thống của sẽ gửi cho bạn một mã OTP vào
                                email của bạn.</strong> <br> <Strong class="text-info">2</Strong>
                            .Nhập mã OTP đã nhận được ở email của bạn. <br> <Strong
                                class="text-info">3</Strong> .Tạo một mật khẩu mới.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-12 col-lg-12">
                <div class="card-forgot card p-3 rounded-0" style="color: grey;">
                    <div class="step_form" style="color: grey;">
                        <form onsubmit="return validateForgotPass()" action="${initParam['mvcPath']}/password/forgot"
                              method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Địa chỉ email</label> <input
                                    type="email" class="form-control" name="email" id="email">
                                <small id="helpId" class="form-text text-muted">Nhập
                                    địa chỉ email bạn đã đăng ký. Sau đó hệ thống sẽ gửi cho bạn
                                    một mã OTP vào email</small>

                            </div>
                            <hr>
                            <button type="submit" id="submitForgotpass"
                                    class="btn btn-success rounded-0 p-2 ps-4 px-4 fw-bold text-white">
                                TIẾP TỤC
                            </button>
                            <a type="button" href="{{route('login')}}"
                               class="btn btn-danger rounded-0 p-2 ps-4 px-4 fw-bold  text-white"
                               role="button">TRỞ LẠI</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection