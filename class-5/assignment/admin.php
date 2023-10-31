<?php

	session_start();

	if ($_SESSION['user']['role'] !== 'admin') {
	    header('Location: unauthorized.php');
	    exit();
	}


