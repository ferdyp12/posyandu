<?= $this->extend('templates/posyandu/index'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= route_to('Anak::index'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Kembali Ke List Anak</a>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <?= form_open('', ['id' => 'form-update-anak']); ?>
                <?= view('anak/_form'); ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $('#id_ayah').val(<?= $anak->id_ayah; ?>)
    $('#nama').val('<?= $anak->nama; ?>')
    $('#nik').val('<?= $anak->nik; ?>')
    $('#anak_ke').val('<?= $anak->anak_ke; ?>')
    $('#tempat_lahir').val('<?= $anak->tempat_lahir; ?>')
    $('#tanggal_lahir').val('<?= $anak->tanggal_lahir; ?>')
    $('#berat_badan_lahir').val('<?= $anak->berat_badan_lahir; ?>')
    $('#tinggi_badan_lahir').val('<?= $anak->tinggi_badan_lahir; ?>')
    $('#jenis_kelamin').val('<?= $anak->jenis_kelamin; ?>')

    let csrfToken = '<?= csrf_token(); ?>'
    let csrfHash = '<?= csrf_hash(); ?>'

    $('.custom-select').on('change', function() {
        $.ajax({
            method: 'POST',
            url: '<?= route_to('Anak::validation'); ?>',
            data: {
                [csrfToken]: csrfHash,
                id_ayah: $('#id_ayah').val(),
                jenis_kelamin: $('#jenis_kelamin').val()
            },
            success: function(data) {
                if ($('#id_ayah').val() == '' || $('#jenis_kelamin').val() == '') {
                    $.each(data.errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key).parents('.form-group').find('#error').addClass('invalid-feedback').html(value)
                    })
                }
            }
        })

        if ($(this).val() != '') {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $(this).parents('.form-group').find('#error').removeClass('invalid-feedback').html(' ')
        }
    })

    $('#form-update-anak .form-input').on('keyup', function() {
        $.ajax({
            method: 'POST',
            url: '<?= route_to('Anak::validation'); ?>',
            data: {
                [csrfToken]: csrfHash,
                nama: $('#nama').val(),
                nik: $('#nik').val(),
                anak_ke: $('#anak_ke').val(),
                tempat_lahir: $('#tempat_lahir').val(),
                tanggal_lahir: $('#tanggal_lahir').val(),
                berat_badan_lahir: $('#berat_badan_lahir').val(),
                tinggi_badan_lahir: $('#tinggi_badan_lahir').val(),
                jenis_kelamin: $('#jenis_kelamin').val()
            },
            success: function(data) {
                if ($('#nama').val() == '' || $('#nik').val() == '' || $('#anak_ke').val() == '' || $('#tempat_lahir').val() == '' || $('#tanggal_lahir').val() == '' || $('#berat_badan_lahir').val() == '' || $('#tinggi_badan_lahir').val() == '' || $('#jenis_kelamin').val() == '') {
                    $.each(data.errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key).parents('.form-group').find('#error').addClass('invalid-feedback').html(value)
                    })
                }
            }
        })

        if ($(this).val() != '') {
            $(this).removeClass('is-invalid').addClass('is-valid');
            $(this).parents('.form-group').find('#error').removeClass('invalid-feedback').html(' ')
        }

    });

    $('#form-update-anak').on('submit', function(event) {
        event.preventDefault();
        event.stopImmediatePropagation();

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
                    data: {
                        [csrfToken]: csrfHash,
                        _method: 'PUT',
                        nama: $('#nama').val(),
                        nik: $('#nik').val(),
                        anak_ke: $('#anak_ke').val(),
                        id_ayah: $('#id_ayah').val(),
                        tempat_lahir: $('#tempat_lahir').val(),
                        tanggal_lahir: $('#tanggal_lahir').val(),
                        berat_badan_lahir: $('#berat_badan_lahir').val(),
                        tinggi_badan_lahir: $('#tinggi_badan_lahir').val(),
                        jenis_kelamin: $('#jenis_kelamin').val()
                    },
                    success: function(data) {
                        if (data.success == true) {
                            Swal.fire({
                                title: "Success",
                                html: data.message,
                                icon: "success"
                            }).then(function() {
                                Swal.hideLoading();
                                window.location = '<?= route_to('Anak::index'); ?>';
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: data.message,
                                icon: "error"
                            });

                            $('#id_ayah').addClass('is-valid')

                            $.each(data.errors, function(key, value) {
                                $('#' + key).addClass('is-invalid');
                                $('#' + key).parents('.form-group').find('#error').addClass('invalid-feedback').html(value)
                            })
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        var pesan = xhr.status + " " + thrownError + xhr.responseText;
                        alert(pesan)
                    }
                });
            }
        });
    });
</script>
<?= $this->endSection() ?>