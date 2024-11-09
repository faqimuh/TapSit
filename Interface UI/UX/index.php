

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="DJoz Template">
    <meta name="keywords" content="DJoz, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TAPSIT COFFE</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="src/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="src/css/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="src/css/css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="src/css/nowfont.css" type="text/css">
    <link rel="stylesheet" href="src/css/rockville.css" type="text/css">
    <link rel="stylesheet" href="src/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="src/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="src/css/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="src/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2">
                    <div class="header__logo">
                        <a href="./index.php"><img src="build/assets/img/Logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-10">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="./index.php">Home</a></li>
                                <li><a href="build/pages/login.php">Admin</a></li>
                                <li><a href="./discography.html">Discography</a></li>
                                <li><a href="./tours.html">Tours</a></li>
                                <li><a href="./videos.html">Videos</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="build/pages/login.php">About</a></li>
                                        <li><a href="./blog.html">Blog</a></li>
                                        <li><a href="./blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="./contact.html">Contact</a></li>
                            </ul>
                        </nav>
                        <div class="header__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero spad set-bg" data-setbg="build/assets/img/curved-images/maps2.jpg">
    <div class="circle"></div>
    <div class="circle second-circle"></div>
    <div class="circle ketiga-circle"></div>
    <div class="circle keempat-circle"></div>
    <div class="circle kelima-circle"></div>
    <div class="circle keenam-circle"></div>
    <div class="circle ketujuh-circle"></div>
    <div class="circle kedelapan-circle"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                </div>
            </div>
        </div>
        <div class="linear__icon">
            <i class="fa fa-angle-double-down"></i>
        </div>
    </section>
    <!-- Hero Section End -->
    <script>
    async function fetchMejaData() {
        const response = await fetch('get_meja.php'); // Ambil data dari PHP
        const mejaData = await response.json(); // Parse data JSON
        return mejaData;
    }

    async function updateCircles() {
        const mejaData = await fetchMejaData();
        const circle = document.querySelector('.circle');
        const secondCircle = document.querySelector('.second-circle');
        const ketigaCircle = document.querySelector('.ketiga-circle');
        const keempatCircle = document.querySelector('.keempat-circle');
        const kelimaCircle = document.querySelector('.kelima-circle');
        const keenamCircle = document.querySelector('.keenam-circle');
        const ketujuhCircle = document.querySelector('.ketujuh-circle');
        const kedelapanCircle = document.querySelector('.kedelapan-circle');


        // Update warna lingkaran berdasarkan status RFID
        mejaData.forEach(meja => {
            if (meja.meja === "1") { // Untuk meja 1
                if (meja.rfid=="73389603") {
                    circle.classList.remove('red');
                    circle.classList.add('green');
                } else {
					circle.classList.add('red'); // Tambahkan kelas merah
                    circle.classList.remove('green');
                }
            } else if (meja.meja === "2") { // Untuk meja 2
                if (meja.rfid=="73389603") {
                    secondCircle.classList.remove('red');
                    secondCircle.classList.add('green');
                } else {
                    secondCircle.classList.add('red'); // Tambahkan kelas merah
                    secondCircle.classList.remove('green');
                }
            }else if (meja.meja === "3") { // Untuk meja 3
                if (meja.rfid=="73389603") {
                    ketigaCircle.classList.remove('red');
                    ketigaCircle.classList.add('green');
                } else {
					ketigaCircle.classList.add('red'); // Tambahkan kelas merah
                    ketigaCircle.classList.remove('green');
                }
            }else if (meja.meja === "4") { // Untuk meja 3
                if (meja.rfid=="73389603") {
                    keempatCircle.classList.remove('red');
                    keempatCircle.classList.add('green');
                } else {
					keempatCircle.classList.add('red'); // Tambahkan kelas merah
                    keempatCircle.classList.remove('green');
                }
            }else if (meja.meja === "5") { // Untuk meja 3
                if (meja.rfid=="73389603") {
                    kelimaCircle.classList.remove('red');
                    kelimaCircle.classList.add('green');
                } else {
					kelimaCircle.classList.add('red'); // Tambahkan kelas merah
                    kelimaCircle.classList.remove('green');
                }
            }else if (meja.meja === "6") {
                if (meja.rfid=="73389603") {
					keenamCircle.classList.remove('red');
                    keenamCircle.classList.add('green');
                } else {
                    
					keenamCircle.classList.add('red');
                    keenamCircle.classList.remove('green');
                }
            } else if (meja.meja === "7") {
                if (meja.rfid=="73389603") {
                    ketujuhCircle.classList.remove('red');
                    ketujuhCircle.classList.add('green');
                } else {
					ketujuhCircle.classList.add('red');
                    ketujuhCircle.classList.remove('green');
                }
            }else if (meja.meja === "8") {
                if (meja.rfid=="73389603") {
                    kedelapanCircle.classList.remove('red');
                    kedelapanCircle.classList.add('green');
                } else {
					kedelapanCircle.classList.add('red');
                    kedelapanCircle.classList.remove('green');
                }
            }
        });
    }

    // Panggil fungsi untuk mengupdate warna lingkaran setiap 5 detik
    setInterval(updateCircles, 5000); // Mengupdate setiap 5000 ms (5 detik)
    // Panggil fungsi untuk mengupdate warna lingkaran
    updateCircles();
 
</script>


    <!-- Event Section Begin -->
    <section class="event spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Best seller 2024    </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="event__slider owl-carousel">
                    <div class="col-lg-4">
                        <div class="event__item">
                            <div class="event__item__pic set-bg" data-setbg="build/assets/img/c1.jpg">
                                <div class="tag-date">
                                    <span>IDR 35.00</span>
                                </div>
                            </div>
                            <div class="event__item__text">
                                <h4>Macchhiato Coffe</h4>
                                <p><i class="fa fa-map-marker"></i> Perpaduan antara kopi dan susu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="event__item">
                            <div class="event__item__pic set-bg" data-setbg="build/assets/img/4.png">
                                <div class="tag-date">
                                    <span>IDR 30.000</span>
                                </div>
                            </div>
                            <div class="event__item__text">
                                <h4>Kopi Arabika Mandailing</h4>
                                <p><i class="fa fa-map-marker"></i> Aroma khas dengan rasa halus dan sedikit asam.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="event__item">
                            <div class="event__item__pic set-bg" data-setbg="build/assets/img/5.png">
                                <div class="tag-date">
                                    <span>IDR 35.000</span>
                                </div>
                            </div>
                            <div class="event__item__text">
                                <h4>Kopi Latte</h4>
                                <p><i class="fa fa-map-marker"></i> Espresso dengan susu lembut dan busa creamy.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="event__item">
                            <div class="event__item__pic set-bg" data-setbg="build/assets/img/6.png">
                                <div class="tag-date">
                                    <span>IDR 38.000</span>
                                </div>
                            </div>
                            <div class="event__item__text">
                                <h4>Cappuccino</h4>
                                <p><i class="fa fa-map-marker"></i> Campuran espresso dan susu panas dengan busa melimpah </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Event Section End -->

    <!-- About Section Begin -->
    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about__pic">
                        <img src="img/tapsit.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about__text">
                        <div class="section-title">
                            <h2>TAPSIT</h2>
                            <h1>About me</h1>
                        </div>
                        <p>Proyek ini bertujuan untuk mengembangkan sistem monitoring otomatis yang memantau ketersediaan tempat duduk di kafe dan restoran, 
                            menggunakan mikrokontroler ESP32 dan teknologi RFID. Sistem ini memungkinkan pelanggan untuk memilih meja dengan mengetuk kartu RFID, 
                            yang secara instan memperbarui status meja. Data yang dikumpulkan oleh cloud server disimpan dalam database lokal dan ditampilkan 
                            di monitor kasir, memungkinkan staf untuk melihat meja yang kosong dan terisi. Dengan demikian, sistem ini meningkatkan kenyamanan 
                            pelanggan dan efisiensi operasional, serta mengurangi waktu tunggu dan kesalahan.</p>
                        <a href="#" class="primary-btn">CONTACT ME</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section End -->

    <!-- Services Section Begin -->
    <section class="services">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div class="services__left set-bg" data-setbg="img/services/service-left.jpg">
                        <a href="https://www.youtube.com/watch?v=JGwWNGJdvx8" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 p-0">
                    <div class="row services__list">
                        <div class="col-lg-6 p-0 order-lg-1 col-md-6 order-md-1">
                            <div class="service__item deep-bg">
                                <img src="img/services/service-1.png" alt="">
                                <h4>Wedding</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-2 col-md-6 order-md-2">
                            <div class="service__item">
                                <img src="img/services/service-2.png" alt="">
                                <h4>Clubs and bar</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-4 col-md-6 order-md-4">
                            <div class="service__item deep-bg">
                                <img src="img/services/service-4.png" alt="">
                                <h4>DJ lessons</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                            </div>
                        </div>
                        <div class="col-lg-6 p-0 order-lg-3 col-md-6 order-md-3">
                            <div class="service__item">
                                <img src="img/services/service-3.png" alt="">
                                <h4>Corporate events</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    <!-- Track Section Begin -->
    <section class="track spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title">
                        <h2>Latest tracks</h2>
                        <h1>Music favorit</h1>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="track__all">
                        <a href="#" class="primary-btn border-btn">View all tracks</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 p-0">
                    <div class="track__content nice-scroll">
                        <div class="single_player_container">
                            <h4>Bunga Abadi - Rio Clappy</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_1"
                                data-url="music-files/bunga_abadi.mp3"></div>
                            <div class="jp-audio jp_container_1" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_player_container">
                            <h4>Hello You - Iqbal Ramadhan</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_2"
                                data-url="music-files/2.mp3"></div>
                            <div class="jp-audio jp_container_2" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_player_container">
                            <h4>David Guetta Miami Ultra</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_3"
                                data-url="music-files/3.mp3"></div>
                            <div class="jp-audio jp_container_3" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_player_container">
                            <h4>David Guetta Miami Ultra</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_4"
                                data-url="music-files/4.mp3"></div>
                            <div class="jp-audio jp_container_4" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_player_container">
                            <h4>David Guetta Miami Ultra</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_5"
                                data-url="music-files/5.mp3"></div>
                            <div class="jp-audio jp_container_5" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="single_player_container">
                            <h4>David Guetta Miami Ultra</h4>
                            <div class="jp-jplayer jplayer" data-ancestor=".jp_container_6"
                                data-url="music-files/6.mp3"></div>
                            <div class="jp-audio jp_container_6" role="application" aria-label="media player">
                                <div class="jp-gui jp-interface">
                                    <!-- Player Controls -->
                                    <div class="player_controls_box">
                                        <button class="jp-play player_button" tabindex="0"></button>
                                    </div>
                                    <!-- Progress Bar -->
                                    <div class="player_bars">
                                        <div class="jp-progress">
                                            <div class="jp-seek-bar">
                                                <div>
                                                    <div class="jp-play-bar">
                                                        <div class="jp-current-time" role="timer" aria-label="time">0:00
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="jp-duration ml-auto" role="timer" aria-label="duration">00:00</div>
                                    </div>
                                    <!-- Volume Controls -->
                                    <div class="jp-volume-controls">
                                        <button class="jp-mute" tabindex="0"><i
                                                class="fa fa-volume-down"></i></button>
                                        <div class="jp-volume-bar">
                                            <div class="jp-volume-bar-value" style="width: 0%;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 p-0">
                    <div class="track__pic">
                        <img src="build/assets/img/LT2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Track Section End -->

    <!-- Youtube Section Begin -->
    <section class="youtube spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Youtube feed</h2>
                        <h1>Latest videos</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="youtube__item">
                        <div class="youtube__item__pic set-bg" data-setbg="img/youtube/youtube-1.jpg">
                            <a href="https://www.youtube.com/watch?v=yJg-Y5byMMw?autoplay=1" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="youtube__item__text">
                            <h4>David Guetta Miami Ultra Music Festival 2019</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="youtube__item">
                        <div class="youtube__item__pic set-bg" data-setbg="img/youtube/youtube-2.jpg">
                            <a href="https://www.youtube.com/watch?v=K4DyBUG242c?autoplay=1" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="youtube__item__text">
                            <h4>Martin Garrix (Full live-set) | SLAM!Koningsdag</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="youtube__item">
                        <div class="youtube__item__pic set-bg" data-setbg="img/youtube/youtube-3.jpg">
                            <a href="https://www.youtube.com/watch?v=S19UcWdOA-I?autoplay=1" class="play-btn video-popup"><i class="fa fa-play"></i></a>
                        </div>
                        <div class="youtube__item__text">
                            <h4>Dimitri Vegas, Steve Aoki & Like Mike’s “3 Are Legend”</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Youtube Section End -->

    <!-- Countdown Section Begin -->
    <section class="countdown spad set-bg" data-setbg="build/assets/img/w1.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="countdown__text">
                        <h1>WARUNG KOPI 2024</h1>
                        <h4>Music festival start in</h4>
                    </div>
                    <div class="countdown__timer" id="countdown-time">
                        <div class="countdown__item">
                            <span>20</span>
                            <p>days</p>
                        </div>
                        <div class="countdown__item">
                            <span>45</span>
                            <p>hours</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>minutes</p>
                        </div>
                        <div class="countdown__item">
                            <span>09</span>
                            <p>seconds</p>
                        </div>
                    </div>
                    <div class="buy__tickets">
                        <a href="#" class="primary-btn">Buy tickets</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Countdown Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad set-bg" data-setbg="img/footer-bg.png">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer__address">
                        <ul>
                            <li>
                                <i class="fa fa-phone"></i>
                                <p>Phone</p>
                                <h6>1-677-124-44227</h6>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <p>Email</p>
                                <h6>DJ.Music@gmail.com</h6>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1 col-md-6">
                    <div class="footer__social">
                        <h2>DJoz</h2>
                        <div class="footer__social__links">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1 col-md-6">
                    <div class="footer__newslatter">
                        <h4>Stay With me</h4>
                        <form action="#">
                            <input type="text" placeholder="Email">
                            <button type="submit"><i class="fa fa-send-o"></i></button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			<div class="footer__copyright__text">
				<p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
			</div>
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Music Plugin -->
    <script src="js/jquery.jplayer.min.js"></script>
    <script src="js/jplayerInit.js"></script>
</body>

</html>

