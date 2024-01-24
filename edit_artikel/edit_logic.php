<?php
require_once '../connect_db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $article_id = $_POST['article_id'];
    $title = $_POST['title'];
    $destination_id = $_POST['destination_id'];
    $content = $_POST['content'];
    
    // Retrieve other fields if needed

    $query = "UPDATE articles SET title = '$title', destination_id = '$destination_id', content = '$content' WHERE article_id = '$article_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to the page where the tours are listed
        $_SESSION['berhasil_artikel'] = "<script>alert('berhasil mengedit artikel')</script>";
        header("Location: index.php");
        exit;
    } else {
        echo "Update failed";
    }
}
?>
