<header class="">
    <nav class="border-bottom custom_nav">
        <div class="d-flex justify-content-between">
            <div class="d-flex">
                <div class="m-auto">
                    <div class="d-flex align-items-center text-white">
                        <img src="{{ url('./assets/images/icons/menu-toggle.png') }}" alt="" id="menu-toggle" width="24"
                            height="30">
                    </div>
                </div>
                {{--  <div class="input-group border-1 pad-8-16 gap-8 bg-grey rounded-2 me-3">
                    <span class="input-group-text border-0 p-0  bg-transparent" id="basic-addon1">
                        <img src="assets/images/icons/magnify.png" class="img-fluid" width="22px">
                    </span>
                    <input type="text"
                        class="form-control p-0 text-input fs-16 fw-400-24px border-0 bg-transparent"
                        placeholder="ابحث هنا ...">
                    <button type="button"
                        class="nav-link fs-2 text-capitalize d-block d-md-none searchlase d-lg-none border-0 bg-transparent">
                        <i class="fa-solid fa-magnifying-glass glas"></i>
                    </button>
                </div>  --}}

            </div>
            <div class="d-flex align-items-center justify-content-center gap-12">
                <div>
                    {{--  <button type="button"
                        class="btncust border-c bg-transparent d-flex fw-500-24 rounded-2 justify-content-center align-items-center gap-8 fs-16 fs-16m btn-box-shadow">
                        <img src="./assets/images/icons/quest.png" alt="" width="24" height="24"
                            class="me-2">
                        <span class="text-nowrap text_cap">تحتاج مساعدة?</span>
                    </button>  --}}

                </div>
                <div class="d-flex align-items-center justify-content-between ">
                    <div class="dropdown">
                        <button class="btn p-0 border-0 " type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="d-flex align-items-center">
                                <span>
                                    <img src="{{ url('img/user.png') }}" alt="" class="img-fluid"
                                        width="40" height="40" style="border-radius: 50%;">
                                </span>
                            </div>
                        </button>
                        <ul class="dropdown-menu profile-ul p-8" aria-labelledby="dropdownMenuButton1" style="width: 250px;">
                            <li class="p-12tb">
                                <a href="#"
                                    class="d-flex flex-column justify-content-center align-items-center text-decoration-none">
                                    <div class="">
                                        <img src="{{ url('img/user.png') }}" alt="" class="img-fluid  "
                                            width="60" height="60" style="border-radius: 50%;">
                                    </div>
                                    <div class="py-1 text-center">
                                        <span class="fw-600 text-black text_cap"> ادمين </span>
                                        <p class="m-0 gray-text text-center fw-400"></p>
                                    </div>
                                    {{--  <button type="button"
                                        class="btncust border-c bg-transparent m-12tb d-flex fw-500-24 rounded-2 justify-content-center align-items-center gap-8 fs-16 btn-box-shadow">
                                        <img src="./assets/images/icons/GearSix.png" alt="" width="20"
                                            height="20" class="me-2">
                                        <span class="fw-500 text_cap">اذهب للاعدادات</span>
                                    </button>  --}}
                                </a>
                            </li>
                            <hr class="m-0 p-4tb text-grey">
                            <li>
                                <a class="dropdown-item fs-14 dropitem d-flex align-items-center pad-6-12"
                                    href="{{ url('/logout') }}">
                                    <img src="./assets/images/icons/SignOut.png" alt="" width="18"
                                        height="18" class="me-1">
                                    <span class="text-danger fs-14 fw-400">
                                        خروج
                                    </span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
