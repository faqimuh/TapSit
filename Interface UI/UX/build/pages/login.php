<?php 
// Mulai sesi
session_start();

// Cek apakah pengguna sudah login, jika ya, redirect ke admin.php
if (isset($_SESSION['user'])) {
    header("Location: admin.php");
    exit();
}

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "TapSit";
$dbname = "projiot";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inisialisasi variabel error message
$error_message = "";

// Cek apakah form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil input dari form dan sanitasi
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Query untuk mengambil data pengguna berdasarkan email
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Jika pengguna ditemukan
    if ($result->num_rows > 0) {
        // Ambil data pengguna
        $row = $result->fetch_assoc();

        // Verifikasi password secara langsung
        if ($password === $row['password']) {
            // Jika login berhasil, set sesi
            $_SESSION['user'] = $row['email'];
            header("Location: admin.php"); // Arahkan ke admin.php
            exit();
        } else {
            $error_message = "Email atau password salah.";
        }
    } else {
        $error_message = "Email atau password salah.";
    }
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Tapsit Manejemen</title>
    <!-- Fonts and icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />
  </head>

  <body class="m-0 font-sans antialiased font-normal bg-white text-start text-base leading-default text-slate-500">
   
    <main class="mt-0 transition-all duration-200 ease-soft-in-out">
      <section>
        <div class="relative flex items-center p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
          <div class="container z-10">
            <div class="flex flex-wrap mt-0 -mx-3">
              <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
                <div class="relative flex flex-col min-w-0 mt-32 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
                  <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                    <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">HELLO ADMIN TAPSIT</h3>
                    <p class="mb-0">Enter your email and password to sign in</p>
                  </div>
                  <div class="flex-auto p-6">
                    <!-- Menampilkan error jika ada -->
                    <?php if ($error_message != ''): ?>
                        <p style="color: red;"><?php echo $error_message; ?></p>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
                      <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Email</label>
                      <div class="mb-4">
                        <input type="email" name="email" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Email" aria-label="Email" aria-describedby="email-addon" required />
                      </div>
                      <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Password</label>
                      <div class="mb-4">
                        <input type="password" name="password" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="Password" aria-label="Password" aria-describedby="password-addon" required />
                      </div>
                      <div class="text-center">
                        <button type="submit" class="inline-block w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85">Sign in</button>
                      </div>
                    </form>
                  </div>
                  <div class="p-6 px-1 pt-0 text-center bg-transparent border-t-0 border-t-solid rounded-b-2xl lg:px-2">
                    <p class="mx-auto mb-6 leading-normal text-sm">
                      Mohon Maaf Hanya untuk Karyawan
                      <a href="../pages/sign-up.html" class="relative z-10 font-semibold text-transparent bg-gradient-to-tl from-blue-600 to-cyan-400 bg-clip-text">Sign up</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
                <div class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
                  <div class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10" style="background-image: url('../assets/img/curved-images/coffe.jpg')"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
    <footer class="py-12">
      <div class="container">
        <div class="flex flex-wrap -mx-3">
          <div class="flex-shrink-0 w-full max-w-full mx-auto mb-6 text-center lg:flex-0 lg:w-8/12">
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Company </a>
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> About Us </a>
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Team </a>
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Products </a>
            <a href="javascript:;" target="_blank" class="mb-2 mr-4 text-slate-400 sm:mb-0 xl:mr-12"> Blog </a>
            <a href="javascript:;" target="_blank" class="mb-2 text-slate-400 sm:mb-0"> Pricing </a>
          </div>
        </div>
        <div class="flex flex-wrap -mx-3">
          <div class="w-8/12 max-w-full px-3 mx-auto text-center">
            <p class="mb-0 text-slate-400"> © 2024 Soft by TAPSIT. All Rights Reserved. </p>
          </div>
        </div>
      </div>
    </footer>
    <!--   Core JS Files   -->
    <script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5"></script>
  </body>
</html>
