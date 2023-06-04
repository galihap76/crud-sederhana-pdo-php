<?php
include_once 'db.php';

// Cek jika request nya itu POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function securityInput($data)
    {
        $data = trim($data); // Menghapus spasi di awal dan akhir string
        $data = stripslashes($data); // Menghapus karakter backslash (\)
        $data = htmlspecialchars($data); // Mengonversi karakter khusus menjadi entitas HTML
        return $data;
    }

    $id_mahasiswa = securityInput($_POST['id_mahasiswa']); // Mengamankan input data ID mahasiswa
    $nim = securityInput($_POST['nim']); // Mengamankan input data NIM mahasiswa
    $nama = securityInput($_POST['nama']); // Mengamankan input data nama mahasiswa
    $jurusan = securityInput($_POST['jurusan']); // Mengamankan input data jurusan mahasiswa

    $queryUpdate = "UPDATE tbl_mahasiswa SET nim=:nim, nama=:nama, jurusan=:jurusan WHERE id_mahasiswa = :id_mahasiswa"; // Query untuk mengupdate data mahasiswa
    $stmt = $conn->prepare($queryUpdate); // Persiapan statement query
    $stmt->bindParam(':id_mahasiswa', $id_mahasiswa); // Mengikat parameter ID mahasiswa ke statement
    $stmt->bindParam(':nim', $nim); // Mengikat parameter NIM mahasiswa ke statement
    $stmt->bindParam(':nama', $nama); // Mengikat parameter nama mahasiswa ke statement
    $stmt->bindParam(':jurusan', $jurusan); // Mengikat parameter jurusan mahasiswa ke statement
    $stmt->execute(); // Menjalankan statement query
    tutupKoneksi($stmt, $conn); // Menutup koneksi ke database
} else {
    header('HTTP/1.1 404 Not found'); // Mengirimkan header respons HTTP 404 jika permintaan bukan metode POST
}
