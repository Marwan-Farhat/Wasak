<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style-rtl.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <!-- for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css  " />
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}?v=2">
    <title>{{ __('welcome.اتصل بنا') }}</title>
</head>

<body>
    <!-- /#page-content-wrapper starts -->
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @include('include.sidebar')
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            @include('include.header')

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
                                        placeholder="ابحث هنا..." aria-label="ابحث هنا..."
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

            <div class="h-500px scroll" id="page-content-wrapper">
                <div class="container p-24">
                    <form action="{{ url('/updateCallUs') }}" method="post" class="row g-4">

                            @csrf
                        <input type="hidden" name="id" id="" value="{{ $data->id }}">
                        <h5 class="mb-4 fs-20 text_cap">{{ __('welcome.اتصل بنا') }}</h5>


                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.الجوال') }}</label>
                                    <input type="text" name="phone" value="{{ $data->phone }}" class="form-control fw-400-24px gray-text-2 pad-8-16"
                                        placeholder="">
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.بريد إلكتروني') }}</label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" name="email" required value="{{ $data->email }}"
                                        placeholder="">
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.أيام العمل') }}</label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" name="workDays" required value="{{ $data->workDays }}"
                                        placeholder="">
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">  Working Days (English)</label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" name="en_workDays" required value="{{ $data->en_workDays }}"
                                        placeholder="">
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.ساعات الدوام') }}</label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" name="workHours" required value="{{ $data->workHours }}"
                                        placeholder="">
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">  Working Hours (English) </label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" name="en_workHours" required value="{{ $data->en_workHours }}"
                                        placeholder="">
                                </div>
                            </div>
                        </div> 
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.خط الطول') }}</label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" name="long" required value="{{ $data->long }}"
                                        placeholder="">
                                </div>

                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.خط العرض') }}</label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" name="lat" required value="{{ $data->lat }}"
                                        placeholder="">
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12 mt-5">
                            <div class="d-flex justify-content-center my-3">
                                <button type="submit"
                                    class="text-decoration-none btncust border-0 bg-link fs-16 fw-500-24 px-5 text-white text-capitalize">
                                    {{ __('welcome.حفظ') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /#page-content-wrapper ends-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/app.js"></script>
    <script type="text/javascript">
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
        let dropdowns = document.querySelectorAll('.project-dropdown')
        dropdowns.forEach((dd) => {
            dd.addEventListener('click', function (e) {
                var el = this.nextElementSibling
                el.style.display = el.style.display === 'block' ? 'none' : 'block'
            })
        })
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
        $(document).ready(function () {
            var el = document.getElementById("wrapper");
            var toggleButton = document.getElementById("menu-toggle");

            toggleButton.onclick = function () {
                el.classList.toggle("toggled");
            };

        });

    </script>
    <script>
        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if (Session::has('success'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.success("{{ session('success') }}");
        <?php
        session_start();
        session_destroy();
        ?>
    @endif
    @if (Session::has('error'))
        toastr.options = {
            "closeButton": true,
            "progressBar": true
        }
        toastr.error("{{ session('error') }}");
        <?php
        session_start();
        session_destroy();
        ?>
    @endif
</script>
<script>
    $(document).ready(function() {
        // Add click event listener to collapse triggers
        $('.arrowdown-arr').click(function() {
            // Hide all collapse sections
            $('.list-style-cs').collapse('hide');
            // Show the clicked collapse section
            $($(this).attr('href')).collapse('show');
        });
    });
</script>
</body>

</html>
