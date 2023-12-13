$(function () {
  $('.tampilModalTambah').on('click', function () {
    $('#judulModal').html('Tambah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Tambah Data');
    $('.rubahAction').attr('action', 'http://localhost/phpmvc/public/mahasiswa/tambah');

    $('#nama').val('');
    $('#nrp').val('');
    $('#email').val('');
    $('#jurusan').val('');
  });

  $('.tampilModalUbah').on('click', function () {
    $('#judulModal').html('Ubah Data Mahasiswa');
    $('.modal-footer button[type=submit]').html('Ubah Data');
    $('.rubahAction').attr('action', 'http://localhost/phpmvc/public/mahasiswa/update');

    const id = $(this).data('id'); //this ini mksdnya tombol di sini di dalam kurung ini

    $.ajax({
      type: 'post',
      url: 'http://localhost/phpmvc/public/mahasiswa/getDetailUpdate', // saya mau ngambil data ke url mana
      data: { id: id }, //kiri : nama data yang dikirimkan | kanan : isi data
      dataType: 'json',
      success: function (data) {
        // mksdnya data ini adalah ketika berhasil maka dia akan otomatis menerima data,
        // kalau data tersebut mau di kembalikan maka ditangkap di variable data
        $('#id').val(data.id);
        $('#nama').val(data.nama);
        $('#nrp').val(data.nrp);
        $('#email').val(data.email);
        $('#jurusan').val(data.jurusan);
      },
    });
  });
});
