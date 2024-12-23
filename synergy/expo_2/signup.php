<?php
// Sertakan file koneksi
require_once 'koneksi.php';

if(isset($_POST['submit'])) {
    // Ambil data dari form
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hash password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    // Query untuk menyimpan data ke tabel users
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    
    // Prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $hashed_password);
    
    if ($stmt->execute()) {
        // Jika berhasil, redirect ke halaman login
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Daftar Akun</title>
    <link rel="stylesheet" href="signup.css">
    </style>
</head>
<body>
    <div class="container">
        <h2 class="fade-in">Daftar Akun Baru</h2>
        <form action="" method="POST">
            <div class="form-group fade-in">
                <label>Username:</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group fade-in">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group fade-in">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit" name="submit" class="btn-submit fade-in">Daftar</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const elements = document.querySelectorAll('.fade-in');
            
            elements.forEach((element, index) => {
                setTimeout(() => {
                    element.classList.add('active');
                }, 200 * index);
            });
        });
    </script>
</body>
</html>

