<?php
require_once '../connect_db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['article_id'])) {
    $article_id = $_POST['article_id'];

    // Setelah menghapus data terkait, baru hapus tur dari tabel tours
    $delete_query = "DELETE FROM articles WHERE article_id = '$article_id'";
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
