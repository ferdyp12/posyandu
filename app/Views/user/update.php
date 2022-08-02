<?= $this->extend('templates/posyandu/index'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= route_to('JabatanPetugas::index'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Kembali Ke List Jabatan Petugas</a>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <?= form_open('', ['id' => 'form-update-user']); ?>
                <?= view('jabatan-petugas/_form'); ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $('#nama').val('<?= $jp->nama; ?>')

    let csrfToken = '<?= csrf_token(); ?>'
    let csrfHash = '<?= csrf_hash(); ?>'

    $('#form-update-user input').on('keyup', function() {
        $.ajax({
            method: 'POST',
            url: '<?= route_to('JabatanPetugas::validation'); ?>',
            data: {
                [csrfToken]: csrfHash,
                nama: $('#nama').val()
            },
            success: function(data) {
                if ($('#nama').val() == '') {
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

    $('#form-update-user').on('submit', function(event) {
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
                        nama: $('#nama').val()
                    },
                    success: function(data) {
                        if (data.success == true) {
                            Swal.fire({
                                title: "Success",
                                html: data.message,
                                icon: "success"
                            }).then(function() {
                                Swal.hideLoading();
                                window.location = '<?= route_to('JabatanPetugas::index'); ?>';
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