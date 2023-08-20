<?php

// include config file
include_once 'config.php';

// Create connection
$conn = mysqli_connect($host, $user, $pass, $db);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    echo "Connected successfully";
}

// Set charset
$conn->set_charset("utf8");
