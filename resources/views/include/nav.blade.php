@php
    $title = title();
@endphp

<style>
/* Language Text Custom Color */     /* custom css for nave bar start from here */
.custom-language-btn h5 {
    color: #FFFFFF !important; /* Custom text color for language (Gold color example) */
    margin: 0; /* Remove any margin for proper alignment */
}

/* Dropdown Arrow Custom Color */
.custom-language-btn .down-caret i {
    color: #FFFFFF !important; /* Arrow color (Gold color example) */
    transition: transform 0.3s ease; /* Smooth transition effect */
}


    
/* Force custom navbar background and text color */
nav.custom-navbar {
    background-color: #0a1c3a !important; /* Your custom background color */
    height: 85px;
}

nav.custom-navbar .nav-link {
    color: #FFFFFF !important; /* Custom text color for links */
}

nav.custom-navbar .nav-link:hover {
    color: #c2882a !important; /* Custom text color on hover */
}

nav.custom-navbar .active-nav-link {
    color: #c2882a !important; /* Active link color */
}

nav.custom-navbar .navbar-toggler img {
    filter: brightness(0) invert(1); /* Ensure toggler icon remains visible */
}

/* Dropdown Menu Text Color */
.custom-navbar .dropdown-menu .dropdown-item {
    color: #c2882a !important; /* Custom text color for dropdown items */
    background-color: #FFFFFF; /* Background color of dropdown menu */
    transition: background-color 0.3s ease, color 0.3s ease; /* Smooth transition */
}

/* Hover State for Dropdown Menu Items */
.custom-navbar .dropdown-menu .dropdown-item:hover {
    background-color: #c2882a !important; /* Hover background color */
    color: #FFFFFF !important; /* Hover text color */
}

     /* custom css for nave bar end  from here */
</style>

<nav class="navbar navbar-expand-xl p-0 navbar-light fixed-top custom-navbar">   <!--  nav bar change line for all websites-->
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ url('img/navbar.png') }}" class="img-fluid sizelogo">
        </a>
        <div class="d-flex align-items-center justify-content-end gap-3">
            {{--  <button type="button"
                class="nav-link fs-2 text-capitalize d-block d-md-none searchlase d-lg-none border-0 bg-transparent">
                <i class="fa-solid fa-magnifying-glass search_color"></i>
            </button>  --}}
            <button class="navbar-toggler" type="button" onclick="openNav()">
                <img src="{{ url('images/menu.png') }}" class="img-fluid">
            </button>
        </div>

        <div class="collapse navbar-collapse ">
            <ul class="navbar-nav d-flex justify-content-center align-items-center mb-2 mb-lg-0 w-100">
                <li class="nav-item">
                    <a class="{{ (request()->is('/')) ? 'active-nav-link' : '' }} nav-link text-uppercase text_gold text-nowrap "
                        href="{{ url('/') }}">
                        {{ __('welcome.الرئيسية') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ (request()->is('about-us')) ? 'active-nav-link' : '' }} nav-link text-uppercase text_gold text-nowrap" href="{{ url('/about-us') }}">
                        {{__('welcome.عن الشركة')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ (request()->is('our-services')) ? 'active-nav-link' : '' }} nav-link text-uppercase text_gold text-nowrap" href="{{ url('/our-services') }}">
                        {{ __('welcome.الخدمات') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ request()->is('blog-home*') || request()->is('blog-details/*') ? 'active-nav-link' : '' }} nav-link text-uppercase text_gold text-nowrap" href="{{ url('/blog-home') }}">
                        {{ __('welcome.المدونة') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="{{ (request()->is('service-req')) ? 'active-nav-link' : '' }} nav-link text-uppercase text_gold text-nowrap" href="{{ url('/service-req') }}">
                        @if(App::isLocale('ar'))
                        {{ $title->ar_title }}
                            @else
                            {{ $title->title }}
                        @endif
                    </a>
                </li>
         <!--       <li class="nav-item">
                    <a class="{{ (request()->is('recruitment-page')) ? 'active-nav-link' : '' }}  nav-link text-uppercase text_gold text-nowrap" href="{{ url('/recruitment-page') }}">
                        {{ __('welcome.التوظيف والتدريب') }}
                    </a>
                </li>   -->
                <li class="nav-item">
                    <a class="{{ (request()->is('contact-us')) ? 'active-nav-link' : '' }} nav-link text-uppercase text_gold text-nowrap" href="{{url('/contact-us')}}">
                        {{ __('welcome.اتصل بنا') }}
                    </a>
                </li>
            </ul>
<div class="d-flex align-items-center justify-content-center gap-3">   <!-- for languange color chnage has to apply this code  line to -->
    <div class="dropdown nav-link ms-5">
        <button class="bg-transparent p-0 d-flex align-items-center border-0 fs-5 gap-2 custom-language-btn"
            id="dropdownMenu" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            @if(App::isLocale('ar'))
                <h5>AR</h5>
            @else
                <h5>EN</h5>
            @endif

            <span class="down-caret">
                <i class="fa-solid fa-chevron-down"></i>
            </span>
        </button>
        <ul class="dropdown-menu">
            @foreach (Config::get('languages') as $lang => $language)
            <li class="lang-dropdown">
                @if ($lang != App::getLocale())
                <a class="dropdown-item text-uppercase fs-5 d-flex align-items-center gap-2"
                    href="{{ route('lang.switch', $lang) }}">
                    <span class="mb-0">
                        {{$language}}
                    </span>
                </a>
                @endif
            </li>
            @endforeach
        </ul>
    </div>
</div>    <!--  till this line has to replace in all places..-->
        </div>
    </div>
</nav>
