<?= $this->extend('templates/posyandu/index'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= route_to('Imunisasi::index'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Kembali Ke List Imunisasi</a>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <?= form_open('', ['id' => 'form-create-imunisasi']); ?>
                <?= view('imunisasi/_form'); ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    let csrfToken = '<?= csrf_token(); ?>'
    let csrfHash = '<?= csrf_hash(); ?>'

    // $('#form-create-imunisasi input').on('keyup', function() {
    //     $.ajax({
    //         method: 'POST',
    //         url: '<?php //route_to('Imunisasi::validation'); 
                        ?>',
    //         data: {
    //             [csrfToken]: csrfHash,
    //             usia_saat: $('#usia_saat').val(),
    //             tanggal: $('#tanggal').val(),
    //         },
    //         success: function(data) {
    //             if ($('#tanggal').val() == '' || $('#usia_saat').val() == '') {
    //                 $.each(data.errors, function(key, value) {
    //                     $('#' + key).addClass('is-invalid');
    //                     $('#' + key).parents('.form-group').find('#error').addClass('invalid-feedback').html(value)
    //                 })
    //             }
    //         }
    //     })

    //     if ($(this).val() != '') {
    //         $(this).removeClass('is-invalid').addClass('is-valid');
    //         $(this).parents('.form-group').find('#error').removeClass('invalid-feedback').html(' ')
    //     }

    // });

    $('#form-create-imunisasi').on('submit', function(event) {
        event.preventDefault();
        event.stopImmediatePropagation();
        var formId = $('#form-create-imunisasi')[0]
        var formData = new FormData(formId);
        formData.append([csrfToken], csrfHash)

        Swal.fire({
            title: "Apakah ada yakin?",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "Tidak",
            confirmButtonText: "Ya",
            allowOutsideClick: false,
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return $.ajax({
                    method: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.success == true) {
                            Swal.fire({
                                title: "Success",
                                html: data.message,
                                icon: "success"
                            }).then(function() {
                                Swal.hideLoading();
                                window.location = '<?= route_to('Imunisasi::index'); ?>';
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: data.message,
                                icon: "error"
                            });

                            $.each(data.errors, function(key, value) {
                                $('.' + key.replace(/.\d+/g, '')).addClass('is-invalid');
                                $('.' + key.replace(/.\d+/g, '')).parents('.form-group').find('#error').addClass('invalid-feedback').html(value)
                            })
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        Swal.close()
                        var pesan = xhr.status + " " + thrownError + xhr.responseText;
                        alert(pesan)
                    }
                });
            }
        });
    });
</script>
<?= $this->endSection() ?>