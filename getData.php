<?php
include_once 'db.php';

// Select data mahasiswa menggunakan PDO prepare PHP
$stmt = $conn->prepare("SELECT * FROM tbl_mahasiswa");
$stmt->execute();
$data_mahasiswa = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="table-responsive">
    <table class="table table-bordered border-dark">
        <thead>
            <tr>
                <th style="display:none;">Id Mahasiswa</th>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Nama</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Aksi</th>
            </tr>

        </thead>

        <tbody>

            <!-- Init nomor -->
            <?php
            $no = 1;
            ?>

            <!-- Looping data mahasiswa dari database dan tampilkan pada tabel html -->
            <?php foreach ($data_mahasiswa as $data) : ?>

                <?php

                // Variabel tombol delete dan edit
                $button_delete = "<a class='btn btn-danger me-2 deleteData' href='deleteData.php?id_mahasiswa=" . $data['id_mahasiswa'] . "'>Delete</a>";
                $button_update = "<a class='btn btn-warning updateData' data-bs-toggle='modal' data-bs-target='#editMahasiswa' href='updateData.php?id_mahasiswa=" . $data['id_mahasiswa'] . "'>Update</a>";

                ?>

                <tr>
                    <td style="display:none;"><?php echo $data['id_mahasiswa']; ?></td>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['nim']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jurusan']; ?></td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <?php echo "$button_delete $button_update"; ?>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
</div>