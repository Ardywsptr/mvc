$(function () {

    $('.tombolTambahData').on('click', function () {
        $('#judulModal').html('Tambah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Tambah Data')
        $('.modal-body form').attr('action', 'http://localhost/wpu/mvc/pertemuan12_update-data/phpmvc/public/mahasiswa/tambah')
        $('.modal-body form input').val('')

    })

    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Ubah Data Mahasiswa')
        $('.modal-footer button[type=submit]').html('Ubah Data')
        $('.modal-body form').attr('action', 'http://localhost/wpu/mvc/pertemuan12_update-data/phpmvc/public/mahasiswa/ubah')

        // ajax
        const id = $(this).data('id')

        $.ajax({
            url: 'http://localhost/wpu/mvc/pertemuan12_update-data/phpmvc/public/mahasiswa/getUbah',
            data: {
                id: id
            },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#nim').val(data.nim);
                $('#email').val(data.email);
                $('#jurusan').val(data.jurusan);
                $('#id').val(data.id);
            }
        })
    })
})