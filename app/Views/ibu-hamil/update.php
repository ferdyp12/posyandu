<?= $this->extend('templates/posyandu/index'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= route_to('IbuHamil::index'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Kembali Ke List Ibu Hamil</a>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <?= form_open('', ['id' => 'form-update-ibuHamil']); ?>
                <?= view('ibu-hamil/_form'); ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $('#nama').val('<?= $ibu_hamil->nama; ?>')
    $('#tinggi_badan').val('<?= $ibu_hamil->tinggi_badan; ?>')
    $('#berat_badan').val('<?= $ibu_hamil->berat_badan; ?>')
    $('#lingkar_tangan_atas').val('<?= $ibu_hamil->lingkar_tangan_atas; ?>')
    $('#lingkar_perut').val('<?= $ibu_hamil->lingkar_perut; ?>')
    $('#tekanan_darah').val('<?= $ibu_hamil->tekanan_darah; ?>')
    $('#denyut_jantung_bayi').val('<?= $ibu_hamil->denyut_jantung_bayi; ?>')
    $('#tanggal_pemeriksaan').val('<?= $ibu_hamil->tanggal_pemeriksaan; ?>')

    let csrfToken = '<?= csrf_token(); ?>'
    let csrfHash = '<?= csrf_hash(); ?>'

    $('#form-update-ibuHamil input').on('keyup', function() {
        $.ajax({
            method: 'POST',
            url: '<?= route_to('IbuHamil::validation'); ?>',
            data: {
                [csrfToken]: csrfHash,
                nama: $('#nama').val(),
                tinggi_badan: $('#tinggi_badan').val(),
                berat_badan: $('#berat_badan').val(),
                lingkar_tangan_atas: $('#lingkar_tangan_atas').val(),
                lingkar_perut: $('#lingkar_perut').val(),
                tekanan_darah: $('#tekanan_darah').val(),
                denyut_jantung_bayi: $('#denyut_jantung_bayi').val(),
                tanggal_pemeriksaan: $('#tanggal_pemeriksaan').val()
            },
            success: function(data) {
                if ($('#nama').val() == '' || $('#tinggi_badan').val() == '' || $('#berat_badan').val() == '' || $('#lingkar_tangan_atas').val() == '' || $('#lingkar_perut').val() || $('#tekanan_darah').val() || $('#denyut_jantung_bayi').val() || $('#tanggal_pemeriksaan').val() == '') {
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

    $('#form-update-ibuHamil').on('submit', function(event) {
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
                        tinggi_badan: $('#tinggi_badan').val(),
                        berat_badan: $('#berat_badan').val(),
                        lingkar_tangan_atas: $('#lingkar_tangan_atas').val(),
                        lingkar_perut: $('#lingkar_perut').val(),
                        tekanan_darah: $('#tekanan_darah').val(),
                        denyut_jantung_bayi: $('#denyut_jantung_bayi').val(),
                        tanggal_pemeriksaan: $('#tanggal_pemeriksaan').val()
                    },
                    success: function(data) {
                        if (data.success == true) {
                            Swal.fire({
                                title: "Success",
                                html: data.message,
                                icon: "success"
                            }).then(function() {
                                Swal.hideLoading();
                                window.location = '<?= route_to('IbuHamil::index'); ?>';
                            });
                        } else {
                            Swal.fire({
                                title: "Gagal",
                                html: data.message,
                                icon: "error"
                            });

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