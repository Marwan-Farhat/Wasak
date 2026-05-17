<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}?v=2">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recruitment & Training</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    @if(App::isLocale('ar'))
    <link rel="stylesheet" type="text/css" href="css/style-ltr.css">
    @else
    <link rel="stylesheet" type="text/css" href="css/style-rtl.css">
    @endif
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://kit.fontawesome.com/00b231478f.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
    @include('include.nav')
    @include('include.mobile')
    <!-- mobile menu end -->
    </header>
    <main>
        <section class="m--100 py-3">
            <div class="container my-5">
                <div class="row justify-content-center g-5 align-items-center">
                    <div class="col-lg-12">
                        <div>
                            <p class="about-heading text-capitalize">{{ __('welcome.التوظيف والتدريب') }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="{{ url('/storeTraining') }}" method="post" class="bg_offwhite shadow mb-5 border-0" enctype="multipart/form-data">
                            @csrf
                            {{--  <p class="fw-bold fs-18">{{ __('welcome.اختر نوع الطلب') }}<sup class="text-danger">*</sup> </p>
                            <div class="row g-3">
                                <div class="col-lg-2">
                                    <div class="form-check d-flex gap-5 align-items-center">
                                        <input class="form-check-input" value="توظيف" type="radio" name="orderType"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label fs-14" for="flexRadioDefault1">
                                            {{ __('welcome.توظيف') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-check d-flex gap-5 align-items-center">
                                        <input class="form-check-input" value="تدريب" type="radio" name="orderType"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label fs-14" for="flexRadioDefault1">
                                            {{ __('welcome.تدريب') }}
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('orderType'))
                                  <span class="invalid feedback"role="alert" id="emailError">
                                      <strong
                                      class="text-danger" style="font-size: 15px;">{{ $errors->first('orderType') }}.
                                      </strong>
                                  </span>
                                @endif
                            </div>
                            <hr>  --}}
                            <div class="row g-3 fs-14">
                                <p class="fw-bold fs-18">{{ __('welcome.معلومات') }} </p>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="" class="form-label"> {{ __('welcome.اسم') }} <sup class="text-danger">*</sup>
                                    </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg_ow" id="basic-addon1">
                                            <img src="./images/name-input.png" alt="" class="img-fluid" width="15"
                                                height="15">
                                        </span>
                                        <input class="form-control form-control-lg" type="text"
                                            placeholder="Enter Your Full Name" name="name" aria-label="default input example">
                                    </div>
                                    @if ($errors->has('name'))
                                  <span class="invalid feedback"role="alert" id="emailError">
                                      <strong
                                      class="text-danger" style="font-size: 15px;">{{ $errors->first('name') }}.
                                      </strong>
                                  </span>
                                @endif
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="" class="form-label">
                                        {{ __('welcome.البريد الالكترونى') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg_ow" id="basic-addon1">
                                            <img src="./images/email-input.png" alt="" class="img-fluid" width="16"
                                                height="16">
                                        </span>
                                        <input class="form-control form-control-lg" type="email"
                                            placeholder="أدخل بريدك الإلكتروني" name="email" aria-label="default input example">
                                    </div>
                                    @if ($errors->has('email'))
                                  <span class="invalid feedback"role="alert" id="emailError">
                                      <strong
                                      class="text-danger" style="font-size: 15px;">{{ $errors->first('email') }}.
                                      </strong>
                                  </span>
                                @endif
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="" class="form-label">
                                        {{ __('welcome.الجوال') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg_ow" id="basic-addon1">
                                            <img src="./images/phone-input.png" alt="" class="img-fluid" width="16"
                                                height="16">
                                        </span>
                                        <input class="form-control form-control-lg " name="number" type="number" name="number" placeholder="+966..."
                                            aria-label="default input example">
                                    </div>
                                    @if ($errors->has('number'))
                                  <span class="invalid feedback"role="alert" id="emailError">
                                      <strong
                                      class="text-danger" style="font-size: 15px;">{{ $errors->first('number') }}.
                                      </strong>
                                  </span>
                                @endif
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="" class="form-label">
                                        {{ __('welcome.المؤهل') }}<sup class="text-danger">*</sup></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg_ow" id="basic-addon1">
                                            <img src="./images/degree-input.png" alt="" class="img-fluid" width="16"
                                                height="16">
                                        </span>
                                        <select name="qualification" class="form-select form-select-lg" aria-label="Large select example">
                                            <option selected hidden>{{ __('welcome.اختر مؤهلاتك') }}</option>
                                            <option value="بكالوريوس">{{ __('welcome.بكالوريوس') }}</option>
                                            <option value="سادة">{{ __('welcome.سادة') }}</option>
                                            <option value="دكتوراه">{{ __('welcome.دكتوراه') }}</option>
                                        </select>
                                    </div>
                                    @if ($errors->has('qualification'))
                                  <span class="invalid feedback"role="alert" id="emailError">
                                      <strong
                                      class="text-danger" style="font-size: 15px;">{{ $errors->first('qualification') }}.
                                      </strong>
                                  </span>
                                @endif
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                    <label for="" class="form-label">
                                        {{ __('welcome.التخصص') }}<sup class="text-danger">*</sup> </label>
                                    <div class="input-group">
                                        <span class="input-group-text bg_ow" id="basic-addon1">
                                            <img src="./images/certificate-input.png" alt="" class="img-fluid"
                                                width="16" height="16">
                                        </span>
                                        <input class="form-control form-control-lg" type="text" name="specialization" placeholder=""
                                            aria-label="default input example">
                                    </div>
                                    @if ($errors->has('specialization'))
                                    <span class="invalid feedback"role="alert" id="emailError">
                                        <strong
                                        class="text-danger" style="font-size: 15px;">{{ $errors->first('specialization') }}.
                                        </strong>
                                    </span>
                                  @endif
                                </div>
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
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-12 mt-4">
                                     <p class="text-black fs-16 fw-bold  ">{{ __('welcome.إضافة السيرة الذاتية') }}</p>

                                    <div class=" d-flex flex-column justify-content-center align-items-center gap-24 bg_ow">
                                        <input class="form-control" type="file" required name="image" id="formFileMultiple"  accept="">
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
  <script>
    function HandleBrowseClick() {
        var fileinput = document.getElementById("browse");
        fileinput.click();
    }
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

</body>

</html>
