<?php
// $db = mysqli_connect(
//     $_ENV['DB_HOST'] ?? '',
//     $_ENV['DB_USER'] ?? '', 
//     $_ENV['DB_PASS'] ?? '', 
//     $_ENV['DB_NAME'] ?? ''
// );

// $db = mysqli_connect('localhost', 'root', '', 'devwebcamp');

$host = $_ENV['DB_HOST'];
$user = $_ENV['DB_USER'];
$pass = $_ENV['DB_PASS'];
$basededatos = $_ENV['DB_BD'];

$db = mysqli_connect($host, $user, $pass, $basededatos);
$db->set_charset('utf8');

if (!$db) {
    echo "Error: No se pudo conectar a MySQL.";
    echo "errno de depuración: " . mysqli_connect_errno();
    echo "error de depuración: " . mysqli_connect_error();
    exit;
}
