<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restoran</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/logo/logo-hitam.png') }}" />
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- Bootstrap Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    {{-- SWIPER CSS --}}
    <link rel="stylesheet" href="{{ asset('css/swiper/swiper-bundle.min.css') }}">
    {{-- MY STYLE --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top transparant">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo/restoran-putih.png') }}" width="150" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" aria-current="page" href="/home">Dashboard</a>
                        @else
                            <a class="nav-link" aria-current="page" href="/login">Login</a>
                        @endauth
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- END NAVBAR --}}

    {{-- MAIN --}}
    <main class="main">
        <section class="home">
            <div class="homeSwiper swiper position-relative">
                <div class="swiper-wrapper">
                    @foreach ($pegawais as $pegawai)
                        <article class="homeArticle swiper-slide">
                            <div class="homeData container">
                                <h3 class="homeSubtitle" data-swiper-parallax="500">Our Employees</h3>
                                <div class="wadahHomeTitle">
                                    <h1 class="homeTitle text-capitalize" data-swiper-parallax="400">
                                        {{ $pegawai->nama_pegawai }}</h1>
                                </div>
                            </div>
                            <img src="{{ asset('storage/' . $pegawai->foto) }}" class="homeIMG" alt=""
                                data-swiper-parallax="-300">
                            <div class="homeShadow"></div>
                        </article>
                    @endforeach
                </div>
            </div>
            <div class="homeContent">
                <div class="homeSocial">
                    <a href="https://www.twitter.com" target="blank" class="homeSocialLink">
                        <i class="bi bi-twitter-x"></i>
                    </a>
                    <a href="https://www.instagram.com" target="blank" class="homeSocialLink">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://www.tiktok.com" target="blank" class="homeSocialLink">
                        <i class="bi bi-tiktok"></i>
                    </a>
                </div>

                <!-- Pagination -->
                <div class="swiper-pagination"></div>

                {{-- Navigation Button --}}
                <div class="swiper-navigation">
                    <div class="swiper-button-prev">
                        <i class="bi bi-arrow-left-circle"></i>
                    </div>
                    <div class="swiper-button-next">
                        <i class="bi bi-arrow-right-circle"></i>
                    </div>
                </div>

            </div>
        </section>
    </main>
    {{-- END MAIN --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- SWIPER JS --}}
    <script src="{{ asset('js/libs/swiperjs/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
