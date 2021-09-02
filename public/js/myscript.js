//Preview saat foto diupload atau ubah
function previewImg() {
    const foto = document.querySelector('#foto');
    const fotoLabel = document.querySelector('.custom-file-label');
    const imgPreview = document.querySelector('.img-preview');

    fotoLabel.textContent = foto.files[0].name;

    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);

    fileFoto.onload = function(e) {
        imgPreview.src = e.target.result;
    }
}

// Sweet Alert 2
const swal = $('.swal').data('swal');
if (swal) {
    Swal.fire({
        title: 'Data berhasil',
        text: swal,
        icon: 'success'
    })
}
$(document).on('click', '.btn-delete', function(e) {
    //hentikan aksi default
    e.preventDefault();
    const href = $(this).attr('href');

    Swal.fire({
        title: 'Apakah anda yakin?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href= href;
        }
    })
})
