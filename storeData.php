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

    $nim = securityInput($_POST['nim']); // Memanggil fungsi untuk membersihkan dan mengamankan input
    $nama = securityInput($_POST['nama']);
    $jurusan = securityInput($_POST['jurusan']);

    $stmt = $conn->prepare("INSERT INTO tbl_mahasiswa (nim, nama, jurusan) VALUES (:nim, :nama, :jurusan)"); // Menyiapkan pernyataan SQL dengan menggunakan parameter-placeholder
    $stmt->bindParam(':nim', $nim); // Mengikat nilai nim ke parameter-placeholder :nim
    $stmt->bindParam(':nama', $nama); // Mengikat nilai nama ke parameter-placeholder :nama
    $stmt->bindParam(':jurusan', $jurusan); // Mengikat nilai jurusan ke parameter-placeholder :jurusan
    $stmt->execute(); // Menjalankan pernyataan SQL untuk menyimpan data ke database

    tutupKoneksi($stmt, $conn); // Tutup koneksi
} else {
    header('HTTP/1.1 404 Not found'); // Mengirimkan header respons HTTP 404 jika permintaan bukan metode POST
}
