          @php
    $title = title();
@endphp

<div id="myNav" class="overlay">
    <!-- Button to close the overlay navigation -->
    <div class="d-flex justify-content-between align-items-center px-3">
        <div>
            <a href="javascript:void(0)" class="text-white" style="font-size: 40px" onclick="closeNav()">&times;</a>
        </div>
        <div class="dropdown nav-link text-dark">
            <button class="bg-transparent p-0 d-flex align-items-center border-0 fs-5 gap-2"
                id="dropdownMenu" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if(App::isLocale('ar'))
                <lable class="text-white">AR</lable>
                <img src="" class="img-fluid" width="30px">
                @else
                <img src="" class="img-fluid" width="30px">
                <lable class="text-white">EN</lable>
                @endif
                <span class="down-caret">
                    <i class="fa-solid fa-chevron-down nav-bar-link text-white"></i>
                </span>
            </button>
            <ul class="dropdown-menu ">
                @foreach (Config::get('languages') as $lang => $language)
                <li class="lang-dropdown">
                    @if ($lang != App::getLocale())
                    <a class="dropdown-item text-uppercase fs-5 d-flex align-items-center gap-2 text-dark"
                        href="{{ route('lang.switch', $lang) }}">
                        @if(App::isLocale('ar'))
                        <img src="" class="img-fluid w-20">
                        @else
                        <img src="" class="img-fluid w-20">
                        @endif
                        <span class="mb-0">
                            {{$language}}
                        </span>
                    </a>
                    @endif
                </li>
                @endforeach
            </ul>
        </div>

    </div>
    <!-- Overlay content -->
    <div class="overlay-content top-0" >

        <a href="{{ url('/') }}" class="text-decoration-none text-white text-nowrap text-capitalize">
            {{ __('welcome.الرئيسية') }}
        </a>
        <a href="{{ url('/about-us') }}" class="text-decoration-none text-white text-capitalize">
            {{ __('welcome.عن الشركة') }}
        </a>
          <a href="{{ url('/our-services') }}" class="text-decoration-none text-white text-capitalize">{{ __('welcome.الخدمات') }}</a>
        <a href="{{ url('/blog-home') }}" class="text-decoration-none text-white text-capitalize">{{ __('welcome.المدونة') }}</a>
                <a href="{{ url('/service-req') }}" class="text-decoration-none text-white text-capitalize">
                @if(App::isLocale('ar'))
                        {{ $title->ar_title }}
                            @else
                            {{ $title->title }}
                        @endif
        </a>
 <!--       <a href="{{url('/recruitment-page')}}" class="text-decoration-none text-white text-nowrap text-capitalize">
            {{ __('welcome.التوظيف والتدريب') }}
        </a>  -->
        <a href="{{ url('/contact-us') }}" class="text-decoration-none text-white text-capitalize">
            {{ __('welcome.اتصل بنا') }}
        </a>

    </div>
</div>
