<?php
//all notifikasi from flashdata
if (session()->getFlashdata('pesan')) : ?>
    <script>
        iziToast.success({
            title: 'Berhasil',
            message: '<?= session()->getFlashdata('pesan'); ?>',
            position: 'topRight'
        });
        // Swal.fire({
        //     icon: 'success',
        //     title: 'Berhasil',
        //     text: '<?= session()->getFlashdata('pesan'); ?>',
        //     //time
        //     timer: 2000,
        //     // position: 'top-right',
        //     showConfirmButton: false,
        //     timerProgressBar: true,
        // })
    </script>
<?php elseif (session()->getFlashdata('error')) : ?>
    <script>
        iziToast.error({
            title: 'Gagal',
            message: '<?= session()->getFlashdata('error'); ?>',
            position: 'topRight'
        });
    </script>
<?php endif; ?>