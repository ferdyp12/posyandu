<?= $this->extend('templates/posyandu/index'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= route_to('User::create'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Buat <?= $title; ?></a>
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
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nomor = 1 + ($pager->getPerPage() * ($pager->getCurrentPage() - 1));
                            foreach ($user as $row) : ?>
                                <tr>
                                    <th><?= $nomor; ?></th>
                                    <td><?= $row->username; ?></td>
                                    <td>
                                        <a class="btn-sm btn-warning" href="<?= route_to('User::edit', $row->id_user); ?>" data-toggle="tooltip" title="Update"><i class="fas fa-pen" title="Update"></i></a>
                                        <a data-id="<?= $row->id_user; ?>" class="btn-sm btn-danger delete-jp" href="" data-toggle="tooltip" title="Delete"><i class="fas fa-trash" title="Delete"></i></a>
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

    $('.delete-jp').on('click', function(event) {
        event.preventDefault();
        event.stopImmediatePropagation();

        var id_user = $(this).data('id')

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
                    url: '<?= route_to('User::delete'); ?>',
                    data: {
                        [csrfToken]: csrfHash,
                        _method: 'DELETE',
                        id_user: id_user
                    },
                    success: function(data) {
                        if (data.success == true) {
                            Swal.fire({
                                title: "Success",
                                html: data.message,
                                icon: "success"
                            }).then(function() {
                                Swal.hideLoading();
                                window.location = '<?= route_to('User::index'); ?>';
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