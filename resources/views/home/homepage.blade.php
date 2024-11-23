@extends('home.home-layout')
@section('content')
    <div class="">
        <section class="main-slider style1 nav-style2">
            <div class="slider-box">
                <!-- Banner Carousel -->
                <div class="banner-carousel owl-theme owl-carousel">

                    <!-- Slide -->
                    <div class="slide">
                        <div class="image-layer" style="background-image:url({{ asset('assets/images/slider/jahit.webp') }})">
                        </div>
                        <div class="auto-container">
                            <div class="content">
                                <div class="big-title">
                                    <h2>Selamat Datang<br>di Martaloka Konveksi</h2>
                                </div>
                                <div class="text">
                                    <p>Konveksi kami menawarkan solusi pembuatan berbagai pakaian</p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one" href="{{ route('home.createDesign') }}">
                                        <span class="txt">
                                            Pesan
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="slide">
                        <div class="image-layer"
                            style="background-image:url({{ asset('assets/images/slider/deret.jfif') }})">
                        </div>
                        <div class="auto-container">
                            <div class="content middle text-center">
                                <div class="big-title">
                                    <h2>Kualitas Tak Tertandingi Harga Terjangkau</h2>
                                </div>
                                <div class="text">
                                    <p>Mewujudkan Inspirasi Mode Anda Dengan Sentuhan Konveksi Profesional</p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one" href="{{ route('home.createDesign') }}">
                                        <span class="txt">
                                            Pesan
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="slide">
                        <div class="image-layer"
                            style="background-image:url({{ asset('assets/images/slider/sablon.png') }})">
                        </div>
                        <div class="auto-container">
                            <div class="content">
                                <div class="big-title">
                                    <h2>Gaya Anda<br>Karya Kami</h2>
                                </div>
                                <div class="text">
                                    <p>Tingkatkan Penampilan Anda dengan Pilihan yang Luar Biasa</p>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one" href="{{ route('home.createDesign') }}">
                                        <span class="txt">
                                            Pesan
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

        <section class="academics-overview-style1-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="academics-overview-style1-content">
                            <div class="academics-overview-style1-content__shape"
                                style="background-image:url({{ asset('assets/images/slider/kaos.jpg') }})"> </div>
                            <div class="text-box">
                                <div class="sec-title">
                                    <h2>Martaloka Konveksi</h2>
                                </div>
                                <div class="text">
                                    <p class="text-justify">Martaloka konveksi hadir untuk membantu Anda dalam memiliki kaos
                                        terbaik untuk berbagai aktivitas dan kegiatan. Kami memproduksi berbagai jenis kaos
                                        seperti kaos event, kaos promosi perusahaan, kaos klub hobi, kaos fans, dan kaos
                                        partai
                                        dengan kualitas yang terjaga. Dengan melakukan seluruh proses produksi secara
                                        mandiri,
                                        kami dapat memotong biaya dan waktu sehingga konsumen kami dapat menerima manfaat
                                        layanan kami sebagai “Tangan Pertama Anda”. Dapatkan produk kaos berkualitas dengan
                                        harga yang hemat dan hemat waktu hanya di martaloka.co.id.</p>
                                </div>
                            </div>
                            <div class="academics-overview-style1-img-box"
                                style="background-image:url({{ asset('assets/images/slider/5.jpg') }})"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="departments-area" id="pilihAska">
            <div class="container">
                <div class="sec-title text-center">
                    <h2>Keunggulan Martaloka Konveksi</h2>
                    <div class="sub-title">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-3">
                        <div class="single-departments-box marginbottom text-center wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.1s">
                            <div class="icon">
                                <img style="height: 85px;" src="{{ asset('assets/images/icon/11.png') }}" alt="">
                            </div>
                            <div class="">
                                <h2>Spesialis Kaos</h2>
                                <div class="text">
                                    <p class="text-justify">Sudah lebih dari 5 tahun lamanya kami fokus di spesialis kaos.
                                        Dengan fokus pada produksi kaos, kami menghasilkan produk berkualitas tinggi yang
                                        dirancang khusus untuk kebutuhan Anda.</p>
                                </div>
                            </div>
                        </div>
                        <div class="single-departments-box text-center wow fadeInLeft" data-wow-duration="1s"
                            data-wow-delay="0.2s">
                            <div class="icon">
                                <img style="height: 85px;" src="{{ asset('assets/images/icon/13.png') }}" alt="">
                            </div>
                            <div class="">
                                <h2>Tangan Pertama</h2>
                                <div class="text">
                                    <p class="text-justify">Kami memproduksi kaos secara langsung, tanpa melalui perantara,
                                        sehingga menghasilkan produk yang berkualitas, harga terjangkau dan tepat waktu yang
                                        sesuai dengan keinginan Anda.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6">
                        <div class="departments-img-box"
                            style="background-image: url({{ asset('assets/images/slider/polo.jpg') }}); background-size: cover; background-repeat: no-repeat; background-position: center;">
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-3">
                        <div class="single-departments-box marginbottom text-center wow fadeInRight" data-wow-duration="1s"
                            data-wow-delay="0.1s">
                            <div class="icon">
                                <img style="height: 85px;" src="{{ asset('assets/images/icon/12.png') }}" alt="">
                            </div>
                            <div class="">
                                <h2>Kapasitas Besar</h2>
                                <div class="text">
                                    <p class="text-justify">Dengan kapasitas produksi yang besar, yaitu mencapai 1000 pcs
                                        per
                                        bulan, Pabrik Kaos kami mampu memenuhi pesanan dalam jumlah besar untuk wilayah Bali
                                        tanpa mengorbankan kualitas.</p>
                                </div>
                            </div>
                        </div>

                        <div class="single-departments-box text-center wow fadeInRight" data-wow-duration="1s"
                            data-wow-delay="0.2s">
                            <div class="icon">
                                <img style="height: 85px;" src="{{ asset('assets/images/icon/14.png') }}" alt="">
                            </div>
                            <div class="">
                                <h2>Kualitas Terjamin</h2>
                                <div class="text">
                                    <p class="text-justify">Kami hanya menggunakan bahan berkualitas tinggi dan team
                                        produksi
                                        handal dalam setiap tahap produksi, sehingga Anda dapat yakin bahwa kaos Anda akan
                                        bertahan lama dan tetap nyaman dipakai.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="top-categories-area">
            <div class="container">
                <div class="sec-title-style3 text-center">
                    <div class="sub-title">
                    </div>
                    <h2 style="margin-top: -55px;" class="font-weight-bold">Produk Yang Tersedia</h2>
                </div>
            </div>
            <div class="container top-categories-area__content">
                <ul class="row">
                    @foreach ($products as $produk)
                        <!--Start Top Categories Single-->
                        <li class="col-xl-4 col-lg-4 top-categories-single">
                            <div class="top-categories-single__box">
                                <div class="img-box">
                                    <div class="">
                                        <img src="{{ asset('produk/' . $produk->gambar_produk) }}"
                                            style="height: 300px; object-fit:cover;" alt="">
                                    </div>
                                    <div class="overlay-content">
                                        {{-- <p>76 Courses</p> --}}
                                        <h3 class="mt-3"><a href="#">{{ $produk->nama_produk }}</a></h3>
                                        <div class="btns-box">
                                            <a class="btn-one btn-one--style4"
                                                href="{{ route('home.detail-produk', $produk->id) }}">
                                                <span class="txt">
                                                    <i class="icon-right-arrow-1"></i>
                                                    Lihat Produk
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach



                </ul>


            </div>
        </section>

        <section class="academy-slogan-area">
            <div class="academy-slogan-middle-content">
                <div class="academy-slogan-middle-content__bg"
                    style="background-image: url({{ asset('assets/images/slider/polo.jpg') }});"></div>
                <div class="banner-logo-box">
                    <a href="index-3.html">
                        <img style="margin-top: -30px" src="{{ asset('assets/images/logo1.png') }}" alt="Awesome Logo"
                            title="">
                    </a>
                </div>
            </div>
        
            <div class="auto-container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="academy-slogan-content-one">
                            <div class="academy-slogan-content-one__bg"
                                style="background-image: url({{ asset('assets/images/slider/5.jpg') }});"></div>
                            <div class="academy-slogan-content-one__inner text-center">
                                <div class="sec-title-style3">
                                    <div class="sub-title"></div>
                                    <h2><span>Kreasikan Kaos Anda<br>di sini</span><br></h2>
                                </div>
                                <div class="btns-box">
                                    <!-- Tombol Desain untuk menampilkan video -->
                                    <a class="btn-one btn-one--style4" href="#" onclick="showAndPlayVideo(event)">
                                        <span class="txt">
                                            <i class="icon-right-arrow-1"></i>
                                            Desain
                                        </span>
                                    </a>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style4 btn-wide" href="assets/pdf/panduan desain.pdf" target="PanduanDesainPDF">
                                        <span class="txt">
                                            <i class="icon-right-arrow-1"></i>
                                            Panduan Desain
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
        
                    <div class="col-xl-6">
                        <div class="academy-slogan-content-one academy-slogan-content-one--style2">
                            <div class="academy-slogan-content-one__bg"
                                style="background-image: url({{ asset('assets/images/slider/5.jpg') }});"></div>
                            <div class="academy-slogan-content-one__inner text-center">
                                <div class="sec-title-style3">
                                    <div class="sub-title"></div>
                                    <h2><span>Ayo Pesan jenis Pakaian<br>Anda Sekarang</span><br></h2>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style4" href="{{ route('home.createDesign') }}">
                                        <span class="txt">
                                            <i class="icon-right-arrow-1"></i>
                                           Pesan
                                        </span>
                                    </a>
                                </div>
                                <div class="btns-box">
                                    <a class="btn-one btn-one--style4 btn-wide" href="assets/pdf/panduan desain.pdf" target="PanduanDesainPDF">
                                        <span class="txt">
                                            <i class="icon-right-arrow-1"></i>
                                            Panduan Pemesanan
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Video Container (disembunyikan di awal) -->
            <div id="videoContainer" class="video-container">
                <button class="close-video" onclick="closeVideo()">×</button>
                <div class="video-wrapper">
                    <video id="assetVideo" src="assets/vidio/vidio_desain.mp4" id="videoElement" controls>
                        Your browser does not support the video tag.
                    </video>
                    <div class="video-controls">
                        <button class="video-back-btn" onclick="backToPage()">Back</button>
                        <button class="video-next-btn" onclick="skipToStudio()">Next</button>
                        <span id="videoDuration"></span>
                    </div>
                </div>
            </div>
        </section>
        
        <style>
            /* Video Container Style */
            .video-container {
                display: none; /* Video tersembunyi di awal */
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background-color: rgba(0, 0, 0, 0.9);
                z-index: 999999;
                align-items: center;
                justify-content: center;
            }
        
            .video-wrapper {
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                width: 80%; /* Kontrol lebar maksimal video */
                max-width: 700px;
            }
        
            .video-container video {
                width: 100%;
                height: auto;
                object-fit: contain;
            }
        
            /* Tombol tutup dan kontrol video */
            .close-video {
                position: absolute;
                top: 20px;
                right: 20px;
                font-size: 24px;
                color: white;
                cursor: pointer;
                z-index: 1000000;
            }
        
            .video-controls {
                margin-top: 15px;
                display: flex;
                justify-content: center;
                gap: 20px;
                width: 100%; /* Full width to center the buttons */
            }
        
            .video-back-btn,
            .video-next-btn {
                background: #ffffff;
                border: none;
                padding: 10px 20px;
                color: #000;
                font-size: 16px;
                cursor: pointer;
            }
        
            #videoDuration {
                color: white;
                font-size: 16px;
                margin-left: 20px;
            }
        </style>
        
        <script>
            function showAndPlayVideo(event) {
                event.preventDefault();
                document.body.style.overflow = 'hidden';  // Mencegah scrolling saat video tampil
                document.getElementById("videoContainer").style.display = "flex";  // Tampilkan video
                document.getElementById("assetVideo").play();
                updateVideoDuration(); // Update durasi video saat dimulai
            }
        
            function closeVideo() {
                document.body.style.overflow = 'auto';  // Kembalikan kemampuan scrolling
                document.getElementById("videoContainer").style.display = "none";  // Sembunyikan video
                document.getElementById("assetVideo").pause();
                document.getElementById("assetVideo").currentTime = 0;  // Reset video ke awal
            }
        
            function backToPage() {
                closeVideo();
            }
        
            function skipToStudio() {
                document.getElementById("assetVideo").pause();
                setTimeout(() => {
                    window.location.href = 'https://studio.morflax.com/clothing-mockups/create?element=t-shirt-man';
                }, 500);  // Delay untuk memastikan video berhenti sebelum navigasi
            }
        
            // Update durasi video saat metadata dimuat
            function updateVideoDuration() {
                const videoElement = document.getElementById("assetVideo");
                const videoDurationElement = document.getElementById("videoDuration");
                videoElement.onloadedmetadata = function() {
                    const duration = formatTime(videoElement.duration);
                    videoDurationElement.innerHTML = `Duration: ${duration}`;
                };
            }
        
            // Format waktu menjadi mm:ss
            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = Math.floor(seconds % 60);
                return `${minutes}:${remainingSeconds < 10 ? '0' + remainingSeconds : remainingSeconds}`;
            }
        </script>

        <section class="partner-style2-area">
            <div class="container">
                <div class="sec-title-style3 text-center">
                    <div class="sub-title">
                    </div>
                    <h2 style="margin-top: -20px">TELAH DIPERCAYA OLEH :</h2>
                </div>

                <div class="row">
                    <!--Start Single Partner Logo Box-->
                    <div class="col-xl-2 col-lg-4 col-md-4">
                        <div class="single-partner-logo-box-style2">
                            <a href="#"><img src="{{ asset('assets/images/sponsor/1.png') }}"
                                    alt="Awesome Image"></a>
                        </div>
                    </div>
                    <!--End Single Partner Logo Box-->
                    <!--Start Single Partner Logo Box-->
                    <div class="col-xl-2 col-lg-4 col-md-4">
                        <div class="single-partner-logo-box-style2">
                            <a href="#"><img src="{{ asset('assets/images/sponsor/2.png') }}"
                                    alt="Awesome Image"></a>
                        </div>
                    </div>
                    <!--End Single Partner Logo Box-->
                    <!--Start Single Partner Logo Box-->
                    <div class="col-xl-2 col-lg-4 col-md-4">
                        <div class="single-partner-logo-box-style2">
                            <a href="#"><img src="{{ asset('assets/images/sponsor/3.png') }}"
                                    alt="Awesome Image"></a>
                        </div>
                    </div>
                    <!--End Single Partner Logo Box-->
                    <!--Start Single Partner Logo Box-->
                    <div class="col-xl-2 col-lg-4 col-md-4">
                        <div class="single-partner-logo-box-style2">
                            <a href="#"><img src="{{ asset('assets/images/sponsor/4.png') }}"
                                    alt="Awesome Image"></a>
                        </div>
                    </div>
                    <!--End Single Partner Logo Box-->
                    <!--Start Single Partner Logo Box-->
                    <div class="col-xl-2 col-lg-4 col-md-4">
                        <div class="single-partner-logo-box-style2">
                            <a href="#"><img src="{{ asset('assets/images/sponsor/5.png') }}"
                                    alt="Awesome Image"></a>
                        </div>
                    </div>
                    <!--End Single Partner Logo Box-->
                    <!--Start Single Partner Logo Box-->
                    <div class="col-xl-2 col-lg-4 col-md-4">
                        <div class="single-partner-logo-box-style2">
                            <a href="#"><img src="{{ asset('assets/images/sponsor/6.png') }}"
                                    alt="Awesome Image"></a>
                        </div>
                    </div>
                    <!--End Single Partner Logo Box-->
                </div>
            </div>
        </section>

    </div>
@endsection
