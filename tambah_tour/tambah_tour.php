<?php
require_once '../connect_db.php';
session_start();
$message = ""; // Initializing the message variable
$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validating inputs
    $destination_id = $_POST['destination_id'];
    $tour_name = $_POST['tour_name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $max_capacity = $_POST['max_capacity'];
    $current_capacity = $max_capacity;
    $price = $_POST['price'];
    $description = $_POST['description'];
    $author_id = $_SESSION['user_id'];

    // Check for empty inputs
    if (empty($destination_id) || empty($tour_name) || empty($start_date) || empty($end_date) || empty($max_capacity) || empty($price) || empty($description)) {
        $_SESSION['message'] = "Please fill in all the fields.";
        header("Location: index.php");
        exit();
    } else {
        $targetDir = "./assets/img_tour/";
        $targetFile = $targetDir . basename($_FILES["image_url"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "webp") {
            $_SESSION['message'] = "Sorry, only JPG, JPEG, PNG & webp files are allowed.";
            header("Location: index.php");
            exit();
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            $_SESSION['message'] = "Sorry, your file was not uploaded.";
            header("Location: index.php");
            exit();
        } else {
            if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $targetFile)) {
                $_SESSION['message'] = "The file " . htmlspecialchars(basename($_FILES["image_url"]["name"])) . " has been uploaded.";
            } else {
                $_SESSION['message'] = "Sorry, there was an error uploading your file.";
                // header("Location: index.php");
                // exit();
            }
        }

        $sql = "INSERT INTO tours (destination_id, tour_name, start_date, end_date, max_capacity, current_capacity, price, image_url, description, author_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        $image_url = $targetFile;

        mysqli_stmt_bind_param($stmt, "isssiidssi", $destination_id, $tour_name, $start_date, $end_date, $max_capacity, $current_capacity, $price, $image_url, $description, $author_id);
        $user_id = $_SESSION['user_id'];

        if (mysqli_stmt_execute($stmt)) {
            
            $_SESSION['message'] = "New record added successfully";
            header("Location: index.php");
        } else {
            $_SESSION['message'] = "Error: " . mysqli_error($conn);
            header("Location: index.php");
        }
        $user_id = $_SESSION['user_id'];

        mysqli_stmt_close($stmt);
        // mysqli_close($conn);
    }
}

$user_id = $_SESSION['user_id'];



?>