<?php
require_once '../connect_db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming the database connection is included or required from another file

    // Function to sanitize input data
    function sanitize_input($data)
    {
        // Remove whitespace from the beginning and end of string
        $data = trim($data);
        // Convert special characters to HTML entities
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = isset($_POST['username']) ? sanitize_input($_POST['username']) : '';
    $email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
    $password = isset($_POST['password']) ? sanitize_input($_POST['password']) : '';
    $first_name = isset($_POST['first_name']) ? sanitize_input($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? sanitize_input($_POST['last_name']) : '';
    $address = isset($_POST['address']) ? sanitize_input($_POST['address']) : '';
    $phone = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : '';

    // Check for empty fields
    if (empty($username) || empty($email) || empty($password) || empty($address) || empty($phone)) {
        $_SESSION['error'] = "lease fill in all required fields.";
        header("Location: register-page.php");
        exit();
    }

    $check_query = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['error'] = "Email or username already exists!";
        header("Location: register-page.php");
        exit();
    }

    $insert_query = "INSERT INTO users (username, email, password, first_name, last_name, address, phone)
                     VALUES ('$username', '$email', '$password', '$first_name', '$last_name', '$address', '$phone')";

    if (mysqli_query($conn, $insert_query)) {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['email'] == $email) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
            }
        }
        $_SESSION['success'] = "Akun berhasil dibuat, silahkan login";
        header("Location: ../index.php");
        return mysqli_affected_rows($conn);
        // Redirect or perform any other action upon successful registration
    } else {
        echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
    }
}
