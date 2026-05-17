<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}?v=2">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blogs</title>
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
</head>

<body>
    <header>
        @include('include.nav')
        <!-- mobile menu start -->
       @include('include.mobile')
        <!-- mobile menu end -->
    </header>
    <section class="bg-header">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="">
                        <p class="about-heading">{{ __('welcome.المدونة') }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-5 justify-content-center">
                @foreach ($blogs as $blog)
<div class="col-md-6 col-lg-3">
    <div class="card rounded-12 h-100 overflow-hidden bg-clr">
        <div class="blog-card">
            <img src="{{ $blog->image }}" class="img-fluid" alt="...">
        </div>
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between">
                <p class="text-muted fs-14 custom_text">
                    <span class="text-muted fs-4">
                        <i class="fa-regular fa-newspaper"></i>
                    </span> 
                    {{ __('welcome.أخبار') }}
                </p>
                <div>
                    <p class="fs-14 custom_text mt-3">
                        <span class="text-danger">
                            <i class="fa-regular fa-clock"></i>
                        </span> 
                        {{ $blog->date }}
                    </p>
                </div>
            </div>
            @if(App::isLocale('ar'))
            <h4 class="fw-bold text-blue text-truncate" title="{{ $blog->ar_title }}">
                {{ Str::limit($blog->ar_title, 40, '...') }}
            </h4>
            <p class="card-text fs-14 custom_text text-justify text-truncate" title="{{ $blog->ar_description }}">
                {{ Str::limit($blog->ar_description, 80, '...') }}
            </p>
            @else
            <h4 class="fw-bold text-blue text-truncate" title="{{ $blog->title }}">
                {{ Str::limit($blog->title, 40, '...') }}
            </h4>
            <p class="card-text fs-14 custom_text text-justify text-truncate" title="{{ $blog->description }}">
                {{ Str::limit($blog->description, 80, '...') }}
            </p>
            @endif
            <div class="mt-2">
                <a href="{{ url('/blog-details/'.$blog->id) }}" 
                   class="text-decoration-none text-center btnCust-1 text-uppercase py-2 w-100">
                    {{ __('welcome.اقرأ أكثر') }}
                </a>
            </div>
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
