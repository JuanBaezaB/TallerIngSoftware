<?php

// .env file path
$envFilePath = __DIR__.'/../../.env';

// Load env variables
$env = parse_ini_file($envFilePath);

// Set variables
$host = $env['DB_HOST'];
$user = $env['DB_USER'];
$pass = $env['DB_PASSWORD']; 
$db = $env['DB_NAME'];

?>
