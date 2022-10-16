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
                <div class="form-group">
                    <label for="id_anak">Anak</label>
                    <input class="form-control" type="text" id="id_anak" value="<?= $imunisasi->nama_anak; ?>" disabled>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead align="center">
                            <th>No</th>
                            <th>Jenis Imunisasi</th>
                            <th>Bulan Ke-</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody align="center">
                            <?php $no = 1;
                            foreach ($imunisasiDetail as $row) : ?>
                                <tr>
                                    <td class="align-middle"><?= $no++; ?></td>
                                    <td class="align-middle"><?= $row->nama; ?></td>
                                    <td class="align-middle"><?= $row->bulan; ?></td>
                                    <td class="align-middle"><?= $row->tanggal; ?></td>
                                    <td class="align-middle"><textarea class="form-control" disabled><?= $row->keterangan; ?></textarea></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>