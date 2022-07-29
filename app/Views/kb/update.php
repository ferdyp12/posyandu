<?= $this->extend('templates/posyandu/index'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= route_to('KeluargaBerencana::index'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Kembali Ke List Keluarga Berencana</a>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <?= form_open('', ['id' => 'form-update-kb']); ?>
                <?= view('kb/_form'); ?>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    $('#nama_akseptor').val('<?= $kb->nama_akseptor; ?>')
    $('#tanggal_lahir').val('<?= $kb->tanggal_lahir; ?>')
    $('#nama_suami').val('<?= $kb->nama_suami; ?>')
    $('#alamat').val('<?= $kb->alamat; ?>')
    $('#berat_badan').val('<?= $kb->berat_badan; ?>')
    $('#tinggi_badan').val('<?= $kb->tinggi_badan; ?>')
    $('#tensi').val('<?= $kb->tensi; ?>')
    $('#tanggal').val('<?= $kb->tanggal; ?>')

    let csrfToken = '<?= csrf_token(); ?>'
    let csrfHash = '<?= csrf_hash(); ?>'

    $('#form-update-kb .form-input').on('keyup', function() {
        $.ajax({
            method: 'POST',
            url: '<?= route_to('KeluargaBerencana::validation'); ?>',
            data: {
                [csrfToken]: csrfHash,
                nama_akseptor: $('#nama_akseptor').val(),
                tanggal_lahir: $('#tanggal_lahir').val(),
                nama_suami: $('#nama_suami').val(),
                alamat: $('#alamat').val(),
                berat_badan: $('#berat_badan').val(),
                tinggi_badan: $('#tinggi_badan').val(),
                tensi: $('#tensi').val(),
                tanggal: $('#tanggal').val()
            },
            success: function(data) {
                if ($('#nama_akseptor').val() == '' || $('#tanggal_lahir').val() == '' || $('#nama_suami').val() == '' || $('#alamat').val() == '' || $('#berat_badan').val() || $('#tinggi_badan').val() || $('#tensi').val() || $('#tanggal').val() == '') {
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

    $('#form-update-kb').on('submit', function(event) {
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
                        nama_akseptor: $('#nama_akseptor').val(),
                        tanggal_lahir: $('#tanggal_lahir').val(),
                        nama_suami: $('#nama_suami').val(),
                        alamat: $('#alamat').val(),
                        berat_badan: $('#berat_badan').val(),
                        tinggi_badan: $('#tinggi_badan').val(),
                        tensi: $('#tensi').val(),
                        tanggal: $('#tanggal').val()
                    },
                    success: function(data) {
                        if (data.success == true) {
                            Swal.fire({
                                title: "Success",
                                html: data.message,
                                icon: "success"
                            }).then(function() {
                                Swal.hideLoading();
                                window.location = '<?= route_to('KeluargaBerencana::index'); ?>';
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