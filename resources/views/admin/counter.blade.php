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
    <title>{{ __('welcome.عداد العملاء والزيارات') }}</title>
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
                    <form action="{{ url('/updateCounter') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data->id }}">

                    <div class="row g-4">
                        <div class="d-flex">

                        <h5 class="mb-4 fs-20 text_cap"> {{ __('welcome.إجمالي العملاء') }}
                        </h5>
                        @if($status->counter == 1)
                        <div class="me-3" id="someContainerTwo">
                            <a class="text-decoration-none" href="{{ url('/updateCounterStatusHide') }}">
                                <span id="displayShowone" class="fa fa-eye" ></span>
                            </a>
                        </div>
                        @else
                        <div class="me-3" id="someContainer" >
                            <a class="text-decoration-none" href="{{ url('/updateCounterStatus') }}">
                                <span id="displayHideone" class="fa-sharp fa-solid fa-eye-slash"></span>
                            </a>
                        </div>
                        @endif
                    </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <input type="file" name="customerImage" onchange="loadFile2(event)" id="profileimg2" class="d-none"
                                 />
                            <div class="hw-100img w-100">
                                <label for="profileimg2" class="hw-100 w-100 rounded-2">
                                    <img src="{{ $data->customerImage }}"
                                        class="img-fluid w-100 object-fit-cover h-100 rounded-2" id="output2">
                                </label>
                            </div>
                            <p class="text-end">image aspect ratio : 80 x 80 px</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.العنوان باللغة الانجليزية') }}</label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" value="{{ $data->customerTitle }}" required name="customerTitle"
                                        placeholder="">
                                </div>
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.العنوان باللغة العربية') }}</label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" value="{{ $data->ar_customerTitle }}" required name="ar_customerTitle"
                                        placeholder="">
                                </div>

                            </div>
                            <div class="my-2">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.رقم') }}</label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" required value="{{ $data->numberofCustomer }}" name="numberofCustomer"
                                        placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row g-4 mt-5">
                        <h5 class="mb-4 fs-20 text_cap">{{ __('welcome.إجمالي الزائرين') }}</h5>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <input type="file" name="visitorImage" onchange="loadFile(event)" id="profileimg" class="d-none"
                                 />
                            <div class="hw-100img w-100">
                                <label for="profileimg" class="hw-100 w-100 rounded-2">
                                    <img src="{{ $data->visitorImage }}"
                                        class="img-fluid w-100 object-fit-cover h-100 rounded-2" id="output">
                                </label>
                            </div>
                            <p class="text-end">image aspect ratio : 80 x 80 px</p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="d-flex flex-column gap-4c">
                                <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.العنوان باللغة الانجليزية') }}</label>
                                <input type="text" name="visitorTitle" required value="{{ $data->visitorTitle }}" class="form-control fw-400-24px gray-text-2 pad-8-16"
                                    placeholder="">
                            </div>
                            <div class="d-flex flex-column gap-4c">
                                <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.العنوان باللغة العربية') }}</label>
                                <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" name="ar_vistiorTitle" required value="{{ $data->ar_visitorTitle }}"
                                    placeholder="">
                            </div>
                            <div class="my-2">
                                <div class="d-flex flex-column gap-4c">
                                    <label class="fs-12 fw-400-20px text-1 text_cap">{{ __('welcome.رقم') }}</label>
                                    <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16" name="numberofVisitor" value="{{ $data->numberofVisitor }}" required
                                        placeholder="">
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
    <script>
        var loadFile2 = function (event) {
            var image = document.getElementById('output2');
            image.src = URL.createObjectURL(event.target.files[0]);
        };
        var loadFile = function (event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
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
