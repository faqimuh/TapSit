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
    <style>
        /* Importing the "Cave" font from Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Caveat:wght@400;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Caveat', cursive;
            background-color: #1e1e1e;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #333;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.6);
            width: 300px;
            text-align: center;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #ffbf00;
            text-shadow: 2px 2px 4px #000;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1.2rem;
            margin: 10px 0 5px;
            color: #d1c4e9;
        }

        input[type="email"],
        input[type="password"] {
            padding: 10px;
            border: none;
            border-radius: 5px;
            margin-bottom: 15px;
            background-color: #555;
            color: #fff;
            font-size: 1rem;
            outline: none;
            box-shadow: inset 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #bdbdbd;
        }

        button {
            padding: 12px;
            border: none;
            border-radius: 5px;
            background-color: #ffbf00;
            color: #333;
            font-size: 1.1rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-shadow: 1px 1px 3px #000;
        }

        button:hover {
            background-color: #ffd54f;
        }

        /* Adding a stone-like texture */
        .container {
            background: radial-gradient(circle at 20% 20%, #3e3e3e, #1e1e1e);
            border: 2px solid #4a4a4a;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.7), inset 0px 0px 8px rgba(0, 0, 0, 0.6);
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            background-color: #666;
            outline: 2px solid #ffbf00;
        }

        /* Style for message box */
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
        <h1>Change Password</h1>
        <form method="POST" action="" onsubmit="return handleFormSubmit(event)">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <label for="old_password">Old Password:</label>
            <input type="password" id="old_password" name="old_password" placeholder="Enter old password" required>

            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required>

            <button type="submit">Update</button>
        </form>
        <div id="message-box" class="message-box"></div>
    </div>

    <script>
        // JavaScript to show message with animation
        function showMessage(message, type) {
            const messageBox = document.getElementById("message-box");
            messageBox.classList.remove("success", "error");
            messageBox.classList.add(type);
            messageBox.textContent = message;
            messageBox.style.display = "block";
            setTimeout(() => {
                messageBox.style.opacity = "1";
            }, 100); // Slight delay for smooth transition
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

        // Show message if there's any from PHP (initial page load)
        <?php if (!empty($message)) : ?>
            window.onload = function() {
                showMessage(<?php echo json_encode($message); ?>, <?php echo json_encode($message_type); ?>);
            };
        <?php endif; ?>
    </script>
</body>
</html>
