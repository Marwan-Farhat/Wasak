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
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}?v=2">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
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
    <style>
        .download-section{
            text-align: left;
        }
        .download{
            background-color: #f0f0ed;
            width: 40px;
            height: 40px;
            font-size: 20px;
            border: 2px solid rgb(13 95 87);
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
    <section class="bg-header my-5">
        <div class="container">           
            <div class="row mt-3">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <div class="card  border-0 p-1 about-card">
                        <div class="card-body pb-5 about-card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <p class="card-title about-card-title">{{ __('welcome.معلومات عنا') }}</p>
                                </div>
                                <div class="cool-lg-12 mt-5">

                                    <div class="card-text px-4 fs-14" style="font-size: 18px; text-align: justify;">
                                        @if(App::isLocale('ar'))
                                        {!! $about->ar_description !!}
                                        @else
                                        {!! $about->description !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-5 g-5">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <div class="card  border-0 p-1 about-card">
                        <div class="card-body pb-5 about-card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <p class="card-title about-card-title">{{ __('welcome.رؤيتنا') }}</p>
                                </div>
                                <div class="cool-lg-12 mt-5">
                                    <div class="card-text px-4 fs-14" style="font-size: 18px; text-align: justify;">
                                        @if(App::isLocale('ar'))
                                        {!! $vision->ar_description !!}
                                        @else
                                        {!! $vision->description !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <div class="card  border-0 p-1 about-card">
                        <div class="card-body pb-5 about-card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <p class="card-title about-card-title">{{ __('welcome.هدفنا') }}</p>
                                </div>
                                <div class="cool-lg-12 mt-5">
                                    <div class="card-text px-4 fs-14" style="font-size: 18px; text-align: justify;">
                                        @if(App::isLocale('ar'))
                                        {!! $goal->ar_description !!}
                                        @else
                                        {!! $goal->description !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <div class="card  border-0 p-1 about-card">
                        <div class="card-body pb-5 about-card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <p class="card-title about-card-title">{{ __('welcome.قيمنا') }}</p>
                                </div>
                                <div class="cool-lg-12 mt-5">
                                    <div class="card-text px-4 fs-14" style="font-size: 18px; text-align: justify;">
                                        @if(App::isLocale('ar'))
                                        {!! $rateUs->ar_description !!}
                                        @else
                                        {!! $rateUs->description !!}
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div> 
                <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <div class="card  border-0 p-1 about-card">
                        <div class="card-body pb-5 about-card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <p class="card-title about-card-title">{{ __('welcome.فريقنا المتميز') }}</p>
                                </div>
                                <div class="cool-lg-12 mt-5">
                                    <div class="card-text px-4 fs-14" style="font-size: 18px; text-align: justify;">
                                        @if(App::isLocale('ar'))
                                        {!! $dteam->ar_description !!}
                                        @else
                                        {!! $dteam->description !!}
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        @foreach ($records as $rec)
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                    <div class="card  border-0 p-1 about-card">
                        <div class="card-body pb-5 about-card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <p class="card-title about-card-title">
                                        @if(App::isLocale('ar'))
                                        {{$rec->ar_title}}
                                        @else
                                        {{ $rec->title }}
                                        @endif
                                    </p>
                                </div>
                                <div class="cool-lg-12 mt-5">
                                    <div class="card-text px-4 fs-14" style="font-size: 18px; text-align: justify;">
                                        @if(App::isLocale('ar'))
                                        {!! $rec->ar_description !!}
                                        @else
                                        {!! $rec->description !!}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" mt-5">
                <p class="about-heading text-capitalize "></p>

                <h2 class=" pt-2 fs-16">
                    </h2>
            </div>
        </div>
        @endforeach

    </section>


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
        function downloadFile(filePath) {
            // Create a new anchor element
            const link = document.createElement('a');

            // Set the href attribute to the file path
            link.href = filePath;

            // Set the download attribute to suggest a file name (optional)
            link.download = filePath.split('/').pop(); // Extract file name from path

            // Append the link to the body (it must be in the DOM to work)
            document.body.appendChild(link);

            // Programmatically click the link to trigger the download
            link.click();

            // Remove the link from the DOM
            document.body.removeChild(link);
        }
        </script>


</body>

</html>
