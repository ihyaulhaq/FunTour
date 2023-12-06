<?php
require_once '../connect_db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if an image file is selected
    if (!empty($_FILES['image_url']['name'])) {
        $uploadOk = handleImageUpload();
        if ($uploadOk === 1) {
            insertArticleData();
        } else {
            echo $uploadOk; // Display any upload errors
        }
    } else {
        echo "Please select an image file.";
    }
}

function handleImageUpload()
{
    $target_dir = "../assets/img_artikel/"; // Specify your upload directory
    $target_file = $target_dir . basename($_FILES['image_url']['name']);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the image file is an actual image or fake image
    $check = getimagesize($_FILES['image_url']['tmp_name']);
    if ($check !== false) {
       

        // Check file size (limit to 5MB)
        if ($_FILES['image_url']['size'] > 5000000) {
            return "Sorry, the file is too large.";
        }

        // Allow only certain file formats
        $allowedFormats = ["jpg", "png", "jpeg", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            return "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
        }
// :\xampp\htdocs\FunTour\assets\img_artikel
        // If everything is ok, try to upload file
        if (!move_uploaded_file($_FILES['image_url']['tmp_name'], $target_file)) {
            return "Sorry, there was an error uploading your file.";
        }
    } else {
        return "File is not an image.";
    }
    return $uploadOk;
}

function insertArticleData()
{
    global $conn;

    // Retrieve form data
    $title = $_POST['title'];
    $destination_id = $_POST['destination_id'];
    $content = $_POST['description'];

    // Get logged-in user's ID from the session
    $author_id = $_SESSION['user_id'];
    // Get current date for publication_date
    $publication_date = date("Y-m-d"); // Format the date as per your database structure

    // Insert data into the articles table
    $sql_insert = "INSERT INTO articles (destination_id, title, content, author_id, publication_date, image_url) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql_insert);

    if ($stmt) {
        // Bind parameters and execute the statement
        $target_file = "../assets/img_artikel/" . basename($_FILES['image_url']['name']);
        mysqli_stmt_bind_param($stmt, 'isssss', $destination_id, $title, $content, $author_id, $publication_date, $target_file);
        $success = mysqli_stmt_execute($stmt);

        if ($success) {
            // Data inserted successfully
            // echo "Article added successfully!";
            header("Location: index.php");
            exit();
            // Redirect or perform further actions if needed
        } else {
            // Error in inserting data
            echo "Failed to add article. Please try again.";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Failed to prepare the statement.";
    }
}
