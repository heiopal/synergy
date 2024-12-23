<?php
    include 'koneksi.php';
    session_start();

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Query untuk mencari user berdasarkan username saja
        $query = "SELECT * FROM petugas WHERE username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($row = $result->fetch_assoc()) {
            // Verifikasi password menggunakan password_verify
            if(password_verify($password, $row['password'])) {
                // Jika password benar
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $row['id']; // Simpan user_id jika diperlukan
                
                echo "<script>
                    alert('Login berhasil!');
                    window.location.href = 'index.php';
                </script>";
            } else {
                // Jika password salah
                echo "<script>
                    alert('Username atau password salah!');
                </script>";
            }
        } else {
            // Jika username tidak ditemukan
            echo "<script>
                alert('Username atau password salah!');
            </script>";
        }
        
        $stmt->close();
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="box">
        <div class="form">
            <h2>LOGIN</h2>
            <form method="POST" action="">
                <div class="inputBox">
                    <input type="text" name="username" required="required">
                    <span>Username</span>
                    <i></i>
                </div>
                <div class="inputBox">
                    <input type="password" name="password" required="required">
                    <span>Password</span>
                    <i></i>
                </div>
                <input type="submit" name="login" value="Login">
                <div class="links">
                    <p>Belum punya akun? <a href="signup.php">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
