$(document).ready(function() {
    getData(); // Memanggil fungsi getData saat dokumen selesai dimuat

    $('#form_tambah_mahasiswa').on('submit', function(e) {
        e.preventDefault(); // Mencegah perilaku default saat form disubmit

        $.ajax({
            type: $(this).attr('method'), // Mendapatkan metode form (POST/GET)
            url: $(this).attr('action'), // Mendapatkan URL aksi form
            data: $(this).serialize(), // Mengambil data form yang di-serialize
            success: function() {
                getData(); // Memanggil fungsi getData setelah data berhasil ditambahkan
                $('.message_success').show(); // Menampilkan elemen dengan class 'message_success'
                $('[type=text]').val(''); // Mengosongkan input dengan tipe 'text'

                setTimeout(function() {
                    $('.message_success').hide(); // Menghilangkan elemen dengan class 'message_success' setelah 1500ms (1,5 detik)
                }, 1500);
            }
        });
    });

    function getData() {
        $.ajax({
            type: "GET",
            url: "getData.php",
            success: function(data) {
                $('#mainContent').html(data); // Memperbarui elemen dengan id 'mainContent' dengan data yang diterima dari getData.php

                $('.deleteData').click(function(e) {
                    if (confirm('Apakah Anda yakin untuk menghapus data mahasiswa?') == true) {
                        e.preventDefault(); // Mencegah perilaku default saat tombol diklik

                        $.ajax({
                            type: 'post',
                            url: $(this).attr('href'), // Mendapatkan URL aksi saat tombol diklik
                            success: function() {
                                getData(); // Memanggil fungsi getData setelah data berhasil dihapus
                            }
                        });
                    } else {
                        e.preventDefault(); // Mencegah perilaku default saat tombol diklik
                    }
                });
            }
        });
    }

    $('#editMahasiswa').modal({
        keyboard: true,
        backdrop: "static",
        show: false,
    }).on("show.bs.modal", function(event) {
        let button = $(event.relatedTarget); // Mendapatkan elemen yang memicu acara "show.bs.modal"
        let id_mahasiswa = $(event.relatedTarget).closest("tr").find("td:eq(0)").text(); // Mendapatkan ID mahasiswa dari elemen terkait
        let nim = $(event.relatedTarget).closest("tr").find("td:eq(2)").text(); // Mendapatkan NIM mahasiswa dari elemen terkait
        let nama = $(event.relatedTarget).closest("tr").find("td:eq(3)").text(); // Mendapatkan nama mahasiswa dari elemen terkait
        let jurusan = $(event.relatedTarget).closest("tr").find("td:eq(4)").text(); // Mendapatkan jurusan mahasiswa dari elemen terkait

        $(this).find('#modal-edit').html($(`<!-- Form edit -->
    <form method="post" action="updateData.php" id="form_edit_mahasiswa">
        <!-- Pesan sukses edit mahasiswa -->
        <div class="container d-flex align-items-center justify-content-center">
            <div class="alert-dismissible fade show alert alert-success w-75 text-center mt-3 edit_success" style="display:none;" role="alert">
                <strong>Data mahasiswa berhasil di edit.</strong>
            </div>
        </div>
        <!-- </Akhir pesan sukses edit mahasiswa -->

        <div class="mb-3">
            <label for="id_mahasiswa" class="form-label d-none">Id Mahasiswa</label>
            <input type="text" class="form-control d-none" id="id_mahasiswa" name="id_mahasiswa" autocomplete='off' value="${id_mahasiswa}" required/>
        </div>

        <div class="mb-3">
            <label for="nim" class="form-label">NIM Mahasiswa</label>
            <input type="text" class="form-control" id="nim" name="nim" maxlength="8" autocomplete='off' value="${nim}" required/>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Mahasiswa</label>
            <input type="text" class="form-control" id="nama" name="nama" autocomplete='off' value="${nama}" required/>
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" autocomplete='off' value="${jurusan}" required/>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-warning" name="edit" id="edit">Edit</button>
        </div>
    </form>
    <!-- </Akhir form edit -->`));

        $('#form_edit_mahasiswa').on('submit', function(e) {
            e.preventDefault(); // Mencegah perilaku default saat form disubmit

            $.ajax({
                type: 'POST',
                data: $(this).serialize(), // Mengambil data form yang di-serialize
                url: $(this).attr('action'), // Mendapatkan URL aksi form
                success: function() {
                    getData(); // Memanggil fungsi getData setelah data berhasil diubah
                    $('.edit_success').show(); // Menampilkan elemen dengan class 'edit_success'
                    $('[type=text]').val(''); // Mengosongkan input dengan tipe 'text'

                    setTimeout(function() {
                        $('.edit_success').hide(); // Menghilangkan elemen dengan class 'edit_success' setelah 1500ms (1,5 detik)
                    }, 1500);
                }
            });
        });
    });
});