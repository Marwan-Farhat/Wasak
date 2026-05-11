<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Team Mangement</title>
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
        <!-- mobile menu start -->
        @include('include.mobile')
        <!-- mobile menu end -->
    </header>
    <section class="bg-header my-5">
        <div class="container">
            <h1 class="about-heading"> {{ __('welcome.الفريق') }}  </h1>
            <div class="row pt-5 g-5">
                @foreach ($teams as $team)
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-5 mb-5">
                    <div class="card rounded-12 pb-4 custom_card_2 mt-5 h-100 mb-5 position-relative shadow border-0">
                        <div class="our-team-card">
                            <img src="{{ $team->image }}" alt="">
                        </div>
                        <div class="card-body pr-4 pl-4" style="padding-top:70px">
                            @if(App::isLocale('ar'))
                            <h1 class="card-title fw-bold pl-4" style="color: #0a1c3a !important"> {{ $team->ar_title }} </h1>
                            <h4 class="pl-4">{{ $team->ar_designation }}</h4>
                            <div class="pr-4" style="font-size: 16px; ">
                                {!! $team->ar_description !!}
                            </div>
                            @else
                            <h1 class="card-title fw-bold pl-4 " style="color: #0a1c3a !important"> {{ $team->title }} </h1>
                            <h4 class="pl-4">{{ $team->designation }}</h4>
                            <div class="pl-4" style="font-size: 16px;">
                                {!! $team->description !!}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                    @endforeach
            </div>

        </div>
    </section>

    <!-- ----Footer-start-from-here------ -->
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
