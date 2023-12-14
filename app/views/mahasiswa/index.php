<div class="container">
    <h1 class="mt-3"><?= $data['judul'] ?></h1>

    <!--  Flash massage  -->
    <div class="row">
        <div class="col-lg-6">
            <?= Flaser::flash() ?>
        </div>
    </div>



    <div class="row mb-3">
        <div class="col-lg-6">
            <h3><?= $data['judul'] ?></h3>


            <!-- Button trigger modal -->
            <div class="d-flex flex-row-reverse mb-2">
                <button type="button" class="btn btn-primary tampilModalTambah" data-toggle="modal" data-target="#formModal">
                    Tambah Data Mahasiswa
                </button>
            </div>

            <div class="row mb-2 col-7">
                <form action="<?= BASEURL ?>/mahasiswa/search" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search" name="keywordSearch" id="keywordSearch" autocomplete="off">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="tombolSearch">Search</button>
                        </div>
                    </div>
                </form>
            </div>




            <ul class="list-group">
                <?php foreach ($data['mhs'] as $mhs) :   ?>
                    <li class="list-group-item ">
                        <?= $mhs['nama']; ?>


                        <a href="<?= BASEURL ?>/mahasiswa/delete/<?= $mhs['id'] ?>" class="badge badge-danger float-right ml-2 delete-link" data-id="<?= $mhs['id'] ?>">Delete</a>

                        <a href="<?= BASEURL ?>/mahasiswa/update/<?= $mhs['id'] ?>" class="badge badge-success float-right ml-2 tampilModalUbah" data-toggle="modal" data-target="#formModal" data-id="<?= $mhs['id'] ?>">Update</a>
                        <a href="<?= BASEURL ?>/mahasiswa/detail/<?= $mhs['id'] ?>" class="badge badge-primary float-right ">Detail</a>

                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>


</div>


<!-- Modal Tambah -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tamabah Data Mahasiswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= BASEURL ?>/mahasiswa/tambah" method="post" class="rubahAction">
                <input type="hidden" name="id" id="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa">
                    </div>
                    <div class="form-group">
                        <label for="nrp">NRP</label>
                        <input type="number" class="form-control" id="nrp" name="nrp" placeholder="NRP">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" id="jurusan" name="jurusan">
                            <option value="">--Pilih Jurusan--</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Teknik Industri">Teknik Industri</option>
                            <option value="Teknik Pangan">Teknik Pangan</option>
                            <option value="Teknik Elektro">Teknik Elektro</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.delete-link').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            const id = this.getAttribute('data-id');

            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus data ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke halaman delete dengan id yang sesuai
                    window.location.href = `<?= BASEURL ?>/mahasiswa/delete/${id}`;
                }
            });
        });
    });
</script>