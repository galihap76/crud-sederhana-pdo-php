<?php

// Koneksi database menggunakan PDO PHP
$servername = "localhost";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$servername;dbname=db_mahasiswa", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Tutup koneksi database
function tutupKoneksi($stmt = null, $conn = null)
{ 
    $conn = null;
}
