<?php
include_once 'db.php';

// Cek jika request nya itu POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_mahasiswa = abs((int)$_GET['id_mahasiswa']); // Mengambil nilai 'id_mahasiswa' dari parameter GET dan mengonversi menjadi integer positif
    $stmt = $conn->prepare("DELETE FROM tbl_mahasiswa WHERE id_mahasiswa = :id_mahasiswa"); // Menyiapkan pernyataan SQL untuk menghapus data dari tabel 'tbl_mahasiswa' berdasarkan 'id_mahasiswa'
    $stmt->bindParam(':id_mahasiswa', $id_mahasiswa); // Mengikat nilai 'id_mahasiswa' ke parameter-placeholder ':id_mahasiswa'
    $stmt->execute(); // Menjalankan pernyataan SQL untuk menghapus data dari tabel 'tbl_mahasiswa' berdasarkan 'id_mahasiswa'
    tutupKoneksi($stmt, $conn); // Menutup koneksi database dengan memanggil fungsi 'tutupKoneksi'

} else {
    header('HTTP/1.1 404 Not found'); // Mengirimkan header respons HTTP 404 jika permintaan bukan metode POST
}
