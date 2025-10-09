@extends('layouts.master')

@section('content')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        /* تصميم الكروت */
        .single-product-item {
            background: #fff;
            border-radius: 10px;
            transition: all 0.3s ease-in-out;
            padding: 20px;
        }

        .single-product-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .product-image img {
            transition: transform 0.3s ease-in-out;
        }

        .single-product-item:hover .product-image img {
            transform: scale(1.05);
        }

        /* تعديل شكل الأسهم */
        .swiper-button-next,
        .swiper-button-prev {
            width: 45px;
            height: 45px;
            background: #ff7b00;
            border-radius: 50%;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: all 0.3s ease-in-out;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: #ffa31a;
            transform: scale(1.1);
        }

        /* إخفاء النص الافتراضي للأسهم */
        .swiper-button-next::after,
        .swiper-button-prev::after {
            display: none;
        }

        /* مكان الأسهم */
        .swiper-button-next {
            right: 10px;
        }

        .swiper-button-prev {
            left: 10px;
        }
        .update_swiper{
            padding: 1rem 0
        }
        .update_btn_prev{
            left: 0;
        }
        .update_btn_next{
            right: 0;
        }
    </style>

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">اقسام</span> الموقع</h3>
                        <p>متعه التسوق عبر موقعنا</p>
                    </div>
                </div>
            </div>

            <!-- Swiper -->
            <div class="swiper mySwiper update_swiper">
                <div class="swiper-wrapper">
                    @foreach ($categories as $category)
                        <div class="swiper-slide text-center">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="/product/{{ $category->id }}">
                                        <img src="{{ isset($category->image_path) ? url($category->image_path) : '' }}"
                                             style="width: 200px; height: 200px;"
                                             alt="">
                                             <h3>{{ $category->name }}</h3>
                                             <p>{{ $category->description }}</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


                <div class="swiper-button-prev update_btn_prev"><i class="fas fa-chevron-left"></i></div>
                <div class="swiper-button-next update_btn_next"><i class="fas fa-chevron-right"></i></div>


                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            breakpoints: {
                0: { slidesPerView: 1 },
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 },
            },
        });
    </script>
@endsection
