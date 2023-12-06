<?php
require_once '../connect_db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tour_id'])) {
    $tour_id = $_POST['tour_id'];
    

    // Hapus terlebih dahulu data terkait dari tabel lain (misalnya reviews) jika ada
    $delete_reviews_query = "DELETE FROM reviews WHERE tour_id = '$tour_id'";
    $delete_reviews_result = mysqli_query($conn, $delete_reviews_query);

    // Hapus data dari tabel tourists jika ada
    $delete_tourists_query = "DELETE FROM tourists WHERE tour_id = '$tour_id'";
    $delete_tourists_result = mysqli_query($conn, $delete_tourists_query);

    // Setelah menghapus data terkait, baru hapus tur dari tabel tours
    $delete_query = "DELETE FROM tours WHERE tour_id = '$tour_id'";
    $delete_result = mysqli_query($conn, $delete_query);

 
    if ($delete_result) {
        // Redirect ke halaman tour setelah berhasil hapus
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal melakukan penghapusan.";
    }
} else {
    echo "Permintaan tidak valid.";
    exit();
}
