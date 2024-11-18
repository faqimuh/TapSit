<?php
// Mulai sesi
session_start();

// Cek apakah pengguna sudah login, jika tidak, redirect ke login.php
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Tindakan logout
if (isset($_GET['logout'])) {
    // Hapus semua sesi
    session_destroy();
    header("Location: login.php"); // Redirect ke halaman login setelah logout
    exit();
}

// Koneksi ke database
$servername = "localhost";
$username = "root";  // ganti dengan username MySQL kamu
$password = "TapSit";      // ganti dengan password MySQL kamu
$dbname = "projiot"; // ganti dengan nama database kamu

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$sql = "SELECT meja, rfid, batt FROM test2"; // ganti 'users' dengan nama tabel kamu
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/Logo.png" />
    <title>Manegement Admin</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Popper -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <!-- Main Styling -->
    <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
    <!--css style -->
    <link rel="stylesheet" href="../../src/css/style.css" type="text/css">

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  </head>

  <body class="m-0 font-sans antialiased font-normal text-base leading-default bg-gray-50 text-slate-500">
    <!-- sidenav  -->
    <aside class="max-w-62.5 ease-nav-brand z-990 fixed inset-y-0 my-4 ml-4 block w-full -translate-x-full flex-wrap items-center justify-between overflow-y-auto rounded-2xl border-0 bg-white p-0 antialiased shadow-none transition-transform duration-200 xl:left-0 xl:translate-x-0 xl:bg-transparent">
      <div class="h-19.5">
        <i class="absolute top-0 right-0 hidden p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
        <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" >
          <img src="../assets/img/Logo.png" class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
          <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Admin TapSit</span>
        </a>
      </div>

      <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />

      <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
          <li class="mt-0.5 w-full">
            <a class="py-2.7 shadow-soft-xl text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap rounded-lg bg-white px-4 font-semibold text-slate-700 transition-colors" href="../pages/admin.php">
              <div class="bg-gradient-to-tl from-purple-700 to-pink-500 shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>shop</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(0.000000, 148.000000)">
                          <path
                            class="opacity-60"
                            d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"
                          ></path>
                          <path
                            class=""
                            d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"
                          ></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Dashboard</span>
            </a>
          </li>

          <li class="w-full mt-4">
            <h6 class="pl-6 ml-2 font-bold leading-tight uppercase text-xs opacity-60">Account pages</h6>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/pasword.php">
              <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <title>customer-support</title>
                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                      <g transform="translate(1716.000000, 291.000000)">
                        <g transform="translate(1.000000, 0.000000)">
                          <path class="fill-slate-800 opacity-60" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                          <path class="fill-slate-800" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                          <path class="fill-slate-800" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                        </g>
                      </g>
                    </g>
                  </g>
                </svg>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Akun</span>
            </a>
          </li>

          <li class="mt-0.5 w-full">
            <a class="py-2.7 text-sm ease-nav-brand my-0 mx-4 flex items-center whitespace-nowrap px-4 transition-colors" href="../pages/profiltapsit.php">
                <!-- Gantikan SVG dengan ikon Font Awesome -->
                <div class="shadow-soft-2xl mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-white bg-center stroke-0 text-center xl:p-2.5">
                    <i class="fas fa-users" style="font-size: 18px; color: #555;"></i> <!-- Ikon Tim dari Font Awesome -->
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease-soft">Tim Project</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="mx-4">
        <!-- load phantom colors for card after: -->
        <p class="invisible hidden text-gray-800 text-red-500 text-red-600 after:bg-gradient-to-tl after:from-gray-900 after:to-slate-800 after:bg-gradient-to-tl after:from-blue-600 after:to-cyan-400 after:bg-gradient-to-tl after:from-red-500 after:to-yellow-400 after:bg-gradient-to-tl after:from-green-600 after:to-lime-400 after:bg-gradient-to-tl after:from-red-600 after:to-rose-400 after:bg-gradient-to-tl after:from-slate-600 after:to-slate-300 text-lime-500 text-cyan-500 text-slate-400 text-fuchsia-500"></p>
       
        <!-- pro btn  -->
        <a class="inline-block w-full px-6 py-3 my-4 font-bold text-center text-white uppercase align-middle transition-all ease-in border-0 rounded-lg select-none shadow-soft-md bg-150 bg-x-25 leading-pro text-xs bg-gradient-to-tl from-purple-700 to-pink-500 hover:shadow-soft-2xl hover:scale-102" href="logout.php">KELUAR</a>
      </div>
    </aside>

    <!-- end sidenav -->

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
      <!-- Navbar -->
      <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="true">
        <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
          <nav>
            <!-- breadcrumb -->
            <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
              <li class="leading-normal text-sm">
                <a class="opacity-50 text-slate-700" href="javascript:;">Pages</a>
              </li>
              <li class="text-sm pl-2 capitalize leading-normal text-slate-700 before:float-left before:pr-2 before:text-gray-600 before:content-['/']" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="mb-0 font-bold capitalize">Dashboard</h6>
          </nav>

          <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
            
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">

              <li class="flex items-center pl-4 xl:hidden">
                <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-sm text-slate-500" sidenav-trigger>
                  <div class="w-4.5 overflow-hidden">
                    <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                    <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                    <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                  </div>
                </a>
              </li>
              <li class="flex items-center px-4">
              </li>

              <!-- notifications -->

                <ul dropdown-menu class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350 before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5 before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2 before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0 lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                  <!-- add show class on dropdown open js -->
                  <li class="relative mb-2">
                    <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg bg-transparent px-4 duration-300 hover:bg-gray-200 hover:text-slate-700 lg:transition-colors" href="javascript:;">
                      <div class="flex py-1">
                        <div class="my-auto">
                          <img src="../assets/img/team-2.jpg" class="inline-flex items-center justify-center mr-4 text-white text-sm h-9 w-9 max-w-none rounded-xl" />
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 font-normal leading-normal text-sm"><span class="font-semibold">New message</span> from Laur</h6>
                          <p class="mb-0 leading-tight text-xs text-slate-400">
                            <i class="mr-1 fa fa-clock"></i>
                            13 minutes ago
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                  <li class="relative mb-2">
                    <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                      <div class="flex py-1">
                        <div class="my-auto">
                          <img src="../assets/img/small-logos/logo-spotify.svg" class="inline-flex items-center justify-center mr-4 text-white text-sm bg-gradient-to-tl from-gray-900 to-slate-800 h-9 w-9 max-w-none rounded-xl" />
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 font-normal leading-normal text-sm"><span class="font-semibold">New album</span> by Travis Scott</h6>
                          <p class="mb-0 leading-tight text-xs text-slate-400">
                            <i class="mr-1 fa fa-clock"></i>
                            1 day
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>

                  <li class="relative">
                    <a class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700" href="javascript:;">
                      <div class="flex py-1">
                        <div class="inline-flex items-center justify-center my-auto mr-4 text-white transition-all duration-200 ease-nav-brand text-sm bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                          <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>credit-card</title>
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                <g transform="translate(1716.000000, 291.000000)">
                                  <g transform="translate(453.000000, 454.000000)">
                                    <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                    <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                  </g>
                                </g>
                              </g>
                            </g>
                          </svg>
                        </div>
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-1 font-normal leading-normal text-sm">Payment successfully completed</h6>
                          <p class="mb-0 leading-tight text-xs text-slate-400">
                            <i class="mr-1 fa fa-clock"></i>
                            2 days
                          </p>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- end Navbar -->

      <!-- cards -->
      <div class="w-full px-6 py-6 mx-auto">
        <!-- cards row 2 -->
        <div class="flex flex-wrap mt-6 -mx-3">
          <div class="w-full px-3 mb-6 lg:mb-0 lg:w-7/12 lg:flex-none">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-soft-xl rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <!-- <div class="flex flex-wrap -mx-3"> -->
                  <div class="max-w-full px-3 lg:w-1/2 lg:flex-none">
                    <div class="flex flex-col h-full">
                      <p class="pt-2 mb-1 font-semibold">Built by TapSit</p>
                      <h5 class="font-bold">TapSit Manegement</h5>
                      <p class="mb-12">Kondisi Meja</p>
                      <a class="mt-auto mb-0 font-semibold leading-normal text-sm group text-slate-500">
                        Merah = Ada Pengunjung ; Hijau = Kosong
                       <!-- <i class="fas fa-arrow-right ease-bounce text-sm group-hover:translate-x-1.25 ml-1 leading-normal transition-all duration-200"></i> -->
                      </a>
                      <img src="../assets/img/curved-images/maps2.jpg" alt="Related Image" class="mb-4">
                      <div class="circle1"></div>
                      <div class="circle2"></div>
                      <div class="circle3"></div>
                      <div class="circle4"></div>
                      <div class="circle5"></div>
                      <div class="circle6"></div>
                      <div class="circle7"></div>
                      <div class="circle8"></div>
                      <script>
                      async function fetchMejaData() {
                          const response = await fetch('../../get_meja.php'); // Ambil data dari PHP
                          const mejaData = await response.json(); // Parse data JSON
                          return mejaData;
                      }

                      async function updateCircles() {
                          const mejaData = await fetchMejaData();
                          const circle = document.querySelector('.circle1');
                          const secondCircle = document.querySelector('.circle2');
                          const ketigaCircle = document.querySelector('.circle3');
                          const keempatCircle = document.querySelector('.circle4');
                          const kelimaCircle = document.querySelector('.circle5');
                          const keenamCircle = document.querySelector('.circle6');
                          const ketujuhCircle = document.querySelector('.circle7');
                          const kedelapanCircle = document.querySelector('.circle8');


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
                    </div>
                  </div>
                <!-- </div> -->
              </div>
            </div>
          </div>
        </div>

          <!-- Toast Notification Container -->
        <div id="toastContainer" style="position: fixed; top: 10px; left: 50%; transform: translateX(-50%); z-index: 9999; display: none;">
            <div id="toast" style="background-color: red; color: white; padding: 10px 20px; border-radius: 5px; font-size: 16px; max-width: 400px; text-align: center;">
                <strong>Warning:</strong> Baterai meja akan habis!
            </div>
        </div>
          <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
            <div class="border-black/12.5 shadow-soft-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">

              <div class="flex-auto p-4">
              <style>
                table {
                  border-collapse: collapse;
                  width: 100%;
                }

                th, td {
                  text-align: left;
                  padding: 8px;
                }

                tr:nth-child(even) {
                  background-color: #f2f2f2;
                }

                th {
                  background-color: #04AA6D;
                  color: white;
                }

                /* Style for the rounded inner box */
                .inner-box {
                  padding: 4px 8px;
                  border-radius: 12px;
                  display: inline-block;
                  color: white;
                  font-weight: bold;
                  width: 100px; /* Adjust width as necessary */
                  text-align: center;
                }

                .inner-box.green {
                  background-color: green;
                }

                .inner-box.red {
                  background-color: red;
                }

                .inner-box.yellow {
                  background-color: yellow;
                  color: black;
                }
              </style>
            </head>
            <body>

            <h2 class="mb-0 font-bold capitalize">TABEL MEJA</h2>

            <table border="1" id="dataTable">
              <tr>
                <th>Meja</th>
                <th>RFID</th>
                <th>Kondisi Meja</th>
                <th>Kondisi Baterai</th>
                <th>Status Baterai</th>
              </tr>
            </table>

            <script>
            function fetchData() {
              fetch('kondisimeja.php')
                .then(response => response.json())
                .then(data => {
                  console.log("Data fetched:", data); // Debugging data
                  const table = document.getElementById("dataTable");
                  table.innerHTML = `
                    <tr>
                      <th>MEJA</th>
                      <th>RFID</th>
                      <th>KONDISI MEJA</th>
                      <th>KONDISI BATERAI</th>
                      <th>STATUS BATERAI</th>
                    </tr>`;

                  let lowBatteryTables = [];

                  data.forEach(row => {
                    console.log(`Row data: ${row.meja}, Battery: ${row.batt}`); // Debugging each row data
                    const newRow = table.insertRow();
                    newRow.insertCell(0).innerText = row.meja;
                    newRow.insertCell(1).innerText = row.rfid;

                    // Kondisi Meja
                    const kondisiMejaCell = newRow.insertCell(2);
                    const kondisiMejaDiv = document.createElement("div");
                    kondisiMejaDiv.classList.add("inner-box");
                    if (row.rfid === '73389603') {
                      kondisiMejaDiv.style.backgroundColor = 'green';
                      kondisiMejaDiv.innerText = 'Kosong';
                    } else {
                      kondisiMejaDiv.style.backgroundColor = 'red';
                      kondisiMejaDiv.innerText = 'Used';
                    }
                    kondisiMejaCell.appendChild(kondisiMejaDiv);

                    // Kondisi Baterai dengan persentase dan gradient warna
                    const kondisiBatteryCell = newRow.insertCell(3);
                    const kondisiBatteryDiv = document.createElement("div");
                    kondisiBatteryDiv.classList.add("inner-box");

                    const batteryLevel = parseInt(row.batt, 10);
                    if (!isNaN(batteryLevel)) {
                      const greenPercentage = batteryLevel; // green part
                      const redPercentage = 100 - batteryLevel; // red part
                      kondisiBatteryDiv.style.background = `linear-gradient(to right, green ${greenPercentage}%, red ${redPercentage}%)`;
                      kondisiBatteryDiv.innerText = `${batteryLevel}%`;
                    } else {
                      kondisiBatteryDiv.style.backgroundColor = 'gray';
                      kondisiBatteryDiv.innerText = 'Data tidak valid';
                    }
                    kondisiBatteryCell.appendChild(kondisiBatteryDiv);

                    // Status Baterai berdasarkan level baterai
                    const statusBatteryCell = newRow.insertCell(4);
                    const statusBatteryDiv = document.createElement("div");
                    statusBatteryDiv.classList.add("inner-box");

                    if (batteryLevel <= 1) {
                      statusBatteryDiv.classList.add("red");
                      statusBatteryDiv.innerText = 'BATT HABIS';
                      lowBatteryTables.push(`Meja ${row.meja} (Level: ${batteryLevel}%)`);
                    } else if (batteryLevel <= 10) { // Perbaiki kondisi di sini
                      statusBatteryDiv.classList.add("yellow");
                      statusBatteryDiv.innerText = 'BATT HAMPIR HABIS';
                      lowBatteryTables.push(`Meja ${row.meja} (Level: ${batteryLevel}%)`);
                    } else if (batteryLevel > 10) {
                      statusBatteryDiv.classList.add("green");
                      statusBatteryDiv.innerText = 'AMAN';
                    }

                    statusBatteryCell.appendChild(statusBatteryDiv);
                  });

                  if (lowBatteryTables.length > 0) {
                    const message = `Peringatan! Baterai pada meja berikut hampir habis: ${lowBatteryTables.join(', ')}`;
                    showToastNotification(message);
                  }
                })
                .catch(error => {
                  console.error('Error fetching data:', error);
                  alert('Terjadi kesalahan saat mengambil data.');
                });
            }

            // Toast notification styles and function
            function addToastStyles() {
              const style = document.createElement('style');
              style.innerHTML = `
                #toastContainer {
                  position: fixed;
                  top: 20px;
                  left: 50%;
                  transform: translateX(-50%);
                  z-index: 9999;
                  display: none;
                  width: auto;
                  max-width: 400px;
                  padding: 12px 20px;
                  border-radius: 8px;
                  background: linear-gradient(135deg, #ff5f6d, #ffc371);
                  color: #fff;
                  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                  font-family: Arial, sans-serif;
                  animation: fadeIn 0.4s ease-out, fadeOut 0.4s 4.5s ease forwards;
                }
                #toast {
                  display: flex;
                  align-items: center;
                  font-size: 14px;
                  line-height: 1.4;
                  color: #fff;
                }
                #toast img {
                  width: 24px;
                  height: 24px;
                  margin-right: 12px;
                  border-radius: 4px;
                  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                }
                #toast strong {
                  font-weight: bold;
                  font-size: 16px;
                  margin-right: 8px;
                }
                @keyframes fadeIn { 0% { opacity: 0; } 100% { opacity: 1; } }
                @keyframes fadeOut { 0% { opacity: 1; } 100% { opacity: 0; } }
              `;
              document.head.appendChild(style);
            }

            addToastStyles();

            function showToastNotification(message) {
              let toastContainer = document.getElementById('toastContainer');
              if (!toastContainer) {
                toastContainer = document.createElement('div');
                toastContainer.id = 'toastContainer';
                document.body.appendChild(toastContainer);
              }
              toastContainer.innerHTML = `
                <div id="toast">
                  <img src="../assets/img/LOWBAT.png" alt="Battery Icon">
                  <div>
                    <strong>Warning:</strong> ${message}
                  </div>
                </div>
              `;
              toastContainer.style.display = 'block';
              setTimeout(() => {
                toastContainer.style.display = 'none';
              }, 10000);
            }

            setInterval(fetchData, 5000); // Fetch data every 5 seconds
            fetchData(); // Initial fetch when page loads
            </script>
              </div>
            </div>
          </div>
        </div>
        <footer class="pt-4">
          <div class="w-full px-6 mx-auto">
            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
              <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                  ©
                  <script>
                    document.write(new Date().getFullYear() + ",");
                  </script>
                  made with <i class="fa fa-heart"></i> by
                  <a href="https://github.com/faqimuh/TapSit" class="font-semibold text-slate-700" target="_blank">TapSit Tim</a>
                  for a better web.
                </div>
              </div>
              <div class="w-full max-w-full px-3 mt-0 shrink-0 lg:w-1/2 lg:flex-none">
                <ul class="flex flex-wrap justify-center pl-0 mb-0 list-none lg:justify-end">
                  <li class="nav-item">
                    <a href="https://github.com/faqimuh/TapSit" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">Creative Tim</a>
                  </li>
                  <li class="nav-item">
                    <a href="http://54.253.231.37/oo1/build/pages/profiltapsit.php" class="block px-4 pt-0 pb-1 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">About Us</a>
                  </li>
                  <li class="nav-item">
                    <a href="https://www.creative-tim.com/license" class="block px-4 pt-0 pb-1 pr-0 font-normal transition-colors ease-soft-in-out text-sm text-slate-500" target="_blank">License</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
      </div>
      <!-- end cards -->
    </main>
    <div fixed-plugin>
      <!-- <a fixed-plugin-button class="bottom-7.5 right-7.5 text-xl z-990 shadow-soft-lg rounded-circle fixed cursor-pointer bg-white px-4 py-2 text-slate-700">
        <i class="py-2 pointer-events-none fa fa-cog"> </i>
      </a> -->
      <!-- -right-90 in loc de 0-->
      <div fixed-plugin-card class="z-sticky shadow-soft-3xl w-90 ease-soft -right-90 fixed top-0 left-auto flex h-full min-w-0 flex-col break-words rounded-none border-0 bg-white bg-clip-border px-2.5 duration-200">
        <div class="px-6 pt-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
          <div class="float-left">
            <h5 class="mt-4 mb-0">Soft UI Configurator</h5>
            <p>See our dashboard options.</p>
          </div>
          <div class="float-right mt-6">
            <button fixed-plugin-close-button class="inline-block p-0 mb-4 font-bold text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer hover:scale-102 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 active:opacity-85 text-slate-700">
              <i class="fa fa-close"></i>
            </button>
          </div>
          <!-- End Toggle Button -->
        </div>
        <hr class="h-px mx-0 my-1 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent" />
        <div class="flex-auto p-6 pt-0 sm:pt-4">
          <!-- Sidebar Backgrounds -->
          <div>
            <h6 class="mb-0">Sidebar Colors</h6>
          </div>
          <a href="javascript:void(0)">
            <div class="my-2 text-left" sidenav-colors>
              <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-purple-700 to-pink-500 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-slate-700 text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" active-color data-color-from="purple-700" data-color-to="pink-500" onclick="sidebarColor(this)"></span>
              <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-gray-900 to-slate-800 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color-from="gray-900" data-color-to="slate-800" onclick="sidebarColor(this)"></span>
              <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-blue-600 to-cyan-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color-from="blue-600" data-color-to="cyan-400" onclick="sidebarColor(this)"></span>
              <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-green-600 to-lime-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color-from="green-600" data-color-to="lime-400" onclick="sidebarColor(this)"></span>
              <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-red-500 to-yellow-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color-from="red-500" data-color-to="yellow-400" onclick="sidebarColor(this)"></span>
              <span class="text-xs rounded-circle h-5.75 mr-1.25 w-5.75 ease-soft-in-out bg-gradient-to-tl from-red-600 to-rose-400 relative inline-block cursor-pointer whitespace-nowrap border border-solid border-white text-center align-baseline font-bold uppercase leading-none text-white transition-all duration-200 hover:border-slate-700" data-color-from="red-600" data-color-to="rose-400" onclick="sidebarColor(this)"></span>
            </div>
          </a>
          <!-- Sidenav Type -->
          <div class="mt-4">
            <h6 class="mb-0">Sidenav Type</h6>
            <p class="leading-normal text-sm">Choose between 2 different sidenav types.</p>
          </div>
          <div class="flex">
            <button transparent-style-btn class="inline-block w-full px-4 py-3 mb-2 font-bold text-center text-white uppercase align-middle transition-all border border-transparent border-solid rounded-lg cursor-pointer xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-purple-700 xl-max:to-pink-500 xl-max:text-white xl-max:border-0 hover:scale-102 hover:shadow-soft-xs active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-purple-700 to-pink-500 bg-fuchsia-500 hover:border-fuchsia-500" data-class="bg-transparent" active-style>Transparent</button>
            <button white-style-btn class="inline-block w-full px-4 py-3 mb-2 ml-2 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg cursor-pointer xl-max:cursor-not-allowed xl-max:opacity-65 xl-max:pointer-events-none xl-max:bg-gradient-to-tl xl-max:from-purple-700 xl-max:to-pink-500 xl-max:text-white xl-max:border-0 hover:scale-102 hover:shadow-soft-xs active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 border-fuchsia-500 bg-none text-fuchsia-500 hover:border-fuchsia-500" data-class="bg-white">White</button>
          </div>
          <p class="block mt-2 leading-normal text-sm xl:hidden">You can change the sidenav type just on desktop view.</p>
          <!-- Navbar Fixed -->
          <div class="mt-4">
            <h6 class="mb-0">Navbar Fixed</h6>
          </div>
          <div class="min-h-6 mb-0.5 block pl-0">
            <input navbarFixed class="rounded-10 duration-250 ease-soft-in-out after:rounded-circle after:shadow-soft-2xl after:duration-250 checked:after:translate-x-5.25 h-5 relative float-left mt-1 ml-auto w-10 cursor-pointer appearance-none border border-solid border-gray-200 bg-slate-800/10 bg-none bg-contain bg-left bg-no-repeat align-top transition-all after:absolute after:top-px after:h-4 after:w-4 after:translate-x-px after:bg-white after:content-[''] checked:border-slate-800/95 checked:bg-slate-800/95 checked:bg-none checked:bg-right" type="checkbox" />
          </div>
          <hr class="h-px bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent sm:my-6" />
          <a class="inline-block w-full px-6 py-3 mb-4 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer leading-pro text-xs ease-soft-in hover:shadow-soft-xs hover:scale-102 active:opacity-85 tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-to-tl from-gray-900 to-slate-800" href="https://www.creative-tim.com/product/soft-ui-dashboard-tailwind" target="_blank">Free Download</a>
          <a class="inline-block w-full px-6 py-3 mb-4 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer active:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft bg-150 bg-x-25 border-slate-700 text-slate-700 hover:bg-transparent hover:text-slate-700 hover:shadow-none active:bg-slate-700 active:text-white active:hover:bg-transparent active:hover:text-slate-700 active:hover:shadow-none" href="https://www.creative-tim.com/learning-lab/tailwind/html/quick-start/soft-ui-dashboard/" target="_blank">View documentation</a>
          <div class="w-full text-center">
            <a class="github-button" href="https://github.com/creativetimofficial/soft-ui-dashboard-tailwind" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/soft-ui-dashboard on GitHub">Star</a>
            <h6 class="mt-4">Thank you for sharing!</h6>
            <a href="https://twitter.com/intent/tweet?text=Check%20Soft%20UI%20Dashboard%20Tailwind%20made%20by%20%40CreativeTim&hashtags=webdesign,dashboard,tailwindcss&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fsoft-ui-dashboard-tailwind" class="inline-block px-6 py-3 mb-0 mr-2 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700" target="_blank"> <i class="mr-1 fab fa-twitter"></i> Tweet </a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/soft-ui-dashboard-tailwind" class="inline-block px-6 py-3 mb-0 mr-2 font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer hover:shadow-soft-xs hover:scale-102 active:opacity-85 leading-pro text-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 me-2 border-slate-700 bg-slate-700" target="_blank"> <i class="mr-1 fab fa-facebook-square"></i> Share </a>
          </div>
        </div>
      </div>
    </div>
  </body>
  <!-- plugin for charts  -->
  <script src="../assets/js/plugins/chartjs.min.js" async></script>
  <!-- plugin for scrollbar  -->
  <script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
  <!-- github button -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- main script file  -->
  <script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>
</html>
