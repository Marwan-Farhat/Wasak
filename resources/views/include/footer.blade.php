@php
    $socail = getSocails();
    $callus = callus();
    $status = status();
    $aboutCompany = aboutCompany();
    $title = title();

@endphp
<!-- ----Footer-start-from-here------ -->
    <footer class="text-white" style="background-color:#0a1c3a">
        <div class="container">
            <div class="row gy-5 py-5 justify-content-between ">
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
               <div class="d-flex justify-content-center align-items-center">
    <img src="{{ url('img/footer.png') }}" style="width: 250px; height: 200px; object-fit: cover;" class="img-fluid sizelogo">
</div>

                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-2">
                    <div class>
                        <h2 class="text-dark-clr mb-3 text-capitalize">{{ __('welcome.روابط هامة') }}</h2>
                        <ul class="list-unstyled footerList">
                            <li>
                                <p class="fs-5">
                                    <a href="{{ url('/') }}"
                                        class="text-decoration-none text-capitalize">{{ __('welcome.الرئيسية') }}
                                    </a>
                                </p>
                            </li>
                            <li>
                                <p class="fs-5">
                                    <a href="{{ url('/about-us') }}"
                                        class="text-decoration-none text-capitalize "> {{__('welcome.عن الشركة')}}
                                    </a>
                                </p>
                            </li>
                            <li>
                                <p class="fs-5">
                                    <a href="{{ url('/our-services') }}" class="text-decoration-none  text-capitalize">
                                    {{ __('welcome.الخدمات') }}
                                    </a>
                                </p>
                            </li>
                            <li>
                                <p class="fs-5">
                                    <a href="{{ url('/blog-home') }}"
                                        class="text-decoration-none  text-capitalize ">  {{ __('welcome.المدونة') }}
                                    </a>
                                </p>
                            </li>

                            <li>
                                <p class="fs-5">
                                    <a href="{{ url('/service-req') }}" class="text-decoration-none  text-capitalize no-hover">
                                        @if(App::isLocale('ar'))
                                        {{ $title->ar_title }}
                                            @else
                                            {{ $title->title }}
                                        @endif
                                    </a>
                                </p>
                            </li>
                    <!--        <li>
                                <p class="fs-5">
                                    <a href="{{url('/recruitment-page')}}"
                                        class="text-decoration-none  text-capitalize "> {{ __('welcome.التوظيف والتدريب') }}
                                    </a>
                                </p>
                            </li>  -->
                            <li>
                                <p class="fs-5"><a href="{{ url('/contact-us') }}"
                                    class="text-decoration-none  text-capitalize "> {{ __('welcome.اتصل بنا') }}</a>
                            </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-2">
                    <div class>
                        <h2 class="text-dark-clr mb-3 text-capitalize"></h2>
                        <ul class="list-unstyled footerList">
                            <li>
                            @if($status->partner == 1)
                                <p class="fs-5"><a href="{{ url('/our-partner') }}"
                                    class="text-decoration-none text-capitalize ">{{ __('welcome.شركاء النجاح') }}</a>
                            </p>
                            @endif
                            </li>
                           <li>
                                 @if($status->ourTeam == 1)
                               <p class="fs-5">
                                    <a href="{{ url('/our-team') }}"
                                    class="text-decoration-none text-capitalize ">
                                    {{ __('welcome.الفريق') }}
                                </a>
                                </p>
                                  @endif
                            </li>
                            <li>
                               @if($status->achievement == 1)
                                <p class="fs-5">
                                    <a href="{{ url('/our-quality') }}"
                                    class="text-decoration-none text-capitalize ">
                                    {{ __('welcome.الجودة') }}
                                </a>
                                </p>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-2">
                    <div class>
                        <h2 class="text-dark-clr mb-3 text-capitalize">{{ __('welcome.تواصل معنا') }}</h2>
                        <address class="fs-14">
                            <ul class="list-unstyled footerList">
                                <li>
                                    <p class="mb-2">{{ __('welcome.الهاتف') }}: {{ $callus->phone }}</p>
                                </li>
                                <li>
                                    <p class="mb-0">
                                        <span>{{ __('welcome.بريد إلكتروني') }}:</span>
                                        <a  href="mailto:{{ $callus->email }}" class="text-decoration-none text-white d-flex"> {{ $callus->email }}</a>
                                    </p>
                                </li>
                            </ul>
                        </address>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-2">
                    <div class>
                        <h2 class="text-dark-clr mb-3 text-capitalize">{{ __('welcome.تابعنا على') }}</h2>
                        <div class="social-footer mt-4">
                            <ul class="list-unstyled d-flex flex-wrap gap-3 m-0 p-0">
                                @if($socail->twitter)
                                <li>
                                    <a href="{{ $socail->twitter }}" class="text-decoration-none" style="background-color:#0a1c3a; color:#fff; display:flex; align-items:center; justify-content:center; width:30px; height:30px;" target="_blank">
                                        <i class="fa-brands fa-x-twitter" style="font-size:18px;"></i>
                                    </a>
                                </li>
                                @endif
                                @if($socail->facebook)
                                <li>
                                    <a href="{{ $socail->facebook }}" class="text-decoration-none" style="background-color:#0a1c3a; color:#fff; display:flex; align-items:center; justify-content:center; width:30px; height:30px;" target="_blank">
                                        <ion-icon name="logo-linkedin" style="font-size:18px;"></ion-icon>
                                    </a>
                                </li>
                                @endif
                                @if($socail->linkedIn)
                                <li>
                                    <a href="{{ $socail->linkedIn }}" class="text-decoration-none" style="background-color:#0a1c3a; color:#fff; display:flex; align-items:center; justify-content:center; width:30px; height:30px;" target="_blank">
                                        <ion-icon name="logo-youtube" style="font-size:18px;"></ion-icon>
                                    </a>
                                </li>
                                @endif
                                @if($socail->instagram)
                                <li>
                                    <a href="{{ $socail->instagram }}" class="text-decoration-none" style="background-color:#0a1c3a; color:#fff; display:flex; align-items:center; justify-content:center; width:30px; height:30px;" target="_blank">
                                        <ion-icon name="logo-instagram" style="font-size:18px;"></ion-icon>
                                    </a>
                                </li>
                                @endif
                                @if($socail->whatsapp)
                                <li>
                                    <a href="{{ $socail->whatsapp }}" class="text-decoration-none" style="background-color:#0a1c3a; color:#fff; display:flex; align-items:center; justify-content:center; width:30px; height:30px;" target="_blank">
                                        <i class="fa-brands fa-facebook" style="font-size:18px;"></i>
                                    </a>
                                </li>
                                @endif
                                @if($socail->whatsapp_url)
                                <li>
                                    <a href="{{ $socail->whatsapp_url }}" class="text-decoration-none" style="background-color:#0a1c3a; color:#fff; display:flex; align-items:center; justify-content:center; width:30px; height:30px;" target="_blank">
                                        <i class="fa-brands fa-whatsapp" style="font-size:18px;"></i>
                                    </a>
                                </li>
                                @endif
                                @if($socail->tiktok)
                                <li>
                                    <a href="{{ $socail->tiktok }}" class="text-decoration-none" style="background-color:#0a1c3a; color:#fff; display:flex; align-items:center; justify-content:center; width:30px; height:30px;" target="_blank">
                                        <i class="fa-brands fa-tiktok" style="font-size:18px;"></i>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7"></div>
          <!--      <div class="col-md-4" style="margin-top: -8%">
                   <div id="map2" style="height:200px; width:100%;"></div>
                </div>  -->
                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                    <hr>
                    <div class="col-lg-12">
                        <div class="text-center">
                            <ul class="list-unstyled footerList">
                                <li>
                                    <p class="mb-0 fs-4 text-dark-clr" >
                                        © 2026 | <a href="#"
                                            class="text-decoration-none text-white" >
                                            {{ __('welcome.شركة عكس لتقنية المعلومات. كل الحقوق محفوظة') }}
                                        </a>
                                    </p>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ----Footer-end-from-here------ -->
    <div class="live-chat" >
        <a href="https://wa.me/+{{ $aboutCompany->whatsappNumber }}" target="_blank" >
        <div class="position-fixed  chat " >
            <img src="{{ url('./images/whatsapp.png') }}"style="background-color: #0a1c3a" alt class="rounded-circle">
        </div>
        </a>
    </div>
    <!-- Include Mapbox JS -->
<!-- Mapbox GL JS -->
<script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
<!-- Mapbox GL CSS -->
<link href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css" rel="stylesheet" />
<script>
    mapboxgl.accessToken = '{{ env("MAPBOX_TOKEN") }}';

    // Ensure coordinates are in [longitude, latitude] format
    var meccaCoordinates = [{{ $callus->long }}, {{ $callus->lat }}];

    var map = new mapboxgl.Map({
        container: 'map2',
        style: 'mapbox://styles/mapbox/streets-v11',
        center: meccaCoordinates,
        zoom: 10,
        dragPan: false // Disable panning
    });

    // Add zoom controls
    map.addControl(new mapboxgl.NavigationControl());

    // Add a marker to the map
    new mapboxgl.Marker()
        .setLngLat(meccaCoordinates)
        .addTo(map);

    // Reverse geocode to get the place name for the coordinates
    reverseGeocode(meccaCoordinates);

    function reverseGeocode(coordinates) {
        var apiUrl = `https://api.mapbox.com/geocoding/v5/mapbox.places/${coordinates[1]},${coordinates[0]}.json?access_token=${mapboxgl.accessToken}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                var placeName = data.features[0].place_name;
                document.getElementById('placeName').innerText = `Selected Place: ${placeName}`;
                document.getElementById('locationShow').value = placeName;
            })
            .catch(error => {
                console.error('Error fetching reverse geocoding data:', error);
            });
    }
</script>

