<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Crud</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>

    <!-- Main container -->
    <div class="container mt-5">
        <div class="row">
            <div class="col">

                <!-- Tombol tambah mahasiswa -->
                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#tambahMahasiswa">Tambah
                    Mahasiswa</button>
                <!-- </Akhir tombol mahasiswa -->

                <!-- Modal tambah-->
                <div class="modal fade" id="tambahMahasiswa" tabindex="-1" aria-labelledby="tambahMahasiswa" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="tambahMahasiswa">Tambah Mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <!-- Pesan sukses tambah mahasiswa -->
                            <div class="container d-flex align-items-center justify-content-center">
                                <div class="alert-dismissible fade show alert alert-success w-75 text-center mt-3  message_success" style="display:none;" role="alert">
                                    <strong>Data mahasiswa berhasil di tambahkan.</strong>
                                </div>
                            </div>
                            <!-- </Akhir pesan sukses tambah mahasiswa -->

                            <div class="modal-body">

                                <!-- Form tambah mahasiswa -->
                                <form method="post" action="storeData.php" id="form_tambah_mahasiswa">

                                    <div class="mb-3">
                                        <label for="nim" class="form-label">NIM Mahasiswa</label>
                                        <input type="text" class="form-control" id="nim" name="nim" autocomplete="off" maxlength="8" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama Mahasiswa</label>
                                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" required />
                                    </div>

                                    <div class="mb-3">
                                        <label for="jurusan" class="form-label">Jurusan</label>
                                        <input type="text" class="form-control" id="jurusan" name="jurusan" autocomplete="off" required />
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-success" name="submit">Tambah</button>
                                    </div>
                                </form>
                                <!-- Akhir form tambah mahasiswa-->

                            </div>
                        </div>
                    </div>
                </div>
                <!-- </Akhir modal tambah-->

                <!-- Modal edit-->
                <div class="modal fade" id="editMahasiswa" tabindex="-1" aria-labelledby="editMahasiswa" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="editMahasiswa">Edit Mahasiswa</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <!-- Edit modal form -->
                            <div class="modal-body" id="modal-edit"></div>
                            <!-- </Akhir edit modal form -->

                        </div>
                    </div>
                </div>
                <!-- </Akhir modal edit-->

                <!-- Memunculkan data mahasiswa menggunakan AJAX nanti -->
                <div id="mainContent"></div>

            </div>
        </div>
    </div>
    <!-- </Akhir main container -->

    <script src="js/jquery-3.7.0.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>