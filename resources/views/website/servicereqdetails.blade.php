@php
    $banner = getBanner();
    $about = aboutus();
    $goal = goal();
    $vision = vision();
    $rateUs = rateUs();
    $history = history();
    $dteam = dteam();
    $aboutCompany = aboutCompany();
    $records = getRecords();
@endphp

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Services</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
    @if(App::isLocale('ar'))
    <link rel="stylesheet" type="text/css" href="{{ url('css/style-ltr.css') }}">
    @else
    <link rel="stylesheet" type="text/css" href="{{ url('css/style-rtl.css') }}">
    @endif
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ url('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('css/owl.theme.default.min.css') }}">
    <script src="https://kit.fontawesome.com/00b231478f.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ url('img/admin.png') }}" type="image/x-icon">
</head>

<body>
    <header>
       @include('include.nav')
        <!-- mobile menu start -->
        @include('include.mobile')
        <!-- mobile menu end -->
    </header>
    <section class="bg-header my-5">
        <div class="container">
            <div class="row">
                {{--  <div class="col-lg-12">
                    <div class="download-section">
                        <button class="btn download"><i class="fa-solid fa-download"></i></button>
                    </div>
                </div>  --}}
            </div>
            <div class="row mb-5">

                <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <div class="card  border-0 p-1 about-card">
                        <div class="card-body pb-5 about-card-body">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <p class="card-title about-card-title">
                                        @if(App::isLocale('ar'))
                                            {{ $services->ar_title }}
                                            @else
                                            {{ $services->title }}
                                        @endif
                                    </p>
                                </div>
                                <div class="cool-lg-12 mt-5">

                                    <div class="card-text px-4 fs-14" style="font-size: 16px; text-align: justify;">
                                        @if(App::isLocale('ar'))
                                        {!! $services->ar_description !!}
                                        @else
                                        {!! $services->description !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="flip-btn1 me-5 mt-5">
                <a href="{{ url('/service-req-page/'.$services->id) }}" class="text-decoration-none fs-3">
                    {{ __('welcome.طلب خدمة') }}
                </a>
            </span>
        </div>

    </section>


    @include('include.footer')

    <!-- js area start -->
    <script type="text/javascript" src="{{ url('js/jquery-3.6.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ url('js/owl.carousel.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ url('js/myScript.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        $(document).ready(function () {
            $('#dropdownMenu').click(function () {
                $('.down-caret').toggleClass('open-caret');;
            });
        });
        $(document).ready(function () {
            $('#dropdownMenuone').click(function () {
                $('.down-caretone').toggleClass('open-caret');;
            });
        });
        $(document).ready(function () {
            $('#dropdownMenutwo').click(function () {
                $('.down-carettwo').toggleClass('open-caret');;
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('.searchlase').click(function () {
                $(".searchblock").toggleClass('active')
            });
            $('#closesearch').click(function () {
                $(".searchblock").toggleClass('active')
            });
        })
    </script>
</body>

</html>
