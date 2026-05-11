<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Partner</title>
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
            <div class="">
                <h1 class="about-heading">{{ __('welcome.الإنجازاشركاء النجاح') }}</h1>
            </div>

            <div class="row g-5 mt-5 p-sm-3">
                @foreach ($partners as $par)


                <div class="col-6 col-md-6 col-lg-3">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <div class="d-flex align-items-end justify-content-center ">
                                <img src="{{ $par->image }}" style="width:100px; height:100pxs" class="img_50" alt>
                            </div>
                            @if(App::isLocale('ar'))
                            <p class="fs-1 text-muted text-center pt-3"> {{ $par->ar_title }}</p>
                            @else
                            <p class="fs-1 text-muted text-center pt-3"> {{ $par->title }} </p>
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
</body>

</html>
