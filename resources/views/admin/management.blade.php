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
    <link rel="shortcut icon" href="img/admin.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap4.css" />
    <title>{{ __('welcome.الفريق') }}</title>
    <style>
        #dt-length-1{
            margin-bottom: 15px !important;
        }
        #dt-length-1 label {
            display: none !important;
        }
        .dataTables_length {
                display: none !important;
        }
    </style>



</head>

<body>
    <!-- /#page-content-wrapper starts -->
    <div class="d-flex dir_rtl" id="wrapper">
        <!-- Sidebar -->
        @include('include.sidebar')
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            @include('include.header')

            {{--  <section class="searchblock">
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
            </section>  --}}

            <div class="h-500px scroll" id="page-content-wrapper">
                <div class="container p-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center gap-4c">
                                    <div class="d-flex">
                                        <h4 class="fs-20 m-0 text_cap">{{ __('welcome.الفريق') }}</h4>
                                        @if ($status->ourTeam == 1)
                                            <div class="me-3" id="someContainerTwo">
                                                <a class="text-decoration-none"
                                                    href="{{ url('/updateCounterStatusHideTeam') }}">
                                                    <span id="displayShowone" class="fa fa-eye"></span>
                                                </a>
                                            </div>
                                        @else
                                            <div class="me-3" id="someContainer">
                                                <a class="text-decoration-none"
                                                    href="{{ url('/updateCounterStatusTeam') }}">
                                                    <span id="displayHideone"
                                                        class="fa-sharp fa-solid fa-eye-slash"></span>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                @if ($status->ourTeam == 1)
                                <div>
                                    <a href="#addmodal" data-bs-toggle="modal"
                                        class="text-decoration-none btncust bg-link1 fs-16 fw-500-24 d-flex align-items-center justify-content-center gap-8 text-white text-capitalize">
                                        <span>
                                            <img src="assets/images/icons/plus-wh.png" class="img-fluid" width="24px">
                                        </span>
                                        <span>
                                        {{ __('welcome.جديد') }}
                                        </span>
                                    </a>
                                </div>
                                @else
                                <div>
                                    <a href=""  data-bs-toggle="modal"
                                        class="text-decoration-none btncust bg-link1 fs-16 fw-500-24 d-flex align-items-center justify-content-center gap-8 text-white text-capitalize">
                                        <span>
                                            <img src="assets/images/icons/plus-wh.png" class="img-fluid" width="24px">
                                        </span>
                                        <span>
                                        {{ __('welcome.جديد') }}
                                        </span>
                                    </a>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="table-responsive px-3">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>

                                    <th>
                                        <span class="text-nowrap text_cap">{{ __('welcome.صورة') }}</span>
                                    </th>
                                    <th>
                                        <span class="text-nowrap text_cap">{{ __('welcome.اسم فريق') }}</span>
                                    </th>
                                    <th>
                                        <span class="text-nowrap text_cap">{{ __('welcome.Description الوصف') }}</span>
                                    </th>
                                    <th class="text-center">
                                        <span class="text-nowrap text_cap">{{ __('welcome.الإجراءات') }}</span>
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach ($records as $rec)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center gap-16">
                                                    <span class="fs-14 text-1 fw-500-20 text_cap text-center mt-3">
                                                        <img src="{{ $rec->image }}" class="audit1" alt=""
                                                            style="width: 100px; height:100px">
                                                    </span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center gap-16">
                                                    <span class="fs-14 text-1 fw-500-20 text_cap">
                                                        {{ $rec->ar_title }}
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="fs-12 text-capitalize fw-500-20 text-nowrap custom_text">
                                                <span>{!! $rec->ar_description !!}</span>
                                            </td>

                                            <td>
                                                <div class="btn-group d-flex justify-content-center gap-2">
                                                    <button type="button"
                                                        class="btnView p-2 border-blue py-2 px-2 rounded-2 d-flex justify-content-center align-items-center"
                                                        value="{{ $rec->id }}">
                                                        <i class="fa-solid fa-eye text-white"></i>
                                                    </button>
                                                    <div class="btn-group d-flex justify-content-center gap-2">
                                                        <button type="button"
                                                            class="btnEdit p-2 border-blue py-2 px-2 rounded-2 d-flex justify-content-center align-items-center"
                                                            value="{{ $rec->id }}">
                                                            <i class="fa-solid fa-edit text-white"></i>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group d-flex justify-content-center gap-2">
                                                        <button type="button"
                                                            class="btnDelete p-2 border-blue py-2 px-2 rounded-2 d-flex justify-content-center align-items-center"
                                                            value="{{ $rec->id }}">
                                                            <i class="fa-solid fa-trash text-white"></i>
                                                        </button>
                                                    </div>
                                                    <div class="btn-group d-flex justify-content-center gap-2">
                                                        <button type="button"
                                                            class="pinButton p-2 border-blue py-2 px-2 rounded-2 d-flex justify-content-center align-items-center {{ $rec->pinStatus ? 'disabled' : '' }}"
                                                            data-bs-toggle="modal"
                                                            data-partner-id="{{ $rec->id }}">
                                                            <i class="fa-solid fa-thumbtack"
                                                                style="color: {{ $rec->pinStatus ? '#9EA788' : '#ffffff' }};"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- -------- VIEW REQUEST MODAL --------  -->
        <div class="modal fade" id="viewRequest" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg  Home-project-card" dir="rtl">
                <div class="modal-content ">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <h5 class="modal-title fw-bolder fs-20 text-1 text_cap" id="viewModalLabel"> {{ __('welcome.الفريق') }} </h5>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <form class="d-flex flex-column gap-24">
                            <div class="row justify-content-center ">
                                <div class="col-12 col-sm-12 col-md-10 col-lg-10 mt-5">
                                    <div class="card rounded-12 pb-4 custom_card_2 mt-5">
                                        <div class="our-team-card text-center"><i class="fas fa-user-circle text-center"></i></div>
                                        <div class="card-body pr-4 mt-3">
                                            <div class="row mt-4">
                                                <div class="col-md-6 text-right"><!-- Adjusted text alignment -->
                                                    <h4 id="viewArName"> </h4>
                                                    <h4 id="viewArdes"> </h4>
                                                    <h4 id="viewArDescription"> </h4>
                                                </div>
                                                <div class="col-md-6 text-right"><!-- Adjusted text alignment -->
                                                    <h4 class="text-start" id="viewName"> </h4>
                                                    <h4 class="text-start" id="viewdes"> </h4>
                                                    <h4 class="text-start" id="viewDescription"> </h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer gap-12">
                        <button type="button" class="btncust border-0 bg-link text-white text_cap" data-bs-dismiss="modal">{{ __('welcome.تم') }}</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add modal -->
        <div class="modal  fade" id="addmodal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg  Home-project-card">
                <div class="modal-content ">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <h5 class="modal-title fw-bolder fs-20 text-1 text_cap" id="viewModalLabel"> {{ __('welcome.الفريق') }}</h5>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <form action="{{ url('/storeTeam') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row p-2">
                                <div class="col-lg-12">

                                    <h4 class="fs-20 m-0 text_cap text-end">{{ __('welcome.إضافة صورة') }}</h4>
                                    <div class=" d-flex mt-1 flex-column justify-content-center align-items-center ">
                                        <div class="hw-100-m" onclick="HandleBrowseClickTWO();">
                                            <input type="file" id="browse" class="d-none" name="image"
                                                onchange="loadFile(event)" />
                                            <img src=""
                                                class="img-fluid w-100 object-fit-cover h-100 rounded-2 m-0 "
                                                id="output">
                                        </div>
                                    </div>
                                    <p class="text-end">image aspect ratio : 100 x 100 px</p>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1 text-end">{{ __('welcome.اسم فريق') }}</label>
                                        <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16"
                                            required name="ar_title" placeholder="">
                                    </div>
                                    <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1 text-end">{{ __('welcome.تعيين') }}</label>
                                        <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16"
                                            required name="ar_designation" placeholder="">
                                    </div>
                                    <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1 text-end">{{ __('welcome.Description الوصف') }}</label>
                                        <textarea  name="ar_description" id="editor" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1 ">Name</label>
                                        <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16"
                                            required name="title" placeholder="">
                                    </div>
                                    <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1">designation</label>
                                        <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16"
                                            required name="designation" placeholder="">
                                    </div>
                                    <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1">Description</label>
                                        <textarea  name="description" id="editor2" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer gap-12">
                        <button type="submit" class="btncust border-0 bg-link text-white text_cap">حفظ</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal  fade" id="editRequest" tabindex="-1" aria-labelledby="viewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg  Home-project-card">
                <div class="modal-content ">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <h5 class="modal-title fw-bolder fs-20 text-1 text_cap" id="viewModalLabel">{{ __('welcome.الفريق') }} </h5>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <form action="{{ url('/updateTeam') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row p-2">
                                <div id="imageDev"></div>

                                <div class="col-lg-6 mt-3">
                                    <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1 text-end">اسم</label>
                                        <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16"
                                            id="editArTitle" required name="ar_title" placeholder="">
                                    </div>
                                    <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1 text-end">{{ __('welcome.تعيين') }}</label>
                                        <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16"
                                            required name="ar_designation" id="editar_designation" placeholder="">
                                    </div>
                                    <div id="showEditArDescription"></div>
                                    {{--  <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1 text-end">{{ __('welcome.Description الوصف') }}</label>
                                        <textarea class="form-control" required id="editArdescription" name="ar_description"
                                             rows="5"></textarea>
                                    </div>  --}}
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1 ">Name</label>
                                        <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16"
                                            name="title" required id="edittitle" placeholder="">
                                    </div>
                                    <div class="d-flex flex-column gap-4c">
                                        <label class="fs-12 fw-400-20px text-1">Designation</label>
                                        <input type="text" class="form-control fw-400-24px gray-text-2 pad-8-16"
                                            required name="designation" id="editdesignation" placeholder="">
                                    </div>
                                    <div id="showEditDescription"></div>
                                </div>
                                <input type="hidden" name="id" id="editID">
                            </div>
                    </div>
                    <div class="modal-footer gap-12">
                        <button type="submit" class="btncust border-0 bg-link text-white text_cap">{{ __('welcome.حفظ') }}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- delete modal -->
        <div class="modal  fade" id="deleteservices" tabindex="-1" aria-labelledby="viewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered Home-project-card">
                <div class="modal-content ">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <h5 class="modal-title fw-600-24 fs-20 text-1 text_cap" id="viewModalLabel">{{ __('welcome.تحذير') }}</h5>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form class="d-flex flex-column gap-24">
                            <div class="row gap-16">
                                <div class="col-lg-12">
                                    <div class="d-flex flex-column gap-4c">
                                        <p class="text-1 fw-400-24px fs-16 text-end">{{ __('welcome.هل تريد الحذف ؟') }}</p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer gap-12">
                        <form action="{{ url('/deleteTeam') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="" id="deleteID">
                            <button type="button" class="btncust border-c bg-transparent" data-bs-dismiss="modal">
                            {{ __('welcome.لا') }}</button>
                            <button type="submit" class="btn1  border-0" data-bs-dismiss="modal">
                            {{ __('welcome.نعم') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- /#page-content-wrapper ends-->
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap4.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "pagingType": "full_numbers", // Pagination type
                "dom": '<"top d-flex justify-content-start"f><"top d-flex justify-content-end"l>rt<"bottom"ip><"clear">', // Reordering elements
                "language": { // Customizing language options
                    "search": "بحث:",
                    "paginate": {
                        "first": "الأول",
                        "last": "الأخير",
                        "next": "التالي",
                        "previous": "السابق"
                    },
                    "info": "إظهار _START_ إلى _END_ من أصل _TOTAL_ مُدخل"
                }
            });
        });
    </script>
        <script type="text/javascript">
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
        <script>
            let dropdowns = document.querySelectorAll('.project-dropdown')
            dropdowns.forEach((dd) => {
                dd.addEventListener('click', function(e) {
                    var el = this.nextElementSibling
                    el.style.display = el.style.display === 'block' ? 'none' : 'block'
                })
            })
        </script>
        <script>
            function HandleBrowseClick(event) {
                var fileinput = document.getElementById("browse");
                fileinput.click();
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);

            }
        </script>
        <script>
            function HandleBrowseClickTWO() {
                var fileinput = document.getElementById("browse");
                fileinput.click();
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.searchlase').click(function() {
                    $(".searchblock").toggleClass('active')
                });
                $('#closesearch').click(function() {
                    $(".searchblock").toggleClass('active')
                });
            })
        </script>
        <script>
            $(document).ready(function() {
                var el = document.getElementById("wrapper");
                var toggleButton = document.getElementById("menu-toggle");

                toggleButton.onclick = function() {
                    el.classList.toggle("toggled");
                };

            });
        </script>
        <script>
            toggleButton.onclick = function() {
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
                mergetags_list: [{
                        value: 'First.Name',
                        title: 'First Name'
                    },
                    {
                        value: 'Email',
                        title: 'Email'
                    },
                ],
                ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                    "See docs to implement AI Assistant")),
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
                .then( /* ... */ )
                .catch( /* ... */ );
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
                .then( /* ... */ )
                .catch( /* ... */ );
        </script>
        <script>
            ClassicEditor
                .create(document.querySelector('#editArdescription'), {
                    /* ... */
                    ui: {
                        poweredBy: {
                            display: 'none'
                        }
                    }
                })
                .then( /* ... */ )
                .catch( /* ... */ );
        </script>
        <script>

        </script>
        <script>
            var pinButtons = document.querySelectorAll('.pin-button');

            pinButtons.forEach(function(pinButton) {
                pinButton.addEventListener("click", function() {
                    togglePin(pinButton);
                });
            });

            function togglePin(button) {
                var isPinned = button.classList.contains('pinned');

                if (isPinned) {
                    button.innerHTML = '<img src="assets/images/pin.png" alt="">';
                    button.classList.remove('pinned');
                } else {
                    button.innerHTML = '<img src="assets/images/pin-fill.png" alt="">';
                    button.classList.add('pinned');
                }
            }
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
                $('.pinButton').on('click', function() {
                    var button = $(this);
                    var partnerId = button.data('partner-id');
                    var newStatus = button.hasClass('disabled') ? 0 : 1; // Toggle status

                    // Check if partner ID is available
                    if (!partnerId) {
                        console.error("Partner ID is missing.");
                        return;
                    }

                    console.log("Updating pin status for partner with ID: " + partnerId + " to " + newStatus);

                    $.ajax({
                        url: '/api/updatePinTeam',
                        type: 'POST',
                        data: {
                            id: partnerId,
                            status: newStatus
                        },
                        success: function(response) {
                            if (response.success) {
                                button.toggleClass('disabled', newStatus == 1);
                                button.find('i').css('color', newStatus == 1 ? '#9EA788' :
                                    '#ffffff');
                                // Pin status updated successfully
                                toastr.options = {
                                    "closeButton": true,
                                    "progressBar": true
                                }
                                toastr.success("تم تحديث حالة الإدارة بنجاح  ");
                            } else {
                                // Error updating pin status
                                toastr.options = {
                                    "closeButton": true,
                                    "progressBar": true
                                }
                                toastr.error(" اكتمل حد الدبوس ");

                                console.error("Failed to update pin status for partner with ID: " +
                                    partnerId);
                            }
                        },
                        error: function(error) {
                            console.error(
                                "An error occurred while updating pin status for partner with ID: " +
                                partnerId);
                        }
                    });
                });
            });
        </script>
        <script>
            var loadFile = function(event) {
                var image = document.getElementById('output');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
            var loadFile2 = function(event) {
                var image = document.getElementById('output2');
                image.src = URL.createObjectURL(event.target.files[0]);
            };
        </script>
        <script>
            function HandleBrowseClick() {
                document.getElementById("fileInput").click();
            }

            function loadFile3(event) {
                var output = document.getElementById('output3');
                output.src = URL.createObjectURL(event.target.files[0]);
            }
        </script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '.btnDelete', function() {
                    var sutd_id = $(this).val();
                    $('#deleteservices').modal('show');
                    $('#deleteID').val(sutd_id)
                });
            });
        </script>

        <script>
            $(document).ready(function() {
                $(document).on('click', '.btnView', function() {
                    var sutd_id = $(this).val();
                    $('#viewRequest').modal('show');
                    $.ajax({
                        type: "GET",
                        url: "api/editAdministration/" + sutd_id,
                        success: function(response) {
                            $('#viewArName').text(response.data.ar_title)
                            $('#viewArDescription').html(response.data.ar_description)
                            $('#viewName').text(response.data.title)
                            $('#viewDescription').html(response.data.description)
                            $('#viewArdes').text(response.data.ar_designation)
                            $('#viewdes').text(response.data.designation)
                        }
                    });
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                $(document).on('click', '.btnEdit', function() {
                    var sutd_id = $(this).val();
                    $.ajax({
                        type: "GET",
                        url: "api/editAdministration/" + sutd_id,
                        success: function(response) {
                            $('#editRequest').modal('show');
                            var image = ''
                            var url = response.data.image
                            image += `
                            <div class="col-lg-12">
                                <h4 class="fs-20 m-0 text_cap text-end">إضافة صورة</h4>
                                <div class="d-flex mt-1 flex-column justify-content-center align-items-center">
                                    <div class="hw-100-m" onclick="HandleBrowseClick();">
                                        <input type="file" id="fileInput" class="d-none" name="image" onchange="loadFile3(event)" />
                                        <img src="${url}" class="img-fluid w-100 object-fit-cover h-100 rounded-2 m-0" id="output3">
                                    </div>
                                </div>
                                <p class="text-end">image aspect ratio : 100 x 100 px</p>
                            </div>
                        `
                        var editDescription = ''
                        editDescription +=
                        `
                        <div class="d-flex flex-column gap-4c">
                            <label class="fs-12 fw-400-20px text-1">Description</label>
                            <textarea class="form-control" id="editdescription" name="description" required rows="5">${response.data.description}</textarea>
                        </div>
                        `
                        $('#showEditDescription').html(editDescription)
                        ClassicEditor
                        .create(document.querySelector('#editdescription'), {
                            /* ... */
                            ui: {
                                poweredBy: {
                                    display: 'none'
                                }
                            }
                        })
                        .then( /* ... */ )
                        .catch( /* ... */ );
                        var editArDescription = ''
                        editArDescription +=
                        `
                        <div class="d-flex flex-column gap-4c">
                            <label class="fs-12 fw-400-20px text-1 text-end">وصف</label>
                            <textarea class="form-control" id="editArDescription" name="ar_description" required rows="5">${response.data.ar_description}</textarea>
                        </div>
                        `
                        $('#showEditArDescription').html(editArDescription)
                        ClassicEditor
                        .create(document.querySelector('#editArDescription'), {
                            /* ... */
                            ui: {
                                poweredBy: {
                                    display: 'none'
                                }
                            }
                        })
                        .then( /* ... */ )
                        .catch( /* ... */ );

                            $('#imageDev').html(image)

                            $('#editArTitle').val(response.data.ar_title)
                            $('#edittitle').val(response.data.title)

                            $('#editID').val(response.data.id)
                            $('#editar_designation').val(response.data.ar_designation)
                            $('#editdesignation').val(response.data.designation)




                        }
                    });
                });
            });
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
