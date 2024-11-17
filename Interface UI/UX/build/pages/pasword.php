<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "TapSit"; // sesuaikan dengan password database Anda
$dbname = "projiot"; // ganti dengan nama database yang sesuai

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = ""; // Variabel untuk menyimpan pesan

// Proses form saat disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $old_password = $_POST["old_password"];
    $new_password = $_POST["new_password"];

    // Validasi email dan password lama
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$old_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update password baru
        $update_sql = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
        
        if ($conn->query($update_sql) === TRUE) {
            $message = "Password successfully updated!";
            $message_type = "success";
        } else {
            $message = "Error updating password: " . $conn->error;
            $message_type = "error";
        }
    } else {
        $message = "Email or old password is incorrect.";
        $message_type = "error";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <!-- Include external CSS (Bootstrap for simplicity) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #222D32;
            font-family: 'Roboto', sans-serif;
        }

        .login-box {
            margin-top: 75px;
            background: #1A2226;
            text-align: center;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.16), 0 3px 6px rgba(0, 0, 0, 0.23);
            padding: 40px;
            border-radius: 8px;
        }

        .login-key {
            height: 100px;
            font-size: 80px;
            line-height: 100px;
            background: -webkit-linear-gradient(#27EF9F, #0DB8DE);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .login-title {
            margin-top: 15px;
            font-size: 30px;
            font-weight: bold;
            color: #ECF0F5;
        }

        .login-form {
            margin-top: 25px;
            text-align: left;
        }

        .form-group {
            margin-bottom: 40px;
        }

        input[type="email"], input[type="password"] {
            background-color: #1A2226;
            border: none;
            border-bottom: 2px solid #0DB8DE;
            font-weight: bold;
            color: #ECF0F5;
            outline: none;
            margin-bottom: 20px;
        }

        .form-control-label {
            font-size: 10px;
            color: #6C6C6C;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .btn-outline-primary {
            border-color: #0DB8DE;
            color: #0DB8DE;
            border-radius: 0px;
            font-weight: bold;
        }

        .btn-outline-primary:hover {
            background-color: #0DB8DE;
            color: #fff;
        }

        .loginbttm {
            padding: 0px;
        }

        .message-box {
            margin-top: 15px;
            padding: 10px;
            border-radius: 5px;
            font-size: 1rem;
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .message-box.success {
            background-color: #4caf50;
            color: #ffffff;
        }

        .message-box.error {
            background-color: #f44336;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
                <div class="col-lg-12 login-key">
                    <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-lg-12 login-title">
                    Change Password
                </div>

                <div class="col-lg-12 login-form">
                    <form method="POST" action="" onsubmit="return handleFormSubmit(event)">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Old Password</label>
                            <input type="password" class="form-control" name="old_password" placeholder="Enter old password" required>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">New Password</label>
                            <input type="password" class="form-control" name="new_password" placeholder="Enter new password" required>
                        </div>

                        <div class="col-lg-12 loginbttm">
                            <div class="col-lg-6 login-btm login-text">
                                <!-- Error Message -->
                                <div id="message-box" class="message-box"></div>
                            </div>
                            <div class="col-lg-6 login-btm login-button">
                                <button type="submit" class="btn btn-outline-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showMessage(message, type) {
            const messageBox = document.getElementById("message-box");
            messageBox.classList.remove("success", "error");
            messageBox.classList.add(type);
            messageBox.textContent = message;
            messageBox.style.display = "block";
            setTimeout(() => {
                messageBox.style.opacity = "1";
            }, 100);
        }

        function handleFormSubmit(event) {
            event.preventDefault();
            const formData = new FormData(event.target);
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    let response = <?php echo json_encode($message); ?>;
                    let responseType = <?php echo json_encode($message_type); ?>;
                    showMessage(response, responseType);
                }
            };
            xhr.send(formData);
        }

        <?php if (!empty($message)) : ?>
            window.onload = function() {
                showMessage(<?php echo json_encode($message); ?>, <?php echo json_encode($message_type); ?>);
            };
        <?php endif; ?>
    </script>
</body>
</html>
