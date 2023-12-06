<?php
require_once '../connect_db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tour_id = $_POST['tour_id'];
    $tour_name = $_POST['tour_name'];
    $max_capacity = $_POST['max_capacity'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $price = $_POST['price'];
    // Retrieve other fields if needed

    $query = "UPDATE tours SET tour_name = '$tour_name', start_date = '$start_date', end_date = '$end_date', max_capacity = '$max_capacity', price = '$price' WHERE tour_id = '$tour_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to the page where the tours are listed
        $_SESSION['berhasil'] = "<script>alert('berhasil mengedit tour')</script>";
        header("Location: index.php");
        exit;
    } else {
        echo "Update failed";
    }
}
?>
