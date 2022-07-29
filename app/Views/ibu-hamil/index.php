<?= $this->extend('templates/posyandu/index'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= route_to('IbuHamil::create'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Buat <?= $title; ?></a>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Tinggi Badan</th>
                                <th>Berat Badan</th>
                                <th>Tanggal Pemeriksaan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1 + ($pager->getPerPage() * ($pager->getCurrentPage() - 1));
                            foreach ($ibu_hamil as $row) : ?>
                                <tr>
                                    <th><?= $nomor; ?></th>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->tinggi_badan; ?></td>
                                    <td><?= $row->berat_badan; ?></td>
                                    <td><?= $row->tanggal_pemeriksaan; ?></td>
                                    <td>
                                        <a class="btn-sm btn-info" href="<?= route_to('IbuHamil::show', $row->id_ibu_hamil); ?>" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>
                                        <a class="btn-sm btn-warning" href="<?= route_to('IbuHamil::edit', $row->id_ibu_hamil); ?>" data-toggle="tooltip" title="Update"><i class="fas fa-pen" title="Update"></i></a>
                                        <a data-id="<?= $row->id_ibu_hamil; ?>" class="btn-sm btn-danger delete-anak" href="" data-toggle="tooltip" title="Delete"><i class="fas fa-trash" title="Delete"></i></a>
                                    </td>
                                </tr>
                            <?php $nomor++;
                            endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>

<?= $this->section('script'); ?>
<script>
    let csrfToken = '<?= csrf_token(); ?>'
    let csrfHash = '<?= csrf_hash(); ?>'

    $('.delete-anak').on('click', function(event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        var id_ibu_hamil = $(this).data('id')

        Swal.fire({
            title: "Apakah anda yakin data dihapus?",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "Tidak",
            confirmButtonText: "Ya",
            allowOutsideClick: false,
            showLoaderOnConfirm: true,
            preConfirm: () => {
                return $.ajax({
                    method: "POST",
                    url: '<?= route_to('IbuHamil::delete'); ?>',
                    data: {
                        [csrfToken]: csrfHash,
                        _method: 'DELETE',
                        id_ibu_hamil: id_ibu_hamil
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