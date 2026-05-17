@php
    $callus = callus();
@endphp
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico') }}?v=2">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    @if(App::isLocale('ar'))
    <link rel="stylesheet" type="text/css" href="css/style-ltr.css">
    @else
    <link rel="stylesheet" type="text/css" href="css/style-rtl.css">
    @endif
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <script src="https://kit.fontawesome.com/00b231478f.js" crossorigin="anonymous"></script>
    <link
  href="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.css"
  rel="stylesheet"
/>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
    <style>
        #map {
            width: 100%;
            height: 400px; /* Adjust the height as needed */
          }
    </style>
</head>

<body>
    <header>
       @include('include.nav')
         <!-- mobile menu start -->
        @include('include.mobile')
        <!-- mobile menu end -->
    </header>
    <main>

        <section class="bg-header m--100 p-5">
            <div class="container mb-3">
                <div class="">
        <h3 class="about-heading text-capitalize ">{{ __('welcome.اتصل بنا') }}<h3>
                </div>
                <div class="mt-5">
                    <h3 class="fw-bold ">{{ __('welcome.المملكة العربية السعودية -الرياض') }}</h3>
                    <p class="fs-14 mt-2">{{ __('welcome.لخدمة افضل وسرعة استجابة استخدم محادثة الواتس اب وفق اوقات العمل الرسمي لدينا') }}</p>
                </div>
                <div class="row g-5 mt-5 justify-content-center">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="border shadow text-center p-5 bg-white text-capitalize">
                            <h3>{{ __('welcome.الاتصال') }}</h3>
                            <a href=""
                                class="fs-5 fw-bold mb-2 text-muted text-center">{{ $callus->phone }}</a>
                        </div>

                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="border shadow text-center p-5 bg-white text-capitalize">
                  <h3>{{ __('welcome.المراسلة') }}</h3>
                            <p class="fs-5  fw-bold mb-2 text-muted text-center">{{ $callus->email }}</p>
                        </div>

                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="border shadow text-center p-5 bg-white text-capitalize">
        <h3>{{ __('welcome.أيام العمل') }}</h3>
                            @if(App::isLocale('ar'))
                            <p href="" class="fs-5 fw-bold mb-2 text-muted text-center">{{ $callus->workDays }} </p>
                            @else
                            <p href="" class="fs-5 fw-bold mb-2 text-muted text-center">{{ $callus->en_workDays }} </p>
                            @endif
                        </div>

                    </div>
                   <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                        <div class="border shadow text-center p-5 bg-white text-capitalize">
        <h3>{{ __('welcome.ساعات الدوام') }}</h3>
                            @if(App::isLocale('ar'))
                            <p href="" class="fs-5 fw-bold mb-2 text-muted text-center">{{ $callus->workHours }}</p>
                            @else
                            <p href="" class="fs-5 fw-bold mb-2 text-muted text-center">{{ $callus->en_workHours }} </p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row my-5">
                    <div class="col-lg-12">
                        <div id="map"></div>
                        {{--  <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14903546.801014509!2d45.0741!3d24.222141999999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15e7b33fe7952a41%3A0x5960504bc21ab69b!2sSaudi%20Arabia!5e0!3m2!1sen!2s!4v1702615543858!5m2!1sen!2s"
                            width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>  --}}
                    </div>
                </div>
            </div>
        </section>

    </main>

   @include('include.footer')

    <!-- js area start -->
    <script type="text/javascript" src="js/jquery-3.6.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="js/owl.carousel.min.js">
    </script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.0.1/mapbox-gl.js"></script>
    <script type="text/javascript" src="js/myScript.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        $(document).ready(function () {
            $('#dropdownMenu').click(function () {
                $('.down-caret').toggleClass('open-caret');;
            });
        });
        $(document).ready(function () {
            $('#dropdownMenuone').click(function () {
                $('.down-caretone').toggleClass('open-caret');;
            });
        });
        $(document).ready(function () {
            $('#dropdownMenutwo').click(function () {
                $('.down-carettwo').toggleClass('open-caret');;
            });
        });
    </script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
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
        $('.counter-count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {

                //chnage count up speed here
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>
    <script>
        mapboxgl.accessToken = '{{ env("MAPBOX_TOKEN") }}';

        // Enable Arabic (RTL) text support on the map
        mapboxgl.setRTLTextPlugin(
            'https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
            null,
            true
        );

        var meccaCoordinates = [{{ $callus->long }},{{ $callus->lat }}]; // Coordinates for Mecca (Makkah), Saudi Arabia
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: meccaCoordinates,
            zoom: 12,
            dragPan: false, // Disable panning
        });
        // Add zoom controls
        map.addControl(new mapboxgl.NavigationControl());
        var marker = new mapboxgl.Marker().setLngLat(meccaCoordinates).addTo(map);
        // Set the input field with the coordinates
        document.getElementById('inputLocation').value = `${meccaCoordinates[1]}, ${meccaCoordinates[0]}`;
        // Reverse geocode to get the place name for the coordinates
        reverseGeocode(meccaCoordinates);
        function reverseGeocode(coordinates) {
            var apiUrl = `https://api.mapbox.com/geocoding/v5/mapbox.places/${coordinates[1]},${coordinates[0]}.json?access_token=${mapboxgl.accessToken}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    var placeName = data.features[0].place_name;
                    document.getElementById('placeName').innerText = `Selected Place: ${placeName}`;
                    $('#locationShow').val(placeName);
                })
                .catch(error => {
                    console.error('Error fetching reverse geocoding data:', error);
                });
        }
    </script>

</body>

</html>
