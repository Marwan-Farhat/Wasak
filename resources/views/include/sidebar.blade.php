<div class="side-bar position-relative text-capitalize " id="sidebar-wrapper">
    <div class="text-center brand-logo">
        <img src="{{ url('img/admin-logo.png') }}" class="img-fluid mb-5" alt="">
    </div>
    <div class="">
        <ul class="navbar-nav sidebar_list active mt-5">
            <li class="nav-item mt-1 position-relative">
                <a class="text-decoration-none nav-link d-flex justify-content-between arrowdown-arr" data-bs-toggle="collapse" href="#collapseExample">
                    <div class="d-flex align-items-center">
                        <span>
                            <img src="{{ url('assets/images/icons/house.png') }}" class="img-fluid mx-1" width="20" height="20">
                        </span>
                        <p class="m-0">
                        {{ __('welcome.الرئيسية') }}
                        </p>
                    </div>
                    <div class="myArrow1"><i class="fas gray-text fa-angle-down "></i></div>
                </a>
                <div class="collapse list-style-cs show" id="collapseExample">
                    <ul class="position-relative">
                        <li>
                            <a href="{{ url('/dashboard') }}" class="{{ (request()->is('dashboard')) ? 'active' : '' }} text-decoration-none  text-capitalize text-end">
                            {{ __('welcome.العنوان الرئيسي') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/titles') }}" class="{{ (request()->is('titles')) ? 'active' : '' }} text-decoration-none  text-capitalize text-end">
                                العنوان
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/aboutCompany') }}" class="{{ (request()->is('aboutCompany')) ? 'active' : '' }} text-decoration-none  text-capitalize text-end">
                            {{ __('welcome.عن الشركة') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/ourPartners') }}" class="{{ (request()->is('ourPartners')) ? 'active' : '' }} text-decoration-none  text-capitalize text-end">
                            {{ __('welcome.شركاء النجاح') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/management') }}" class="{{ (request()->is('management')) ? 'active' : '' }} text-decoration-none text-capitalize text-end">
                            {{ __('welcome.الفريق') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/achievements-page') }}" class="{{ (request()->is('achievements-page')) ? 'active' : '' }} text-decoration-none   text-capitalize text-end">
                            {{ __('welcome.الجودة') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/counter-page') }}" class="{{ (request()->is('counter-page')) ? 'active' : '' }} text-decoration-none   text-capitalize text-end">
                            {{ __('welcome.عداد العملاء والزيارات') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>




            <li class="nav-item mt-1 position-relative">
                <a class="text-decoration-none nav-link d-flex justify-content-between arrowdown-arr"
                    data-bs-toggle="collapse" href="#collapseExample2">
                    <div class=" d-flex align-items-center">
                        <span>
                            <img src="{{ url('assets/images/icons/about.png') }}" class="img-fluid mx-1" width="20"
                                height="20">
                        </span>
                        <p class="m-0">
                        {{ __('welcome.معلومات عنا') }}
                        </p>
                    </div>
                    <div class="myArrow1"><i class="fas gray-text fa-angle-down "></i></div>
                </a>
                <div class="collapse list-style-cs show" id="collapseExample2">
                    <ul class="position-relative ">
                        <li>
                            <a href="{{ url('/history') }}" class="{{ (request()->is('history')) ? 'active' : '' }} text-decoration-none text-capitalize text-end">
                            {{ __('welcome.تاريخنا') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/vision') }}"
                                class="{{ (request()->is('vision')) ? 'active' : '' }}  text-decoration-none text-capitalize text-nowrap text-end">
                                {{ __('welcome.رؤيتنا') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/goal') }}" class="{{ (request()->is('goal')) ? 'active' : '' }} text-decoration-none text-capitalize text-end">
                            {{ __('welcome.هدفنا') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/rate-us') }}" class="{{ (request()->is('rate-us')) ? 'active' : '' }} text-decoration-none text-capitalize text-end">
                            {{ __('welcome.قيمنا') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/aboutus') }}" class="{{ (request()->is('aboutus')) ? 'active' : '' }} text-decoration-none text-capitalize text-end">
                            {{ __('welcome.معلومات عنا') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/distinguished-team') }}" class="{{ (request()->is('distinguished-team')) ? 'active' : '' }} text-decoration-none text-capitalize text-end">
                            {{ __('welcome.فريقنا المتميز') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/aboutUSPage') }}" class="{{ (request()->is('aboutUSPage')) ? 'active' : '' }} text-decoration-none text-capitalize text-end">
                                {{ __('welcome.عنا نصوص الصفحة') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item mt-1">
                <a href="{{ url('/blog-page') }}" class="{{ (request()->is('blog-page')) ? 'active' : '' }} text-decoration-none   nav-link d-flex align-items-center">
                    <span class="p-0">
                        <img src="{{ url('assets/images/icons/blog.png') }}" class="img-fluid mx-1" width="20"
                            height="20">
                    </span>
                    <p class="m-0 text_cap">{{ __('welcome.المدونة') }}</p>
                </a>
            </li>
            <li class="nav-item mt-1">
                <a href="{{ url('/services-type') }}" class="{{ (request()->is('services-type')) ? 'active' : '' }} text-decoration-none   nav-link d-flex align-items-center">
                    <span class="p-0">
                        <img src="{{ url('assets/images/icons/services-now.png') }}" class="img-fluid mx-1" width="20"
                            height="20">
                    </span>
                    <p class="m-0 text_cap">{{ __('welcome.نوع الخدمة') }}</p>
                </a>
            </li>
            <li class="nav-item mt-1">
                <a href="{{ url('/services-req') }}" class="{{ (request()->is('services-req')) ? 'active' : '' }} text-decoration-none nav-link d-flex align-items-center">
                    <span class="p-0">
                        <img src="{{ url('assets/images/icons/services.png') }}" class="img-fluid mx-1" width="20"
                            height="20">
                    </span>
                    <p class="m-0 text_cap">{{ __('welcome.قائمه الطلبات') }}</p>
                </a>
            </li>
     <!--       <li class="nav-item mt-1">
                <a href="{{ url('/recruitment') }}" class="{{ (request()->is('recruitment')) ? 'active' : '' }} text-decoration-none nav-link d-flex align-items-center">
                    <span class="p-0">
                        <img src="{{ url('assets/images/icons/recruitment.png') }}" class="img-fluid mx-1" width="20"
                            height="20">
                    </span>
                    <p class="m-0 text_cap ">{{ __('welcome.طلبات التوظيف/التدريب') }}</p>
                </a>
            </li>  -->
            <li class="nav-item mt-1">
                <a href="{{ url('/contact') }}" class="{{ (request()->is('contact')) ? 'active' : '' }} text-decoration-none  nav-link d-flex align-items-center">
                    <span class="p-0">
                        <img src="{{ url('assets/images/icons/contact.png') }}" class="img-fluid mx-1" width="20"
                            height="20">
                    </span>
                    <p class="m-0 text_cap ">{{ __('welcome.اتصل بنا') }}</p>
                </a>
            </li>
            <li class="nav-item mt-1">
                <a href="{{ url('/social-acc') }}" class="{{ (request()->is('social-acc')) ? 'active' : '' }} text-decoration-none  nav-link d-flex align-items-center">
                    <span class="p-0">
                        <img src="{{ url('assets/images/icons/social-ac.png') }}" class="img-fluid mx-1" width="20"
                            height="20">
                    </span>
                    <p class="m-0 text_cap ">{{ __('welcome.الحسابات الاجتماعية') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
