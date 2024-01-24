<?php
require_once '../connect_db.php';
session_start();

if (isset($_POST['reservasi'])) {
    $user_id = $_SESSION['user_id'];
    $tour_id = $_POST['tour_id'];
    $price = $_POST['price'];
    $tanggal_beli = $_POST['tanggal_beli'];
    $jumlah_beli = $_POST['hidden_quantity'];

    // Calculate total price
    $total_harga = $price * $jumlah_beli;

    // Store the data in your database (adjust table and column names accordingly)
    $insertQuery = "INSERT INTO tourists (user_id, tour_id, tanggal_beli, jumlah_beli, total_harga) VALUES ('$user_id', '$tour_id', '$tanggal_beli', '$jumlah_beli', '$total_harga')";

    $updateQuery = "UPDATE tours 
    SET current_capacity = current_capacity + '$jumlah_beli' 
    WHERE tour_id = '$tour_id'";

    if (mysqli_query($conn, $insertQuery)) {
        mysqli_query($conn, $updateQuery);
        // Redirect or show success message\
        echo "bisa";
        $_SESSION['berhasil_reservasi'] = "<script>alert('berhasil menambahkan reservasi')</script>";
        header("Location: ../tour/tour_details.php?id=$tour_id");
        exit();

    } else {
        // Handle error
        echo "g bisa";
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
} else {
    // Handle invalid form submission
    echo "Invalid request";
}
