<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Details</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">

    @if(App::isLocale('ar'))
    <link rel="stylesheet" type="text/css" href="{{ url('css/style-ltr.css') }}">
    @else
    <link rel="stylesheet" type="text/css" href="{{ url('css/style-rtl.css') }}">
    @endif
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <script src="https://kit.fontawesome.com/00b231478f.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ url('img/admin.png') }}" type="image/x-icon">
</head>
<style>
.fixed-img {
    width: 100%; /* Ensures the image takes the full width of its container */
    height: 500px; /* Set a fixed height (adjust as needed) */
    object-fit: contain; /* Ensures the image is fully contained inside the container, maintaining its aspect ratio */
    object-position: center; /* Ensures the image is centered in the container */
}

</style>
<body>
    <header>
        @include('include.nav')



         <!-- mobile menu start -->
        @include('include.mobile')
        <!-- mobile menu end -->
    </header>
    <section class="bg-header">
        <div class="container">
            <div class="row mb-3">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="">
                        <p class="about-heading">{{ __('welcome.تفاصيل المدونة') }}</p>

                    </div>

                </div>
            </div>
            <div class="row g-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="">
                                <div class="card rounded-12 bg-light overflow-hidden">
                                <div class="">
                                 <img src="{{ $blog->image }}" class="img-fluid fixed-img" alt="...">
                                 </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="">
                                @if(App::isLocale('ar'))
                                <h1 class="fcust-2 text-blue fw-bold mb-3">
                                    {{ $blog->ar_title }}
                                </h1>
                                <p class="card-text fs-14 text-justify">
                                    {{ $blog->ar_description }}
                                </p>
                                @else
                                <h1 class="fcust-2 text-blue fw-bold mb-3">
                                    {{ $blog->title }}
                                </h1>
                                <p class="card-text fs-14 text-justify">
                                    {{ $blog->description }}
                                </p>
                                @endif


                                <div class="d-flex align-items-center justify-content-between">
                                    <p class="text-muted fs-14"><span class="text-muted fs-2"><i
                                                class="fa-regular fa-newspaper"></i></span> {{ __('welcome.أخبار') }}</p>
                                    <div>
                                        <p class="fs-14 mt-3"><span class="text-danger"><i
                                                    class="fa-regular fa-clock"></i></span> {{ $blog->date }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h3 class="fw-bold mb-5 text-blue">{{ __('welcome.المدونات الأخيرة') }}</h3>
                    <div class="row justify-content-center g-4">
                        @foreach ($blogs as $data)

                       <div class="col-12">
    <a href="{{ url('/blog-details/'.$data->id) }}" class="text-decoration-none text-dark">
        <div class="card rounded-12 bg-light overflow-hidden">
            <div class="row">
                <div class="col-5">
                    <div class="blog-card2">
                        <img src="{{ $data->image }}" class="img-fluid" alt="...">
                    </div>
                </div>
                <div class="col-7">
                    <div class="p-2 h-100">
                        @if(App::isLocale('ar'))
                        <h5 class="card-title text-blue fw-bold fs-3 text-ellipsis" title="{{ $data->ar_title }}">
                            {{ Str::limit($data->ar_title, 20, '...') }}
                        </h5>
                        <p class="fs-13 m-0 truncate-2 text-p-1" title="{{ $data->ar_description }}">
                            {{ Str::limit($data->ar_description, 80, '...') }}
                        </p>
                        @else
                        <h5 class="card-title text-blue fw-bold fs-3 text-ellipsis" title="{{ $data->title }}">
                            {{ Str::limit($data->title, 20, '...') }}
                        </h5>
                        <p class="fs-13 m-0 truncate-2 text-p-1" title="{{ $data->description }}">
                            {{ Str::limit($data->description, 80, '...') }}
                        </p>
                        @endif
                        <div class="d-flex align-items-center mt-3 justify-content-between">
                            <p class="m-0 fs-13">
                                <span class="text-muted fs-4"><i class="fa-regular fa-newspaper"></i></span> 
                                {{ __('welcome.أخبار') }}
                            </p>
                            <div>
                                <p class="fs-13 m-0">
                                    <span class="text-danger"><i class="fa-regular fa-clock"></i></span>
                                    {{ $data->date }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ----Footer-start-from-here------ -->
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
