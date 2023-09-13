const flashdata = $('.flash-data').data('flashdata');

if (flashdata) {
    Swal.fire({
        title: 'Data Transaksi',
        text: flashdata,
        icon: 'success',
        showConfirmButton: true
    });
}

const flashPengeluaran = $('.flash-data-pengeluaran').data('flashdata');
if (flashPengeluaran) {
    Swal.fire({
        title: 'Data Transaksi Pengeluaran',
        text: flashPengeluaran,
        icon: 'success',
        showConfirmButton: true
    });
}

const flashdataPaket = $('.flash-data-paket').data('flashdata');
if (flashdataPaket) {
    Swal.fire({
        title: 'Data Paket Cucian',
        text: flashdataPaket,
        icon: 'success',
        showConfirmButton: true
    });
}

const flashPengguna = $('.flash-data-pengguna').data('flashdata');
if (flashPengguna) {
    Swal.fire({
        title: 'Pengguna.',
        text: flashPengguna,
        icon: 'success',
        showConfirmButton: true
    });
}

const flashdataKurang = $('.flash-data-kurang').data('flashdata');
if (flashdataKurang) {
    Swal.fire({
        title: 'Transaksi pembayaran gagal.',
        text: flashdataKurang,
        icon: 'error',
        showConfirmButton: true
    });
}

const flashEditProfile = $('.flash-data-editprofile').data('flashdata');
if (flashEditProfile) {
    Swal.fire({
        title: 'Edit Profile.',
        text: flashEditProfile,
        icon: 'success',
        showConfirmButton: true
    });
}
$('.tombol-hapus').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Anda yakin ingin hapus data ?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});
