@extends('layouts.web')

@section('title', 'Movie W3b - '.$video->title)

@section('content')
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ route('home') }}"><i class="fa fa-home"></i> Trang chủ</a> <a
                        href="${initParam['mvcPath']}/categories">Thể Loại</a> <span>Thông Tin Phim</span>
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
            <div class="col-lg-12">
                <div id="player" data-plyr-provider="youtube" data-plyr-embed-id="{{ $video->href }}"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="anime__details__review">
                    @if (count($video->comments) > 0)
                    <div class="section-title">
                        <h5 class="mb-6">Bình luận</h5>
                    </div>

                    @foreach ($video->comments as $comment )
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="{{ asset('img/default-avt.jpg') }}"
                                     alt=""/>
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
                    @endif
                </div>

                <div class="anime__details__form">
                    @auth
                        <div class="section-title">
                            <h5>Để lại đánh giá</h5>
                        </div>

                        <form action="${initParam['mvcPath']}/video/comment" method="post">
                            <textarea placeholder="Nội dung..." name="content" required></textarea>
                            <input name="href" type="hidden" value="{{ $video->href }}">

                            <button type="submit">
                                <i class="fa fa-location-arrow"></i> Gửi Bình Luận
                            </button>

                        </form>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</section>
@endsection