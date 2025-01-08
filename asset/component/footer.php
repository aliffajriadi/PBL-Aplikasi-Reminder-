</div>
</div>
</div>


<!-- bagian yang tidak langsung muncul di web -->
<!-- pada footer menyimpan modal untuk melakukan input data dan melakukan edit data -->


<!-- modal input catatan -->
<div class="modal fade" id="modal_catatan" tabindex="1" aria-labelledby="modal_catatan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_catatan_label">Input Catatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>

            <form action="../config/catatan/input_catatan.php" method="POST">

                <div class="modal-body">
                    <label for="catatan_judul" class="form-label">Judul</label>
                    <input type="text" name="catatan_judul" id="catatan_judul" class="form-control">

                    <label for="catatan_isi" class="form-label">Isi</label>
                    <textarea name="catatan_isi" id="catatan_isi" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- modal input tugas -->
<div class="modal fade" id="modal_tugas" tabindex="1" aria-labelledby="modal_tugas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_catatan_label">Input Tugas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>

            <form action="../config/tugas/input_tugas.php" method="POST">

                <div class="modal-body">
                    <label for="judul_tugas" class="form-label">Judul</label>
                    <input type="text" name="judul_tugas" id="judul_tugas" class="form-control">

                    <label for="tanggal_pengingat" class="form-label">Hari tenggat</label>
                    <input type="date" name="tanggal_pengingat" id="tanggal_pengingat" class="form-control">

                    <label for="waktu_pengingat" class="form-label">Jam tenggat</label>
                    <input type="time" name="waktu_pengingat" id="waktu_pengingat" class="form-control">

                    <label for="isi_tugas" class="form-label">Isi</label>
                    <textarea name="isi_tugas" id="isi_tugas" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal Input Jadwal -->
<div class="modal fade" id="modal_jadwal" tabindex="-1" aria-labelledby="modal_jadwal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_catatan_label">Input Jadwal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>

            <form action="../config/jadwal/input_jadwal.php" method="POST">
                <div class="modal-body">
                    <label for="judul_jadwal" class="form-label">Judul</label>
                    <input type="text" name="judul_jadwal" id="judul_jadwal" class="form-control" required>

                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>

                    <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir" class="form-control" required>

                    <label for="waktu_pengingat">Waktu</label>
                    <input type="time" name="waktu_pengingat" id="waktu_pengingat" class="form-control" required>

                    <label for="hari_melakukan">Dilakukan Pada Hari</label>
                    <div>
                        <!-- Checkbox for Days -->
                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" id="senin_input" name="list_hari[0]" class="form-check-input">
                            <label for="senin_input">Senin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" id="selasa_input" name="list_hari[1]" class="form-check-input">
                            <label for="selasa_input">Selasa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" id="rabu_input" name="list_hari[2]" class="form-check-input">
                            <label for="rabu_input">Rabu</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" id="kamis_input" name="list_hari[3]" class="form-check-input">
                            <label for="kamis_input">Kamis</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" id="jumat_input" name="list_hari[4]" class="form-check-input">
                            <label for="jumat_input">Jumat</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" id="sabtu_input" name="list_hari[5]" class="form-check-input">
                            <label for="sabtu_input">Sabtu</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" id="minggu_input" name="list_hari[6]" class="form-check-input">
                            <label for="minggu_input">Minggu</label>
                        </div>
                    </div>

                    <div>
                        <label for="isi_jadwal" class="form-label">Isi</label>
                        <textarea name="isi_jadwal" id="isi_jadwal" class="form-control"></textarea>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- modal input tantangan murid -->

<div class="modal fade" id="modal_tantangan_murid" tabindex="1" aria-labelledby="modal_tantangan_murid" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_catatan_label">Input Kode Tantangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>

            <form action="../config/tantangan/input_tantangan_murid.php" method="POST">

                <div class="modal-body">
                    <label for="kode_tantangan" class="form-label">Masukkan kode tantangan</label>
                    <input type="text" name="kode_tantangan" id="kode_tantangan" class="form-control">
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>


        </div>
    </div>
</div>


<!-- modal input tantangan guru -->

<div class="modal fade" id="modal_tantangan_guru" tabindex="1" aria-labelledby="modal_tantangan_guru" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_tantangan_label">Membuat tantangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>

            <form action="../config/tantangan/input_tantangan_guru.php" method="POST">

                <div class="modal-body">
                    <label for="judul_tantangan" class="form-label">Judul</label>
                    <input type="text" name="judul_tantangan" id="judul_tantangan" class="form-control">

                    <label for="t_tanggal_pengingat" class="form-label">Hari tenggat</label>
                    <input type="date" name="tanggal_pengingat" id="t_tanggal_pengingat" class="form-control">

                    <label for="tg_waktu_pengingat" class="form-label">Jam tenggat</label>
                    <input type="time" name="waktu_pengingat" id="tg_waktu_pengingat" class="form-control">

                    <label for="isi_tantangan" class="form-label">Isi</label>
                    <textarea name="isi_tantangan" id="isi_tantangan" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>

        </div>
    </div>
</div>


<!-- MODAL UNTUK EDIT -->

<!-- modal edit catatan -->
<div class="modal fade" id="modal_edit_catatan" tabindex="1" aria-labelledby="modal_catatan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <input type="hidden" name="id_catatan">

            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_catatan_label">Edit Catatan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>

            <form action="../config/catatan/edit_catatan.php" method="POST">

                <div class="modal-body">
                    <input type="hidden" name="id_catatan" id="edit_id_catatan">

                    <label for="catatan_judul" class="form-label">Judul</label>
                    <input type="text" name="judul_catatan" id="edit_judul_catatan" class="form-control">

                    <label for="catatan_isi" class="form-label">Isi</label>
                    <textarea name="isi_catatan" id="edit_isi_catatan" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- modal edit tugas -->
<div class="modal fade" id="modal_edit_tugas" tabindex="1" aria-labelledby="modal_tugas" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="tugas_label">Edit Tugas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>

            <form action="../config/tugas/edit_tugas.php" method="POST">

                <div class="modal-body">
                    <input type="hidden" name="id_tugas" id="edit_id_tugas">

                    <label for="edit_judul_tugas" class="form-label">Judul</label>
                    <input type="text" name="edit_judul_tugas" id="edit_judul_tugas" class="form-control">

                    <label for="status_tugas" class="form-label">Status</label>
                    <select class="form-select" name="status_tugas" id="status_tugas">
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="1">Selesai</option>
                        <option value="0">Belum Selesai</option>
                    </select>

                    <label for="edit_tanggal_pengingat" class="form-label">Hari tenggat</label>
                    <input type="date" name="edit_tanggal_pengingat" id="edit_tanggal_pengingat" class="form-control">

                    <label for="edit_waktu_pengingat" class="form-label">Jam tenggat</label>
                    <input type="time" name="edit_waktu_pengingat" id="edit_waktu_pengingat" class="form-control">

                    <label for="edit_isi_tugas" class="form-label">Isi</label>
                    <textarea name="edit_isi_tugas" id="edit_isi_tugas" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- modal edit jadwal -->
<div class="modal fade" id="modal_edit_jadwal" tabindex="1" aria-labelledby="modal_jadwal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_catatan_label">Edit jadwal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>

            <form action="../config/jadwal/edit_jadwal.php" method="POST">

                <div class="modal-body">
                    <input type="hidden" name="edit_id_jadwal" id="edit_id_jadwal">

                    <label for="edit_judul_jadwal" class="form-label">Judul</label>
                    <input type="text" name="edit_judul_jadwal" id="edit_judul_jadwal" class="form-control">

                    <label for="edit_tanggal_mulai" class="form-label">Tanggal mulai</label>
                    <input type="date" name="edit_tanggal_mulai" id="edit_tanggal_mulai" class="form-control">

                    <label for="edit_tanggal_berakhir" class="form-label">Tanggal berakhir</label>
                    <input type="date" name="edit_tanggal_berakhir" id="edit_tanggal_berakhir" class="form-control">

                    <label for="edit_waktu_pengingat_jadwal">Waktu</label>
                    <input type="time" name="edit_waktu_pengingat" id="edit_waktu_pengingat_jadwal" class="form-control">

                    <label for="hari_melakukan">dilakukan pada hari</label>

                    <div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" name="list_hari[0]" id="senin_edit" class="form-check-input">
                            <label for="senin_edit">Senin</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" name="list_hari[1]" id="selasa_edit" class="form-check-input">
                            <label for="selasa_edit">Selasa</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" name="list_hari[2]" id="rabu_edit" class="form-check-input">
                            <label for="rabu_edit">Rabu</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" name="list_hari[3]" id="kamis_edit" class="form-check-input">
                            <label for="kamis_edit">Kamis</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" name="list_hari[4]" id="jumat_edit" class="form-check-input">
                            <label for="jumat_edit">Jumat</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" name="list_hari[5]" id="sabtu_edit" class="form-check-input">
                            <label for="sabtu_edit">Sabtu</label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input type="checkbox" value="1" name="list_hari[6]" id="minggu_edit" class="form-check-input">
                            <label for="minggu_edit">Minggu</label>
                        </div>
                    </div>


                    <label for="edit_isi_jadwal" class="form-label">Isi</label>
                    <textarea name="edit_isi_jadwal" id="edit_isi_jadwal" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>


        </div>
    </div>
</div>


<!-- Modal Pengumpulan tantangan -->
<div class="modal fade" id="modalPengumpulan" tabindex="-1" aria-labelledby="modalPengumpulanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPengumpulanLabel">Pengumpulan Tantangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="pengumpulan.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">Pilih File</label>
                        <input class="form-control" type="file" id="file" name="file" required>
                    </div>
                    <!-- Input tersembunyi untuk ID Tantangan -->
                    <input type="hidden" name="id_tantangan" value="">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Kirim Pengumpulan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal edit tantangan guru -->

<div class="modal fade" id="modal_edit_tantangan" tabindex="1" aria-labelledby="modal_edit_tantangan_guru" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_edit_tantangan_label">Membuat tantangan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
            </div>

            <form action="../config/tantangan/edit_tantangan_guru.php" method="POST">

                <div class="modal-body">
                    <input type="hidden" name="id_tantangan" id="edit_id_tantangan">

                    <label for="edit_judul_tantangan" class="form-label">Judul</label>
                    <input type="text" name="edit_judul_tantangan" id="edit_judul_tantangan" class="form-control">

                    <label for="et_tanggal_pengingat" class="form-label">Hari tenggat</label>
                    <input type="date" name="tanggal_pengingat" id="et_tanggal_pengingat" class="form-control">

                    <label for="et_waktu_pengingat" class="form-label">Jam tenggat</label>
                    <input type="time" name="waktu_pengingat" id="et_waktu_pengingat" class="form-control">

                    <label for="edit_isi_tantangan" class="form-label">Isi</label>
                    <textarea name="edit_isi_tantangan" id="edit_isi_tantangan" class="form-control"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Modal untuk Menambah Nilai -->
<div class="modal fade" id="editDataModal" tabindex="-1" aria-labelledby="editDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="../config/tantangan/tambah_nilai.php"> <!-- Ganti dengan path handler Anda -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editDataModalLabel">Tambah Nilai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nilaiInput" class="form-label">Masukkan Nilai</label>
                        <input type="number" class="form-control" id="nilaiInput" name="nilai" placeholder="Masukkan Nilai" required>
                    </div>
                    <!-- Menyimpan ID Pengguna dan ID Tantangan -->
                    <input type="hidden" id="userId" name="user_id"> <!-- ID pengguna -->
                    <input type="hidden" id="tantanganId" name="id_tantangan"> <!-- ID tantangan -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Nilai</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

<script>
    // modal nya bekerja dengan memgambil data yang diberikan dari atribut data pada buttonnya 
    // lalu value dari atribut tersebut dioperkan ke modal untuk melakukan edit data


    // untuk edit catatan
    document.addEventListener('DOMContentLoaded', function() {
        const edit_buttons = document.querySelectorAll('.edit-catatan');
        edit_buttons.forEach(button => {
            button.addEventListener('click', function() {
                const id_catatan = this.getAttribute('data-id-catatan');
                const judul_catatan = this.getAttribute('data-judul-catatan');
                const isi_catatan = this.getAttribute('data-isi-catatan');

                document.getElementById('edit_id_catatan').value = id_catatan;
                document.getElementById('edit_judul_catatan').value = judul_catatan;
                document.getElementById('edit_isi_catatan').value = isi_catatan;
            })
        });
    });

    
    // untuk edit tugas
    document.addEventListener('DOMContentLoaded', function() {
        const edit_buttons = document.querySelectorAll('.edit-tugas');
        edit_buttons.forEach(button => {
            button.addEventListener('click', function() {
                const id_tugas = this.getAttribute('data-id-tugas');
                const judul_tugas = this.getAttribute('data-judul-tugas');
                const tanggal_pengingat = this.getAttribute('data-tanggal-pengingat');
                const waktu_pengingat = this.getAttribute('data-waktu-pengingat');
                const isi_tugas = this.getAttribute('data-isi-tugas');

                document.getElementById('edit_id_tugas').value = id_tugas;
                document.getElementById('edit_judul_tugas').value = judul_tugas;
                document.getElementById('edit_tanggal_pengingat').value = tanggal_pengingat;
                document.getElementById('edit_waktu_pengingat').value = waktu_pengingat;
                document.getElementById('edit_isi_tugas').value = isi_tugas;
            });
        });
    });


    // untuk edit jadwal
    document.addEventListener('DOMContentLoaded', function() {
        const edit_buttons = document.querySelectorAll('.edit-jadwal');
        edit_buttons.forEach(button => {
            button.addEventListener('click', function() {
                const id_jadwal = this.getAttribute('data-id-jadwal');
                const judul_jadwal = this.getAttribute('data-judul-jadwal');
                const isi_jadwal = this.getAttribute('data-isi-jadwal');
                const tanggal_mulai = this.getAttribute('data-tanggal-mulai');
                const tanggal_selesai = this.getAttribute('data-tanggal-selesai');
                const waktu_pengingat = this.getAttribute('data-waktu-pengingat-jadwal');

                const senin = this.getAttribute('data-senin');
                const selasa = this.getAttribute('data-selasa');
                const rabu = this.getAttribute('data-rabu');
                const kamis = this.getAttribute('data-kamis');
                const jumat = this.getAttribute('data-jumat');
                const sabtu = this.getAttribute('data-sabtu');
                const minggu = this.getAttribute('data-minggu');

                document.getElementById('edit_id_jadwal').value = id_jadwal;
                document.getElementById('edit_judul_jadwal').value = judul_jadwal;
                document.getElementById('edit_isi_jadwal').value = isi_jadwal;
                document.getElementById('edit_tanggal_mulai').value = tanggal_mulai;
                document.getElementById('edit_tanggal_berakhir').value = tanggal_selesai;
                document.getElementById('edit_waktu_pengingat_jadwal').value = waktu_pengingat;
                document.getElementById('senin_edit').checked = senin == 1 ? true : false;
                document.getElementById('selasa_edit').checked = selasa == 1 ? true : false;
                document.getElementById('rabu_edit').checked = rabu == 1 ? true : false;
                document.getElementById('kamis_edit').checked = kamis == 1 ? true : false;
                document.getElementById('jumat_edit').checked = jumat == 1 ? true : false;
                document.getElementById('sabtu_edit').checked = sabtu == 1 ? true : false;
                document.getElementById('minggu_edit').checked = minggu == 1 ? true : false;

            })
        });
    });

    // untuk edit tugas
    document.addEventListener('DOMContentLoaded', function() {
        const edit_buttons = document.querySelectorAll('.edit-tantangan');
        edit_buttons.forEach(button => {
            button.addEventListener('click', function() {
                const id_tantangan = this.getAttribute('data-id-tantangan');
                const judul_tantangan = this.getAttribute('data-judul-tantangan');
                const tanggal_pengingat = this.getAttribute('data-tanggal-pengingat');
                const waktu_pengingat = this.getAttribute('data-waktu-pengingat');
                const isi_tantangan = this.getAttribute('data-isi-tantangan');

                document.getElementById('edit_id_tantangan').value = id_tantangan;
                document.getElementById('edit_judul_tantangan').value = judul_tantangan;
                document.getElementById('et_tanggal_pengingat').value = tanggal_pengingat;
                document.getElementById('et_waktu_pengingat').value = waktu_pengingat;
                document.getElementById('edit_isi_tantangan').value = isi_tantangan;
            });
        });
    });

    function setIdTantangan(id) {
        // Setel nilai ID tantangan ke input tersembunyi dalam modal
        document.querySelector('#modalPengumpulan input[name="id_tantangan"]').value = id;
    }

    // nambah nilai di tantanan
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil elemen modal dan input yang akan diubah
        const modal = document.getElementById('editDataModal');
        const userIdInput = document.getElementById('userId');
        const tantanganIdInput = document.getElementById('tantanganId');

        // Menambahkan event listener untuk semua tombol dengan class 'edit-data-btn'
        document.querySelectorAll('.edit-data-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Ambil ID pengguna dan ID tantangan dari data-id-user dan data-id-tantangan
                const userId = this.getAttribute('data-id-user');
                const tantanganId = this.getAttribute('data-id-tantangan');

                // Isi input hidden dengan ID pengguna dan ID tantangan tersebut
                userIdInput.value = userId;
                tantanganIdInput.value = tantanganId;
            });
        });
    });
</script>

</body>

</html>