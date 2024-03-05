<!-- Page Preloader -->
<div id="preloader">
    <div class="loader"></div>
</div>

<!-- header section: begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Website logo" />
                    </a>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="header__nav">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active">
                                <a href="{{ route('home') }}">
                                    <i class="fa-solid fa-house"></i>
                                    Trang Chủ
                                </a>
                            </li>
                            <li><a href=""><i class="fa-solid fa-bars"></i> Thể Loại <i
                                        class="fa-solid fa-angle-down"></i>
                                    </span></a>
                                <ul class="dropdown">
                                    <li><a href="#">Phim Chiếu Rạp</a></li>
                                    <li><a href="#">Phim Việt Nam</a></li>
                                    <li><a href="#">Phim hành động</a></li>
                                    <li><a href="#">Phim gia đình</a></li>
                                    <li><a href="#">Phim hài hước</a></li>
                                    <li><a href="#">Phim kinh dị</a></li>
                                    <li><a href="#">Phim chiến tranh</a></li>
                                    <li><a href="#">Phim phiêu lưu</a></li>
                                    <li><a href="#">Phim tình cảm</a></li>
                                    <li><a href="#">Phim tâm lý</a></li>
                                    <li><a href="#">Phim tài liệu</a></li>
                                    <li><a href="#">Phim thần thoại</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('about') }}"><i class="fa-solid fa-circle-info"></i>
                                    Giới Thiệu</a></li>
                            <li><a style="cursor: pointer;" class="search-switch"><i class="fa-solid fa-magnifying-glass"></i> Tìm
                                    Kiếm</a></li>
                            @guest
                            <li><a href="{{ route('showFormLogin')}}"><i class="fa-solid fa-user"></i>
                                    Đăng Nhập</a></li>
                            @else
                            <li><a href="#"> <span class="wave">👋</span> Xin chào
                                    {{ Auth::user()->fullname }} <i
                                    class="fa-solid fa-angle-down"></i>
                                </a>
                                <ul class="dropdown">
                                    <li><a href="">Trang cá nhân</a></li>
                                    <li><a href="">Lịch sử giao dịch</a></li>
                                    <li><a href="{{route('logout')}}">Đăng xuất</a></li>
                                </ul>
                            </li>
                            @endguest

                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div id="mobile-menu-wrap"></div>
    </div>
</header>
<!-- header section: end -->
