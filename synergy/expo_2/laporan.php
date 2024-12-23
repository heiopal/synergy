<?php
include 'koneksi.php'; // Menghubungkan ke database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; // Ambil nama dari input
    $email = $_POST['email']; // Ambil email dari input
    $pesan = $_POST['message']; // Ambil pesan dari input
    $target_dir = "uploads/"; // Direktori untuk menyimpan gambar
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]); // Ganti 'gambar' dengan 'receipt'
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file gambar adalah gambar sebenarnya
    $check = getimagesize($_FILES["gambar"]["tmp_name"]); // Ganti 'gambar' dengan 'receipt'
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        echo "<script>alert('Maaf, file sudah ada.');</script>";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["gambar"]["size"] > 500000) { // Ganti 'gambar' dengan 'receipt'
        echo "Maaf, ukuran file terlalu besar.";
        $uploadOk = 0;
    }

    // Hanya izinkan format tertentu
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
        $uploadOk = 0;
    }

    // Cek apakah $uploadOk diatur ke 0 oleh kesalahan
    if ($uploadOk == 0) {
        echo "Maaf, file tidak dapat diunggah.";
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) { // Ganti 'gambar' dengan 'receipt'
            // Simpan laporan ke database
            $sql = "INSERT INTO laporan (name, pesan, gambar) VALUES ('$name', '$pesan', '$target_file')"; // Simpan nama, pesan, dan gambar
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Laporan berhasil dikirim.'); window.location.href='index.php';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }
    }
}
?>