<?php
require_once '../connect_db.php';
session_start();

if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $query_sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    
    $result = mysqli_query($conn, $query_sql);

    if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['username'] == $username) {

                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                // $_SESSION['first_name'] = $row['first_name'];
                // $_SESSION['last_name'] = $row['last_name'];


            }
        header("Location: ../index.php");
        exit();
    }else{
        if (empty($username)){
            $_SESSION['error'] = "username harus diisi";
            header("Location: login-page.php");
            exit();
        }else if(empty($password)){
            $_SESSION['error'] = "Password harus diisi";
            header("Location: login-page.php");
            exit();
        }else{
            $_SESSION['error'] = "username atau Password salah";
            header("Location: login-page.php");
		    exit();
        }
    }
}else{
	header("Location: login-page.php");
	exit();
}

?>