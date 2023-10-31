<?php
//User Info
$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

//user info array
$userInfo = ['username' => $username, 'email' => $email, 'password' => $password, 'role' => 'user'];
//user info save in session
session_start();
$_SESSION['user'] = $userInfo; 

header('Location: welcome.php');
