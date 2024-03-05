<!--footer section: begin -->
<footer class="footer">
    <div class="page-up">
        <a href="#" id="scrollToTopButton"><i class="fa-solid fa-angle-up"></i></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Website Logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="{{ route('home') }}">Trang Chủ</a></li>
                        <li><a href="">Danh Sách Phim</a></li>
                        <li><a href="">Liên Hệ Với Chúng Tôi</a></li>
                        @auth
                        <li><a href="">Trang Cá Nhân</a></li>    
                        @endauth
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <p class="text-center">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | Design and Developed by Group 3
                </p>

            </div>
        </div>
    </div>
</footer>
<!--footer section: end -->

<!-- search model: begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <form action="" method="get" class="search-model-form"
              autocomplete="off">
            <input type="text" name="keyword" id="search-input"
                   placeholder="Tìm kiếm....."/>
        </form>
    </div>
</div>
<!-- search model: end -->

<!-- JS plugins -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/player.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/mixitup.min.js') }}"></script>
<script src="{{ asset('js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/validateUser.js') }}"></script>

<!--Thong bao dang nhap thanh cong/That bai-->
@if(Session('error'))
    <script>
        showSwalAlert("error", "Email hoặc mật khẩu không đúng");
    </script>
@elseif(Session('success')){
    <script>
        showSwalAlert("success", "Đăng nhập thành công");
    </script>
}
@endif


<!--Thong bao dang ky-->
@if(Session('register_success')){
    <script>
        showSwalAlert("success", "Đăng ký tài khoản thành công");
    </script>
}
@elseif(Session('existed_email')){
    <script>
        showSwalAlert("error", "Email đã được đăng ký từ trước");
    </script>
}
@endif
