@php
    $banner = getBanner();

@endphp
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Services</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    @if (App::isLocale('ar'))
        <link rel="stylesheet" type="text/css" href="css/style-ltr.css">
    @else
        <link rel="stylesheet" type="text/css" href="css/style-rtl.css">
    @endif
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://kit.fontawesome.com/00b231478f.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/admin.png" type="image/x-icon">
    <style>
        .hovereffect1:hover {
            background-color: var(--golden-color) !important;
            color: var(--white-color) !important;
            transition: 0.5s all;
        }

        .hovereffect1 {
            border-radius: 10px !important;

        }

        @media (max-width: 768px) {
            .text-justify-custom {
                text-align: justify !important;
                text-justify: inter-word;
            }

            .col-12 {
                max-width: 100% !important;
                flex: 0 0 100% !important;
            }
        }

        .text-justify-custom {
            text-align: justify;
        }
    </style>
</head>
<body>
    <header>
        @include('include.nav')
        <!-- mobile menu start -->
        @include('include.mobile')
        <!-- mobile menu end -->
    </header>
    <main>
        <section class="m--100">
            <div class="container my-5">
                <div class="row justify-content-center g-5 py-5">
                    <div class="col-lg-12">
                        <div>
                            <p class="about-heading">{{ __('welcome.الخدمات') }}</p>
                        </div>
                    </div>
                    @foreach ($services as $ser)
                        <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                            <a href="{{ url('/our-services-page/'.$ser->id) }}" class="">
                                <div class="card shadow hovereffect1 h-100" style="">
                                    <div class="card-body p_24 position-relative rounded-3 ">
                                        <div class="position-absolute top-50 start-50 translate-middle"
                                            style="opacity: 0.2;">
                                            <img src="{{ $ser->image }}" class="img-fluid" style="width: 50px; height:50px">
                                        </div>
                                        @if (App::isLocale('ar'))
                                            <h1 class="fw-bold card-title"> {{ $ser->ar_title }} </h1>
                                            {{--  <div class="fs-16 text-justify-custom" style="font-size: 16px;">
                                                {!! $ser->ar_description !!}
                                            </div>  --}}
                                        @else
                                            <h1 class="fw-bold card-title"> {{ $ser->title }} </h1>
                                            {{--  <div class="fs-16 text-justify-custom" style="font-size: 16px;">
                                                {!! $ser->description !!}
                                            </div>  --}}
                                        @endif
                                    </div>
                                        <button  class="flip-btn4 fs-3">
                                            {{ __('welcome.طلب خدمة') }}
                                        </button>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <div class="live-chat">
            <div class="position-fixed  chat ">
                <img src="./images/whatsapp.png" alt="" class="rounded-circle">
            </div>
        </div>

                <section class="need-help-section pb-3">
            <div class="container">
                <div class="row align-items-center">
                   <div class="col-12 col-sm-12 col-md-6 col-lg-6 my-5">
    <div class="need p-4">
        <p class="about-heading1 text-white mb-0 text-capitalize">{{ __('welcome.المساعدة') }}</p>
        @if(App::isLocale('ar'))
        <p class="fs-14 text-white">{{ $banner->ar_help }}</p>
        @else
        <p class="fs-14 text-white">{{ $banner->help }}</p>
        @endif
    </div>
</div>
<div class="col-12 col-sm-12 col-md-6 col-lg-4">
    <div class="button-container d-flex align-items-center justify-content-center gap-4">
        <span class="flip-btn1">
            <a href="{{ url('/service-req') }}" class="btn btn-custom">
                {{ __('welcome.طلب خدمة') }}
            </a>
        </span>
        <span class="flip-btn3">
            <a href="{{ url('/contact-us') }}" target="_blank" class="btn btn-custom">
                {{ __('welcome.واتس اب') }}
            </a>
        </span>
    </div>
</div>

                </div>
            </div>
        </section>
    </main>
    <!-- ----Footer-start-from-here------ -->
    @include('include.footer')
    <!-- js area start -->
    <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script type="text/javascript" src="js/myScript.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        $(document).ready(function() {
            $('#dropdownMenu').click(function() {
                $('.down-caret').toggleClass('open-caret');;
            });
        });
        $(document).ready(function() {
            $('#dropdownMenuone').click(function() {
                $('.down-caretone').toggleClass('open-caret');;
            });
        });
        $(document).ready(function() {
            $('#dropdownMenutwo').click(function() {
                $('.down-carettwo').toggleClass('open-caret');;
            });
        });
    </script>

    <script>
        var swiper = new Swiper(".mySwipermain", {
            spaceBetween: 30,
            centeredSlides: true,
            // effect: "fade",
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.searchlase').click(function() {
                $(".searchblock").toggleClass('active')
            });
            $('#closesearch').click(function() {
                $(".searchblock").toggleClass('active')
            });
        })
    </script>
    <script>
        $('.counter-count').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {

                //chnage count up speed here
                duration: 4000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>

</body>
</html>
