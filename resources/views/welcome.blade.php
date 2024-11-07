<!DOCTYPE html>

<head>
    <link href="./style.css" rel="stylesheet">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Sans+Arabic:wght@200;300;400;500;600;700;800;900&family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" rel="stylesheet" />
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">

    <link href="https://unpkg.com/leaflet/dist/leaflet.css" rel="stylesheet" />

    <style>
        /* Atur ukuran peta agar terlihat */
        #map {
            height: 100vh;
            width: 100%;
            margin-bottom: 30px
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-container">
            <span class="menu-btn" onclick="menu()"><i class='bx bx-menu'></i></span>
            <img src="{{ asset('landing/images/logo.png') }}" style="height: 100px;width: 100px" />
        </div>
        <nav>
            <ul>
                <li><a href="#home">BERANDA</a></li>
                <li><a href="#about">TENTANG</a></li>
                <li><a href="#features">FITUR</a></li>
                <li><a href="#products">PRODUK</a></li>
                <li><a href="#service">LAYANAN</a></li>
                <li><a href="#testimonial">TESTIMONI</a></li>
                <li><a href="#contact">HUBUNGI KAMI</a></li>
            </ul>
        </nav>
        <div class="side-menu close" id="side-menu">
            <ul>
                <li><a href="#home">BERANDA</a></li>
                <li><a href="#about">TENTANG</a></li>
                <li><a href="#features">FITUR</a></li>
                <li><a href="#products">PRODUK</a></li>
                <li><a href="#service">LAYANAN</a></li>
                <li><a href="#testimonial">TESTIMONI</a></li>
                <li><a href="#contact">HUBUNGI KAMI</a></li>
            </ul>
        </div>

        @if (Route::has('login'))
            <nav class="login-btn">
                <ul>
                    @auth
                        <a class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                    @else
                        @if (Route::has('register'))
                            <a class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                href="{{ route('register') }}">
                                Register
                            </a>
                        @endif
                    @endauth
                </ul>

            </nav>
        @endif

    </header>
    <main id="home">
        <div class="my-slider">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img class="bg-img" src="{{ asset('landing/images/bg.jpg') }}" />

                        <div class="slide-info">
                            <span>Selamat Datang di Website Resmi BONEVA </span>
                            <h1>Air Minum Lokal</h1>
                            <h2>Dari Gorontalo </h2>
                            <p>Boneva Telah berdiri sejak 2014, dan menjadi salah satu pilihan Air minum berkualitas di
                                Gorontalo.</p>
                            <button>Pelajari Selengkapnya</button>

                        </div>
                    </div>
                    <div class="swiper-slide"><img class="bg-img" src="{{ asset('landing/images/bg.jpg') }}" />
                        <div class="slide-info">
                            <span>Selamat Datang di Website Resmi BONEVA </span>
                            <h1>Air Minum Lokal</h1>
                            <h2>Dari Gorontalo </h2>
                            <p>Boneva Telah berdiri sejak 2014, dan menjadi salah satu pilihan Air minum berkualitas di
                                Gorontalo.</p>
                            <button>Pelajari Selengkapnya</button>

                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="sectionWave">
            <svg x="0px" y="0px" viewBox="0 0 1920 45" width="1920" height="45px" preserveAspectRatio="none">
                <style type="text/css"></style>
                <path
                    d="M1920,0c-82.8,0-108.8,44.4-192,44.4c-78.8,0-116.5-43.7-192-43.7c-77.1,0-115.9,44.4-192,44.4c-78.2,0-114.6-44.4-192-44.4c-78.4,0-115.3,44.4-192,44.4C883.1,45,841,0.6,768,0.6C691,0.6,652.8,45,576,45C502.4,45,461.9,0.6,385,0.6C306.5,0.6,267.9,45,191,45C115.1,45,78,0.6,0,0.6V45h1920V0z">
                </path>
            </svg>
        </div>
    </main>
    <section class="description" id="about">
        <div class="flex-conatiner">
            <div class="col-7">
                <img src="{{ asset('landing/images/index-01') }}.png" />
            </div>
            <div class="col-5">
                <h3>
                    "Kesegaran Murni, Dihadirkan oleh Alam"
                </h3>
                <p>
                    Sumber air kami terletak hanya beberapa langkah dari pabrik kami, memastikan setiap tetes air yang
                    kami kemas selalu dalam kondisi terbaik. Proses pengolahan yang kami terapkan memelihara kealamian
                    air, sehingga setiap botol Boneva yang Anda nikmati adalah representasi sejati dari kebersihan dan
                    kesegaran alam.
                </p>
                <button>Pelajari Selengkapnya</button>
            </div>
        </div>
    </section>
    <section class="attributes" id="features">
        <div class="attribute">
            <i class='bx bxs-shield'></i>
            <div>
                <h4>Perlindungan dari Bakteri</h4>
                <p>Meskipun air mata air secara alami bersih, kami berusaha sebaik mungkin untuk memastikan bahwa air
                    kami bebas dari bakteri di semua tahap produksi.</p>
            </div>


        </div>
        <div class="attribute">
            <i class='bx bxs-leaf'></i>
            <div>
                <h4>Rasa Segar yang Alami</h4>
                <p>Sumber air kami berasal dari pegunungan yang bersih, memberikan rasa segar dan alami yang tak
                    tertandingi. Setiap tegukan membawa kesegaran dari alam langsung ke Anda.</p>
            </div>

        </div>
        <div class="attribute">
            <i class='bx bxs-droplet'></i>
            <div>
                <h4>Saluran Pengemasan Otomatis</h4>
                <p>Proses pengemasan air mata air di pabrik kami sepenuhnya otomatis. Namun, kami selalu mengawasinya
                    untuk memastikan kualitas yang tinggi.</p>
            </div>
        </div>
    </section>
    <section class="landscape" style="background: url({{ asset('landing/images/background.jpg') }})">
        <div>
            <h3>
                Dari Mata Air Alami di Gorontalo ke Rumah dan Kantor Anda
            </h3>
            <p>
                Selama lebih dari 12 tahun, kami telah menyediakan air yang berkualitas langsung ke rumah dan kantor
                Anda yang ada di gorontalo, menjamin kesegaran dan kemurnian setiap tetesnya.
            </p>
            <button class="glass-btn">BACA SELENGKAPNYA</button>
        </div>

    </section>
    <section class="products" id="products">
        <h4>Produk Kami </h4>
        <div class="product-container">
            <div class="product">
                <div class="product-img">
                    <span class="big-bubble"></span>
                    <span class="small-bubble"></span>
                    <img src="{{ asset('landing/images/galon') }}.png"
                        style="width: 150px !important; height: auto !important;" />
                </div>
                <div class="product-info">
                    <h5>AIR MINERAL BONEVA - Galon 19 L</h5>
                    <h6>Rp 38.500,00</h6>
                    <span><i class='bx bx-info-circle'></i> UNTUK KEGUNAAN SEHARI-HARI</span>
                    <p>
                        Air ini sangat cocok untuk kebutuhan sehari-hari, baik untuk diminum dalam segala cuaca maupun
                        untuk dibagikan kepada keluarga. Dengan harga yang terjangkau, Boneva selalu menjadi pilihan
                        tepat bagi semua kalangan.
                    </p>
                </div>
            </div>
            <div class="product">
                <div class="product-img">
                    <span class="big-bubble"></span>
                    <span class="small-bubble"></span>

                    <img src="{{ asset('landing/images/gelas') }}.png"
                        style="width: 190px !important; height: auto !important;" />
                </div>
                <div class="product-info">
                    <h5>AIR MINERAL BONEVA - Cup 220 Ml</h5>
                    <h6>Rp 1.000,00</h6>
                    <span><i class='bx bx-info-circle'></i> UNTUK KEGUNAAN SEHARI-HARI</span>
                    <p>
                        Air ini sangat cocok untuk kebutuhan sehari-hari, baik untuk diminum dalam segala cuaca maupun
                        untuk dibagikan kepada keluarga. Dengan harga yang terjangkau, Boneva selalu menjadi pilihan
                        tepat bagi semua kalangan.
                    </p>
                </div>
            </div>
        </div>
        <div class="product-container">
            <div class="product">
                <div class="product-img">
                    <span class="big-bubble"></span>
                    <span class="small-bubble"></span>
                    <img src="{{ asset('landing/images/botol') }}.png"
                        style="width: 93px !important; height: auto !important;" />
                </div>
                <div class="product-info">
                    <h5>AIR MINERAL BONEVA - Botol 600 Ml</h5>
                    <h6>Rp 3.000,00</h6>
                    <span><i class='bx bx-info-circle'></i> UNTUK KEGUNAAN SEHARI-HARI</span>
                    <p>
                        Air ini sangat cocok untuk kebutuhan sehari-hari, baik untuk diminum dalam segala cuaca maupun
                        untuk dibagikan kepada keluarga. Dengan harga yang terjangkau, Boneva selalu menjadi pilihan
                        tepat bagi semua kalangan.
                    </p>
                </div>
            </div>
            <div class="product">
                <div class="product-img">
                    <span class="big-bubble"></span>
                    <span class="small-bubble"></span>

                    <img src="{{ asset('landing/images/product-1') }}.png" />
                </div>
                <div class="product-info">
                    <h5>AIR MINERAL BONEVA - Botol 1.500 Ml</h5>
                    <h6>Rp 7.800,00</h6>
                    <span><i class='bx bx-info-circle'></i> UNTUK KEGUNAAN SEHARI-HARI</span>
                    <p>
                        Air ini sangat cocok untuk kebutuhan sehari-hari, baik untuk diminum dalam segala cuaca maupun
                        untuk dibagikan kepada keluarga. Dengan harga yang terjangkau, Boneva selalu menjadi pilihan
                        tepat bagi semua kalangan.
                    </p>
                </div>
            </div>
        </div>
        <button class="produtcs-btn">LIHAT LEBIH LANJUT</button>
    </section>
    <section class="customer-service" id="service">
        <h3>Kami Berusaha Menyediakan
            <br /> Pelayanan Terbaik untuk Pelanggan
        </h3>

        <div class="services">
            <div class="service">
                <i class='bx bx-mobile-alt'></i>
                <div>
                    <h4>Perlindungan dari Bakteri</h4>
                    <p>Meskipun air mata air secara alami bersih, kami berusaha sebaik mungkin untuk memastikan bahwa
                        air kami bebas dari bakteri di semua tahap produksi.</p>
                </div>

            </div>
            <div class="service">
                <i class='bx bx-package'></i>
                <div>
                    <h4>Rasa Segar yang Alami</h4>
                    <p>Sumber air kami berasal dari pegunungan yang bersih, memberikan rasa segar dan alami yang tak
                        tertandingi. Setiap tegukan membawa kesegaran dari alam langsung ke Anda.</p>
                </div>

            </div>
            <div class="service">
                <i class='bx bx-heart'></i>
                <div>
                    <h4>Saluran Pengemasan Otomatis</h4>
                    <p>Proses pengemasan air mata air di pabrik kami sepenuhnya otomatis. Namun, kami selalu
                        mengawasinya untuk memastikan kualitas yang tinggi.</p>

                </div>
            </div>
        </div>

    </section>
    <section class="testimonials" id="testimonial">
        <h3>Testimoni </h3>


        <div class="testimonial-container">
            <div class="swiper">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <div class="swiper-slide">
                        <div class="testimonial">
                            <i class='bx bxs-quote-left'></i>
                            <p>
                                Saya sangat bersyukur atas pengiriman air ini ke rumah kami! Kami kembali mendapatkan
                                energi setelah waktu yang singkat dan merasa segar kembali! Saya terutama menyukai air
                                mineral berkarbonasi.
                            </p>

                            <div class="user">
                                <img src="{{ asset('landing/images/testimonials-person') }}-1.jpg" />
                                <div class="user-info">
                                    <span class="user-name">Harold Barnett</span>
                                    <span class="user-type">Regular Client</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial">
                            <i class='bx bxs-quote-left'></i>
                            <p>
                                Saya telah mencari di berbagai tempat di Kabupaten Gorontalo untuk menemukan air paling
                                murni, dan BONEVA tanpa ragu adalah air yang paling bersih, segar, dan menyehatkan yang
                                tersedia, serta harganya juga terjangkau.
                            </p>

                            <div class="user">
                                <img src="{{ asset('landing/images/testimonials-person') }}-2.jpg" />
                                <div class="user-info">
                                    <span class="user-name">Harold Barnett</span>
                                    <span class="user-type">Regular Client</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial">
                            <i class='bx bxs-quote-left'></i>
                            <p>
                                Saya telah mencari di berbagai tempat di Kabupaten Gorontalo untuk menemukan air paling
                                murni, dan BONEVA tanpa ragu adalah air yang paling bersih, segar, dan menyehatkan yang
                                tersedia, serta harganya juga terjangkau.
                            </p>

                            <div class="user">
                                <img src="{{ asset('landing/images/testimonials-person') }}-2.jpg" />
                                <div class="user-info">
                                    <span class="user-name">Harold Barnett</span>
                                    <span class="user-type">Regular Client</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial">
                            <i class='bx bxs-quote-left'></i>
                            <p>
                                Saya telah mencari ke berbagai tempat di Kabupaten Gorontalo untuk menemukan air yang
                                paling murni, dan tanpa diragukan lagi, BONEVA adalah air yang paling bersih, segar, dan
                                menyehatkan yang tersedia, serta harganya juga sangat terjangkau.
                            </p>

                            <div class="user">
                                <img src="{{ asset('landing/images/testimonials-person') }}-2.jpg" />
                                <div class="user-info">
                                    <span class="user-name">Harold Barnett</span>
                                    <span class="user-type">Regular Client</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <section class="contact" id="contact">
        <div class="contact-from">
            <h3>Hubungi Kami
            </h3>
            <div class="inputs">
                <div>
                    <label>Nama Depan</label>
                    <input />
                </div>
                <div style="margin-left: 3rem;">
                    <label>Nama Belakang</label>
                    <input />
                </div>
            </div>
            <div class="inputs">
                <div>
                    <label>Email</label>
                    <input />
                </div>
                <div style="margin-left: 3rem;">
                    <label>No. Telepon</label>
                    <input />
                </div>
            </div>
            <div style="margin-top: 1rem;">
                <label>Pesan Anda</label>
                <textarea></textarea>
            </div>
            <div>
                <button>KIRIM PESAN</button>
                <span>atau gunakan</span>
                <button class="outline-button">
                    <i class='bx bxl-messenger'></i>
                    MESSENGER</button>
            </div>

        </div>
        <img src="{{ asset('landing/images/contact.png') }}" />
    </section>
    <section class="testimonials" id="testimonial">
        <h3>Sebaran Produk </h3>
        <div id="map"></div>
    </section>
    <section class="footer">
        <div class="sectionWave footer-wave">
            <svg x="0px" y="0px" viewBox="0 0 1920 45" width="1920" height="45px" preserveAspectRatio="none">
                <path
                    d="M1920,0c-82.8,0-108.8,44.4-192,44.4c-78.8,0-116.5-43.7-192-43.7c-77.1,0-115.9,44.4-192,44.4c-78.2,0-114.6-44.4-192-44.4c-78.4,0-115.3,44.4-192,44.4C883.1,45,841,0.6,768,0.6C691,0.6,652.8,45,576,45C502.4,45,461.9,0.6,385,0.6C306.5,0.6,267.9,45,191,45C115.1,45,78,0.6,0,0.6V45h1920V0z">
                </path>
            </svg>
        </div>
        <div class="footer-inner">
            <div class="footer-column about">
                <h5>Tentang Kami</h5>
                <p>BONEVA merupakan salah satu penyedia air minum terbaik di Gorontalo. Kami memproduksi dan mengirimkan
                    air bersih yang bebas bakteri di seluruh wilayah, memenuhi semua kebutuhan dan selera pelanggan.
                    Kami bangga menjadi pilihan utama dalam penyediaan air bersih di Gorontalo!
                </p>
            </div>
            <div class="footer-column">
                <h5>Informasi Kontak </h5>
                <div><i class='bx bxs-location-plus'></i> <span>Jl. Nani Wartabone No. 25 <br />
                        Gorontalo, Indonesia</span> </div>
                <div><i class='bx bxs-phone-call'></i><span>+62-811-1234-567</span> </div>
                <div><i class='bx bxs-envelope'></i> <span>info@boneva.id</span> </div>
            </div>
            <div class="footer-column">
                <h5>Newsletter </h5>
                <p>Daftarkan diri Anda untuk newsletter kami dan jadilah yang pertama tahu tentang berita terbaru,
                    penawaran spesial, acara, dan diskon.
                </p>
                <div>
                    <input class="news-input" placeholder="Email Anda" />
                    <a class="send-btn"><i class='bx bx-envelope'></i></a>
                </div>
            </div>
        </div>
    </section>

    @php

    @endphp
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const customIconSVG = L.icon({
            iconUrl: 'data:image/svg+xml;base64,' + btoa(`
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="blue" class="size-6">
  <path d="M19.006 3.705a.75.75 0 1 0-.512-1.41L6 6.838V3a.75.75 0 0 0-.75-.75h-1.5A.75.75 0 0 0 3 3v4.93l-1.006.365a.75.75 0 0 0 .512 1.41l16.5-6Z" />
  <path fill-rule="evenodd" d="M3.019 11.114 18 5.667v3.421l4.006 1.457a.75.75 0 1 1-.512 1.41l-.494-.18v8.475h.75a.75.75 0 0 1 0 1.5H2.25a.75.75 0 0 1 0-1.5H3v-9.129l.019-.007ZM18 20.25v-9.566l1.5.546v9.02H18Zm-9-6a.75.75 0 0 0-.75.75v4.5c0 .414.336.75.75.75h3a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75H9Z" clip-rule="evenodd" />
</svg>

        `),
            iconSize: [32, 32], // Menyesuaikan ukuran ikon
            iconAnchor: [16, 32], // Titik jangkar di bagian bawah
            popupAnchor: [0, -32] // Posisi popup di atas marker
        });
        // Menambahkan marker untuk kota-kota di Provinsi Gorontalo
        const cities = L.layerGroup();

        @if ($outlets)
            @foreach ($outlets as $outlet)
                const {{ str_replace(' ', '', $outlet->outlet_name) }} = L.marker([{{ $outlet->latitude }},
                    {{ $outlet->langtitude }}
                ], {
                    icon: customIconSVG
                }).bindPopup(
                    'Nama : {{ $outlet->outlet_name }} <br> Tentang : {{ $outlet->desc }} <br> Pemilik : {{ $outlet->owner_name }}'
                ).addTo(cities);
            @endforeach
        @endif


        const satelliteLayer = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.esri.com/">Esri</a> | Data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });
        // Menambahkan layer peta OpenStreetMap
        const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        // Menambahkan layer peta dari Humanitarian OpenStreetMap Team
        const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
        });

        // Menambahkan layer peta Stamen (Street View)
        const stamenToner = L.tileLayer('https://{s}.tile.stamen.com/toner/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://stamen.com">Stamen Design</a> | Map data: <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19
        });

        const stamenTerrain = L.tileLayer('https://{s}.tile.stamen.com/terrain/{z}/{x}/{y}.jpg', {
            attribution: '&copy; <a href="https://stamen.com">Stamen Design</a> | Map data: <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            maxZoom: 19
        });

        // Inisialisasi peta dengan pusat di Gorontalo
        const map = L.map('map', {
            center: [0.8055527292865906, 122.61548603646959], // Koordinat Kota Gorontalo
            zoom: 10,
            layers: [osm, cities] // Gunakan layer OpenStreetMap dan cities di awal
        });

        // Definisi base layers
        const baseLayers = {
            'OpenStreetMap': osm,
            'OpenStreetMap.HOT': osmHOT,
            'Stamen Toner': stamenToner,
            'Stamen Terrain': stamenTerrain,
            'Satelit': satelliteLayer
        };

        // Definisi overlay layers
        const overlays = {
            'Cities': cities
        };

        // Menambahkan kontrol layer
        const layerControl = L.control.layers(baseLayers, overlays).addTo(map);


        // Menambahkan layer group untuk taman
        const parks = L.layerGroup([taman1, taman2]);

        // Menambahkan layer OpenTopoMap
        const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
        });

        // Menambahkan layer control
        layerControl.addBaseLayer(openTopoMap, 'OpenTopoMap');
        layerControl.addOverlay(parks, 'Parks');
    </script>





    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="{{ asset('landing/js/script.js') }}"></script>
    <script>
        ScrollReveal().reveal("body > section", {
            distance: '101%',
            duration: 1200,
            origin: 'top',
            delay: 500
        });
    </script>

</body>

</html>
