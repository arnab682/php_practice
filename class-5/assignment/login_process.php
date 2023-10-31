<?php
session_start();


if (isset($_SESSION['user'])) {
   
    $role = $_SESSION['user']['role'];
    header("Location: role.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $input_email = $_POST['email'];
    $input_password = $_POST['password'];

    
    if (isset($_SESSION['user'])) {
        $stored_email = $_SESSION['user']['email'];
        $stored_password = $_SESSION['user']['password'];

        if ($input_email === $stored_email && password_verify($input_password, $stored_password)) {
            // Successful login
            $role = $_SESSION['user']['role'];
            header("Location: welcome.php");
            exit();
        }
    }
}


echo "Login failed. Please try again.";
?>
