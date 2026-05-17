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
    <title>{{ __('welcome.قائمه الطلبات') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}?v=2">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.bootstrap4.css" />

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
                    <div class="row">
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <h4 class="fs-20 m-0 text_cap text-end">{{ __('welcome.قائمه الطلبات') }}</h4>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <th>
                                        <span class="text-nowrap text_cap">{{ __('welcome.اسم') }}</span>
                                    </th> 
                                    <th>
                                        <span class="text-nowrap text_cap">{{ __('welcome.بريد إلكتروني') }}</span>
                                    </th>
                                    <th>
                                        <span class="text-nowrap text_cap">{{ __('welcome.الجوال') }}</span>
                                    </th>
                                    <th>
                                        <span class="text-nowrap text_cap">{{ __('welcome.نوع الخدمة') }}</span>
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
                                                <span class="fs-14 text-1 fw-500-20 text_cap">
                                                 {{ $rec->name }}
                                                </span>
                                            </div>
                                        </td> 
                                        <td>
                                            <div class="d-flex flex-column">
                                                <span class="fs-14 text-1 fw-400-20 custom_text">
                                                    {{ $rec->email }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="fs-14 text-1 fw-400-20">
                                                {{ $rec->phone }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($rec->services == null)
                                            <span class="fs-14 text-1 fw-400-20 custom_text text_cap">
                                                Other
                                            </span>
                                                @else
                                                <span class="fs-14 text-1 fw-400-20 custom_text text_cap">
                                                    {{ $rec->services->ar_title }}
                                                </span>
                                            @endif

                                        </td>

                                        <td>
                                            <div class="btn-group d-flex justify-content-center gap-2">
                                                <button type="button"
                                                    class="btnView p-2 border-blue py-2 px-2 rounded-2 d-flex justify-content-center align-items-center"
                                                    value="{{ $rec->id }}" >
                                                    <i class="fa-solid fa-eye text-white"></i>
                                                </button>
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
    </div>
        <!-- -------- VIEW REQUEST MODAL --------  -->
        <div class="modal fade" id="viewRequest" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg Home-project-card" dir="rtl">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <h5 class="modal-title fw-bolder fs-20 text-1 text_cap" id="viewModalLabel">{{ __('welcome.مراجعة التفاصيل') }}</h5>
                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        <form class="d-flex flex-column gap-24" id="showdata">
                            <!-- Your form content goes here -->
                        </form>
                    </div>
                    <div class="modal-footer gap-12">
                        <button type="button" class="btncust border-0 bg-link text-white text_cap" data-bs-dismiss="modal">{{ __('welcome.تم') }}</button>
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
        $(document).ready(function() {
            $(document).on('click', '.btnView', function() {
                var sutd_id = $(this).val();

                $('#viewRequest').modal('show');
                $.ajax({
                    type: "GET",
                    url: "editServiceRequest/"+sutd_id,
                    success: function(response) {
                        var showdata = ''
                        if(response.data.services === null)
                        {
                            var type = 'Other'
                        }else{
                            var type = response.data.services.ar_title
                        }
                        showdata +=
                        `
                        <div class="row">
                            <div class="col-lg-6">
                            
                             <div class="d-flex flex-column gap-4c text-end">
                                    <label class="fs-12 fw-bold text-1 text_cap">اسم</label>
                                    <p class="fw-400-24px gray-text-2">
                                        ${response.data.name}
                                    </p>
                                </div>

                                <div class="d-flex flex-column gap-4c text-end">
                                    <label class="fs-12 fw-bold text-1 text_cap">{{ __('welcome.الجوال') }}</label>
                                    <p class="fw-400-24px gray-text-2">
                                        ${response.data.phone}
                                    </p>
                                </div>

                            </div>
                            <div class="col-lg-6 ltr">

                                <div class="d-flex flex-column gap-4c text-end">
                                    <label class="fs-12 fw-bold text-1">{{ __('welcome.نوع الخدمة') }}</label>
                                    <p class="fw-400-24px gray-text-2">
                                        ${type}
                                    </p>
                                </div>
                                <div class="d-flex flex-column gap-4c text-end">
                                    <label class="fs-12 fw-bold text-1">{{ __('welcome.الملاحظات') }}</label>
                                    <p class="fw-400-24px gray-text-2">
                                        ${response.data.ar_nb}
                                    </p>
                                </div>
                            </div>
                        </div>
                        `
                        $('#showdata').html(showdata)
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
