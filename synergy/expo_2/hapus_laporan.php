<?php
include 'koneksi.php'; // Menggunakan koneksi dari file koneksi.php

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Menghapus laporan dari database
    $sql = "DELETE FROM laporan WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Laporan berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}

?>
