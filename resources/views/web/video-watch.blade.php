@extends('layouts.web')

@section('title', 'Movie W3b - '.$video->title)

@section('content')
<!-- Breadcrumb Begin -->
<div id="breadcrumb" class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Trang chủ</a> 
                    <a href="${initParam['mvcPath']}/categories">{{ $video->category->name }}</a> <span>{{ $video->title }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Anime Section Begin -->
<section class="anime-details spad">
    <div class="container">
        <div class="row">
            <div id="video" class="col-lg-12">
                <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{ $video->href }}"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="anime__details__review">
                    @if (count($comments) > 0)
                    <div class="section-title">
                        <h5 class="mb-6">Bình luận</h5>
                    </div>

                    <div id="review-container">
                        @foreach ($comments as $comment )
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('img/default-avt.jpg') }}" alt="" />
                            </div>
                            <div class="anime__review__item__text">
                                @php
                                \Illuminate\Support\Facades\App::setLocale('vi');
                                $carbonDate = \Carbon\Carbon::parse($comment->createdAt);
                                @endphp
                                <h6>
                                    {{ $comment->createdBy->fullname }} - <span>{{ $carbonDate->diffForHumans() }}</span>
                                </h6>
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="float-right">
                        <span id="showMoreBtn">Hiển thị thêm bình luận <i class="fa-solid fa-angle-down"></i></span>
                    </div>
                    @endif
                </div>

                <div class="anime__details__form">
                    <div class="section-title">
                        <h5>Để lại đánh giá</h5>
                    </div>

                    <form id="voteFrm" action="{{ route('video.comment') }}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <textarea id="voteInp" placeholder="Nội dung..." name="content" required></textarea>
                        <input id="href" name="href" type="hidden" value="{{ $video->href }}">

                        @auth
                        <button id="voteFrmBtn" type="submit">
                            <i class="fa fa-location-arrow"></i> Gửi Bình Luận
                        </button>
                        @else
                        <button id="guestBtn" type="button">
                            <i class="fa fa-location-arrow"></i> Gửi Bình Luận
                        </button>
                        @endauth
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@section('additional-scripts')
<script type="text/javascript">
    const voteInp = document.querySelector('#voteInp');
    voteInp.onfocus = function() {
        const headerHeight = document.querySelector('#top-header').clientHeight;
        const breadcrumbHeight = document.querySelector('#breadcrumb').clientHeight;
        const playerHeight = document.querySelector('#video').clientHeight;
        const totalHeight = headerHeight + breadcrumbHeight + playerHeight;
        localStorage.setItem('scrollTop', totalHeight);
    };
    window.addEventListener('load', function() {
        const scrollTop = localStorage.getItem('scrollTop') || 0;
        window.scrollTo(0, parseInt(scrollTop));
        localStorage.removeItem('scrollTop'); 
    });

</script>
<script type="text/javascript">
    const guestBtn = document.querySelector('#guestBtn');
    guestBtn.onclick = () => {
        Swal.fire({
        title: 'Thông báo',
        text: "Vui lòng đăng nhập trước khi bình luận",
        icon: 'info',
        showCloseButton: true,
        showCancelButton: true,
        focusCancel: false,
        cancelButtonColor: '#e74c3c',
        cancelButtonText: 'Huỷ',
        confirmButtonColor: '#27ae60',
        confirmButtonText: '<a style="color: white;" href="{{ route('showFormLogin')}}">Đăng Nhập</a>'
    })
    }
</script>
<script type="text/javascript">
const timeAgo = timestamp => {
    const timezoneOffsetMilliseconds = 7 * 60 * 60 * 1000;
    const seconds = Math.floor((new Date() - new Date(timestamp) - timezoneOffsetMilliseconds) / 1000);
    const intervals = {
        'năm': 31536000,
        'tháng': 2592000,
        'tuần': 604800,
        'ngày': 86400,
        'giờ': 3600,
        'phút': 60,
        'giây': 1
    };

    for (let key in intervals) {
        const interval = Math.floor(seconds / intervals[key]);
        if (interval >= 1) {
            return interval + " " + key + " trước";
        } 
    }
    return "Vừa xong";
}
</script>
<script type="text/javascript">
    const loadingContainer = document.querySelector('.loading-container');
    const APP_URL = '{{ env('APP_URL') }}';
    const showMoreBtn = document.querySelector('#showMoreBtn');
    let page = 1;
    showMoreBtn.onclick = () => {
        page++;
        loadingContainer.classList.remove('invisible');
        const href = document.querySelector('#href').value;
        fetch(`${APP_URL}/api/comment/list?v=${href}&page=${page}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            },
        })
        .then(response => response.json())
        .then(response => {
            loadingContainer.classList.add('invisible');
            if(page === response.last_page){
                showMoreBtn.classList.add('invisible');
            }
            const html = response.data.map(item => `
                <div class="anime__review__item">
                    <div class="anime__review__item__pic">
                        <img src="${APP_URL}/img/default-avt.jpg" alt="" />
                    </div>
                    <div class="anime__review__item__text">
                        <h6>
                            ${item.fullname} - <span>${timeAgo(item.createdAt)}</span>
                        </h6>
                        <p>${item.content}</p>
                    </div>
                </div>
            `).join('\n');
            const container = document.querySelector('#review-container');
            container.innerHTML += html;
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // $(document).ready(function() {
    //     let page = 1;
    //     $('#showMoreBtn').click(function() {
    //         console.log('clicked');
    //         const href = document.querySelector('#href').value;
    //         $.ajax({
    //             url: `${APP_URL}/api/comment/list?v=${href}&page=${page}`,
    //             type: 'GET',
    //             dataType: 'json',
    //         }).done(function(result) {
    //             console.log(result);
    //         });
        
    //     });
    // });
</script>
@endsection