<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style-rtl.css">
    <!-- for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css  " />
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}?v=2">
    <title>{{ __('welcome.الإنجازات') }}</title>
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
                <div class="container  p-24">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <div class="d-flex">
                            <h4 class="fs-20 my-1 text_cap">{{ __('welcome.الجودة') }}</h4>
                            @if($status->achievement == 1)
                            <div class="me-3" id="someContainerTwo">
                                <a class="text-decoration-none" href="{{ url('/updateCounterStatusHideAch') }}">
                                    <span id="displayShowone" class="fa fa-eye" ></span>
                                </a>
                            </div>
                            @else
                            <div class="me-3" id="someContainer" >
                                <a class="text-decoration-none" href="{{ url('/updateCounterStatusAch') }}">
                                    <span id="displayHideone" class="fa-sharp fa-solid fa-eye-slash"></span>
                                </a>
                            </div>
                            @endif
                        </div>
                        </div>
                    </div>
                    <form action="{{ url('/updateachievements') }}" method="post" enctype="multipart/form-data">

                    <div class="row m--100">

                            @csrf
                        <input type="hidden" name="id" value="{{ $data->id }}">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <input type="file" name="image" onchange="loadFile2(event)" id="profileimg2" class="d-none"
                                 />
                            <div class="hw-100img w-100">
                                <label for="profileimg2" class="hw-100 w-100 rounded-2">
                                    <img src="{{ $data->image }}"
                                        class="img-fluid w-100 object-fit-cover h-100 rounded-2" id="output2">
                                </label>
                            </div>
                            <p class="text-end">image aspect ratio : 377 x 533 px</p>
                        </div>

                        <div class="col-lg-6">
                            <div class="d-flex flex-column gap-24 pt-lg-5">
                                <div class="row gap-16 g-5">
                                    <div class="col-lg-12">
                                        <h5 class="fs-18 my-2 text_cap">{{ __('welcome.الوصف باللغة العربية') }}</h5>
                                        <div class="d-flex flex-column gap-4c">
                                            <label class="fs-12 fw-400-20px text-1">Description (In English)</label>
                                            <textarea class="form-control" id="editor" name="description" required rows="6">{{ $data->description }}</textarea>
                                        </div>
                                        <h5 class="fs-18 my-2 text_cap">{{ __('welcome.الوصف') }}</h5>
                                        <div class="d-flex flex-column gap-4c my-4">
                                            <label class="fs-12 fw-400-20px text-1 text_cap">
                                            {{ __('welcome.التفاصيل باللغة العربية') }}
                                            </label>
                                            <textarea id="editor2" class="form-control" name="ar_description" required rows="6">{{ $data->ar_description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
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
        <!-- <script>
            tinymce.init({
                selector: 'textarea#editor',
                plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                api_key: '77pxm7jjljghdj96jjs6m95wgem8eeadx4p78wy4y1y76tju',
                mergetags_list: [
                    { value: 'First.Name', title: 'First Name' },
                    { value: 'Email', title: 'Email' },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
            });
        </script> -->
        <script>
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    /* ... */
                    ui: {
                        poweredBy: {
                            display: 'none'
                        }
                    }
                })
                .then( /* ... */)
                .catch( /* ... */);
        </script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editor2'), {
                    /* ... */
                    ui: {
                        poweredBy: {
                            display: 'none'
                        }
                    }
                })
                .then( /* ... */)
                .catch( /* ... */);
        </script>
        <script>
            var loadFile = function (event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
            var loadFile2 = function (event) {
                var image = document.getElementById('output2');
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
