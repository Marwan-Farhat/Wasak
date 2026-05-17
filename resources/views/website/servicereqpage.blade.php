<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}?v=2">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Request Service</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.min.css') }}">
    @if(App::isLocale('ar'))
    <link rel="stylesheet" type="text/css" href="{{ url('css/style-ltr.css') }}">
    @else
    <link rel="stylesheet" type="text/css" href="{{ url('css/style-rtl.css') }}">
    @endif
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://kit.fontawesome.com/00b231478f.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        @include('include.nav')
        <!-- mobile menu start -->
        @include('include.mobile')
        <!-- mobile menu end -->
    </header>
    <main>
        <section class="m--100 py-3">
            <div class="container my-5">
                <div class="row justify-content-center g-5 align-items-center">
                    <div class="col-lg-12 mt-5">
                        <div>
                            <h4 class=" mt-5">
                                @if(App::isLocale('ar'))
                                    {{ $service->ar_title }}
                                    @else
                                    {{ $service->title }}
                                @endif
                            </h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 fs-14">
                        <form action="{{ url('/storeServiceReq') }}" method="post" class="bg_offwhite shadow mb-5 border-0">
                            @csrf
                            {{--  <p class="fw-bold fs-18">{{ __('welcome.اختر نوع الباقة') }}</p>
                            <div class="row justify-content-between g-5">
                                @foreach ($services as $ser)
                                <div class="col-lg-3">
                                    <div class="form-check d-flex gap-5 align-items-center">
                                        <input class="form-check-input" value="{{ $ser->id }}" type="radio" name="serviceType"
                                            id="flexRadioDefault1">
                                            @if(App::isLocale('ar'))
                                            <label class="form-check-label fs-14" for="flexRadioDefault1">
                                                {{ $ser->ar_title }}
                                            </label>
                                            @else
                                            <label class="form-check-label fs-14" for="flexRadioDefault1">
                                                {{ $ser->title }}
                                            </label>
                                            @endif

                                    </div>
                                </div>
                                @endforeach

                            </div>
                            @if ($errors->has('serviceType'))
                                  <span class="invalid feedback"role="alert" id="emailError">
                                      <strong
                                      class="text-danger" style="font-size: 15px;">{{ $errors->first('serviceType') }}.
                                      </strong>
                                  </span>
                                @endif  --}}
                                <input type="hidden" name="serviceType" value="{{ $id }}">
                            <hr>
                            <div class="row g-3">
                                <p class="fw-bold fs-18">{{ __('welcome.معلومات التواصل') }}</p>
                                  <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="" class="form-label"> {{ __('welcome.الاسم والعائلة') }} <sup class="text-danger">*</sup>
                                    </label>
                                    <input class="form-control form-control-lg" type="text"
                                        aria-label="default input example" name="name">
                                        @if ($errors->has('name'))
                                  <span class="invalid feedback"role="alert" id="emailError">
                                      <strong
                                      class="text-danger" style="font-size: 15px;">{{ $errors->first('name') }}.
                                      </strong>
                                  </span>
                                @endif
                                </div> 
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <label for="" class="form-label">

                                        {{ __('welcome.1رقم الجوال') }}</label>
                                    <input class="form-control form-control-lg" type="number"
                                        aria-label="default input example" name="number">
                                        @if ($errors->has('number'))
                                  <span class="invalid feedback"role="alert" id="emailError">
                                      <strong
                                      class="text-danger" style="font-size: 15px;">{{ $errors->first('number') }}.
                                      </strong>
                                  </span>
                                @endif
                                </div>
                            </div>
                            <div class="row my-4">
                                <div class="col-lg-12">
                                    <label for="" class="form-label">
                                        {{ __('welcome.البريد الالكترونى') }}</label>
                                    <input class="form-control form-control-lg" type="email"
                                         aria-label="default input example" name="email">
                                         @if ($errors->has('email'))
                                  <span class="invalid feedback"role="alert" id="emailError">
                                      <strong
                                      class="text-danger" style="font-size: 15px;">{{ $errors->first('email') }}.
                                      </strong>
                                  </span>
                                @endif
                                </div>
                            </div>
                            <hr>
                            <div class="row g-5 ">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <p class="fw-bold fs-18">{{ __('welcome.الملاحظات') }}</p>
                                    <p class="fw-bold fs-14 my-2">{{ __('welcome.هل ترغب في إضافة ملاحظة؟') }} <sup
                                            class="text-danger">*</sup> </p>
                                    <div class="form-check d-flex gap-5 align-items-center">
                                        <input class="form-check-input" onclick="hide()" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label fs-14" for="flexRadioDefault1">
                                            {{ __('welcome.لا') }}
                                        </label>
                                    </div>
                                    <div class="form-check d-flex gap-5 align-items-center">
                                        <input class="form-check-input" checked onclick="show()" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label fs-14" for="flexRadioDefault1">
                                            {{ __('welcome.نعم') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mt-3 textArea">
                                        <label for="myTextarea" class="form-label fs-5 fw-bold">{{ __('welcome.الرجاء كتابة الملاحظة') }}<sup class="text-danger">*</sup> </label>
                                        <textarea class="form-control" id="myTextarea" required
                                            rows="10" name="nb"></textarea>


                                    </div>
                                    <div class="mt-5">
                                        <button type="submit" class="text-decoration-none sub_btn border-0">
                                            {{ __('welcome.ارسال') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
            </div>
        </section>

    </main>

    @include('include.footer')
    <!-- js area start -->
    <script type="text/javascript" src="{{ url('js/jquery-3.6.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
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
    <script>
        function hide()
        {
            var textarea = document.getElementById('myTextarea');
                textarea.removeAttribute('required');
            $('.textArea').hide()
        }
    </script>
    <script>
        function show()
        {
            var textarea = document.getElementById('myTextarea');
            textarea.setAttribute('required', 'required');
            $('.textArea').show()
        }
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
         toastr.options =
         {
            "closeButton":true,
            "progressBar":true
         }
        toastr.success("{{session('success')}}");
        <?php
        session_start();
        session_destroy();
        ?>
         @endif
        @if (Session::has('error'))
         toastr.options =
         {
            "closeButton":true,
            "progressBar":true
         }
         toastr.error("{{session('error')}}");
         <?php
        session_start();
        session_destroy();
        ?>
         @endif
    </script>

</body>

</html>
