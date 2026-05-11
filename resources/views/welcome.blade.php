@php
    $banner = getBanner();
    $aboutCompany = aboutCompany();
    $content = serviceContent();
    $ach = ach();
    $counter = counter();
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    @if(App::isLocale('ar'))
    <link rel="stylesheet" type="text/css" href="css/style-ltr.css">
    @else
    <link rel="stylesheet" type="text/css" href="css/style-rtl.css">
    @endif
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <script src="https://kit.fontawesome.com/00b231478f.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="img/admin.png" type="image/x-icon">
</head>

<body>
    <header>
        @include('include.nav')

        <!-- search div -->
        <section class="searchblock">
            <div class="position-absolute top-0 end-0 m-3">
                <button id="closesearch" class="bg-transparent text-white fs-1 border-0">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <form>
                            <div class="input-group mb-3">
                                <input type="text"
                                    class="form-control search-nav bg-transparent fs-1 text-white border-0 border-bottom border-white"
                                    placeholder="ابحث هنا..." aria-label="Search here..."
                                    aria-describedby="basic-addon2">
                                <span class="input-group-text  bg-transparent text-white border-0 fs-1"
                                    id="basic-addon2">
                                    <i class="fa-solid fa-magnifying-glass fs-1"></i>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- search div end -->

        <!-- mobile menu start -->
        @include('include.mobile')
        <!-- mobile menu end -->
    </header>
    <main>
        <section class="bg-header1" style="background-image: linear-gradient(rgba(1, 1, 1, 0.5), rgba(1, 1, 1, 0.5)),
        url({{ $banner->image }})" >
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-10 mt-5">
                        <div class="d-flex flex-column gap-4 mt-5 align-items-center justify-content-center ">
                            @if(App::isLocale('ar'))
                            <h1 class="text-white text-center fs-bull text-capitalize"> {{  $banner->ar_title}}</h1>
                            <h2 class="text-white text-center">
                                {{ $banner->ar_subTitle }}
                            </h2>
                            @else
                            <h1 class="text-white text-center fs-bull text-capitalize"> {{  $banner->title}}</h1>
                            <h2 class="text-white text-center">
                                {{ $banner->subTitle }}
                            </h2>
                            @endif
                            <div class="d-flex justify-content-center ">
                                <span class="flip-btn fs-18 mt-5">
                               <!--     <a target="_blank" href="https://wa.me/+{{ $aboutCompany->whatsappNumber }}" class="text-decoration-none bg-transparent">
                                        {{ __('welcome.اطلب الخدمة الان') }}
                                    </a> -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="my-5">
            <div class="container">
                <div class="row justify-content-evenly p-sm-3">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="pt-lg-4">
                            <h1 class="about-heading text-capitalize"> {{__('welcome.من نحن')}}</h1>
                            @if(App::isLocale('ar'))
                            {{--  <p class="fs-12 text-justify my-5" style="font-size: 18px;">  --}}
                                <div class="text-editor-content" style="font-size: 14px; text-align: justify;">
                                {!! $aboutCompany->ar_description !!}
                                </div>
                            {{--  </p>  --}}
                            @else
                            {{--  <p class="fs-12 text-justify my-5" style="font-size: 18px;">  --}}
                                <div class="text-editor-content" style="font-size: 14px; text-align: justify;">
                                {!! $aboutCompany->description !!}
                                </div>
                            {{--  </p>  --}}
                            @endif

                            <div class="mt-5">
                                <span class="flip-btn1 fs-18 my-3">
                                    <a href="{{ url('/about-us') }}" class="text-decoration-none ">
                                        {{__('welcome.المزيد من التفاصيل')}}
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6" id="our-partner">
                        <div class="d-flex justify-content-end p-5">
                            <img src="{{ $aboutCompany->image }}" class="img-fluid" alt>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="my-5 py-5 services_bg" style="background-image: linear-gradient(rgba(1, 1, 1, 0.8), rgba(1, 1, 1, 0.8)),
        url({{ $content->image }}); ">
            <div class="container">
                <div class="row justify-content-center my-5 g-5">
                    <div class="col-lg-12">
                        <h2 class="about-heading text-white text-capitalize">{{ __('welcome.الخدمات') }}</h1>
                         @if(App::isLocale('ar'))
                         <div class="card-text px-4 fs-14" style="font-size: 14px; color:white; ">
                            {{$content->ar_description}}
                         </div>
                         @else
                         <div class="card-text px-4 fs-14" style="font-size: 14px; color:white; ">
                            {{$content->description}}
                         </div>
                         @endif

                    </div>

                    @foreach ($services as $ser)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <a href="{{ url('/our-services-page/'.$ser->id) }}">
                            <div class="card custom_card services_card border-0 p-1 py-5">
                                <div class="card-img custom_card_img" >
                                    <img src="{{ $ser->image }}" alt="" style="width: 100px; height:100 px">
                                    <img src="{{ $ser->image }}" class="white_srv" alt="">
                                </div>
                                <div class="card-body custom_card_body py-4 px-2">
                                    @if(App::isLocale('ar'))
                                    <p class="card-title custom_card_title text-center"> {{$ser->ar_title}}</p>
                                    @else
                                    <p class="card-title custom_card_title text-center"> {{ $ser->title }}</p>
                                    @endif

                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach


                </div>
            </div>
        </section>
        @if($status->partner == 1)
        <section class="">
            <div class="container p-sm-3">
                <div class="">
                    <h1 class="about-heading text-capitalize">{{ __('welcome.شركاء النجاح') }}</h1>

                </div>
                <div class="owl-carousel owl-theme mt-5">
                    @foreach ($partners as $par)
                    <div class="item mt-3">
                        <div class="d-flex justify-content-center h-100">
                            <img src="{{ $par->image }}" style="height: 130px !important; width: 130px !important;" alt>
                        </div>
                    </div>
                @endforeach



                </div>
            </div>
            </div>
        </section>
        @endif
        @if($status->ourTeam == 1)
        <section class="my-5">
            <div class="container">
                <h1 class="about-heading text-capitalize"> {{ __('welcome.الفريق') }} </h1>
                <div class="row g-5 pt-5 justify-content-center ">
                    @foreach ($teams as $team)
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-5 mb-5">
                        <div class="card rounded-12 pb-4 custom_card_2 mt-5 h-100 mb-5 position-relative shadow border-0">
                            <div class="our-team-card">
                                <img src="{{ $team->image }}" alt="">
                            </div>
                            <div class="card-body pr-4 pl-4" style="padding-top:70px">
                                @if(App::isLocale('ar'))
                                <h1 class="card-title fw-bold pl-4 pt-3" style="color: #c2882a !important"> {{ $team->ar_title }} </h1>
                                <h4 class="pl-4">{{ $team->ar_designation }}</h4>
                                <div class="pr-4" style="font-size: 14px; ">
                                    {!! $team->ar_description !!}
                                </div>
                                @else
                                <h1 class="card-title fw-bold pl-4 " style="color: #c2882a !important"> {{ $team->title }} </h1>
                                <h4 class="pl-4">{{ $team->designation }}</h4>
                                <div class="pl-4" style="font-size: 14px;">
                                    {!! $team->description !!}
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="mt-5 d-flex justify-content-center">
                        <span class="flip-btn1 fs-16 my-3 mt-5">
                            <a href="{{ url('/our-team') }}" class="text-decoration-none ">
                                {{ __('welcome.المزيد من التفاصيل') }}
                            </a>
                        </span>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if($status->achievement == 1)
      <section class="">
    <div class="container">
        <div class="row justify-content-evenly g-5 mt-5 p-sm-3">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="">
                    <h1 class="about-heading"> {{ __('welcome.الجودة') }}</h1>
                    @if(App::isLocale('ar'))
                        <div id="description-text-ar" class="text-editor-content" style="font-size: 16px; text-align: justify;">
                            {!! $ach->ar_description !!}
                        </div>
                    @else
                        <div id="description-text-en" class="text-editor-content" style="font-size: 16px; text-align: justify;">
                            {!! $ach->description !!}
                        </div>
                    @endif
                                               <div class="mt-5">
                                <span class="flip-btn1 fs-18 my-3">
                                    <a href="{{ url('/our-quality') }}" class="text-decoration-none ">
                                        {{__('welcome.المزيد من التفاصيل')}}
                                    </a>
                                </span>
                            </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
                <div class="achieve_img mt-3">
                    <img src="{{$ach->image}}" class="object-fit-cover" alt>
                </div>
            </div>
        </div>
    </div>
</section>



        @endif

        @if($status->counter == 1)
            <section class="p-3">
            <div class="container mb-5">
                <div class="row g-5">
                    <div class="">
                        <h1 class="about-heading text-capitalize fw-bold mb-3">
                            {{ __('welcome.عداد العملاء والزيارات') }}
                        </h1>
                    </div>
                </div>

                <div class="row mt-3 mb-4 gap-4 justify-content-center ">
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5 count-card bg-golden-clr">
                        <div class="d-flex justify-content-center">
                            <img src="{{ $counter->customerImage }}" alt width="80" height="80">
                        </div>
                        @if(App::isLocale('ar'))
                        <h2 class="text-white text-capitalize text-center fw-semibold mt-4 mb-3">
                            {{ $counter->ar_customerTitle }}
                       </h2>
                       @else
                       <h2 class="text-white text-capitalize text-center fw-semibold mt-4 mb-3">
                            {{ $counter->customerTitle }}
                       </h2>
                       @endif
                        <h1 class="text-white fw-semibold text-center  mb-3 counter-count">
                            {{ $counter->numberofCustomer }}
                        </h1>

                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-5   count-card bg-golden-clr">
                        <div class="d-flex justify-content-center">
                            <img src="{{ $counter->visitorImage }}" alt width="80" height="80">
                        </div>
                        @if(App::isLocale('ar'))
                        <h2 class="text-white text-capitalize text-center fw-semibold mt-4 mb-3">
                             {{ $counter->ar_visitorTitle }}
                        </h2>
                        @else
                        <h2 class="text-white text-capitalize text-center fw-semibold mt-4 mb-3">
                             {{ $counter->visitorTitle }}
                        </h2>
                        @endif

                        <h1 class="text-white fw-semibold text-center  mb-3 counter-count">
                            {{ $visitorCount }}
                        </h1>
                    </div>
                </div>
            </div>
        </section>
        @endif

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
            <a href="https://wa.me/+{{ $aboutCompany->whatsappNumber }}" target="_blank" class="btn btn-custom">
                {{ __('welcome.واتس اب') }}
            </a>
        </span>
    </div>
</div>

                </div>
            </div>
        </section>
    </main>
    @include('include.footer')

    <!-- js area start -->
    <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/owl.carousel.min.js">
    </script>
    <script type="text/javascript" src="js/myScript.js"></script>
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
    <script>
    function limitText(selector, maxLength) {
        var element = document.getElementById(selector);
        var originalText = element.innerHTML;
        
        // If the text exceeds the limit, truncate it and add "Read more"
        if (originalText.length > maxLength) {
            var truncatedText = originalText.substring(0, maxLength) + '...';
            element.innerHTML = truncatedText;

            // Show the "Read more" link
            document.getElementById('read-more-link').style.display = 'block';
        }
    }

    // Call the limitText function for both languages
    limitText('description-text-ar', 1000); // Limit Arabic text to 150 characters
    limitText('description-text-en', 1000); // Limit English text to 150 characters
    
</script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
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
    <script>
        $('.counter-count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {

                //chnage count up speed here
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>

</body>

</html>
