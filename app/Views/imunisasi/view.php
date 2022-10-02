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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id_anak">Anak</label>
                        <input class="form-control" type="text" id="id_anak" value="<?= $imunisasi->nama_anak; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="id_jenis_imunisasi">Jenis Imunisasi</label>
                        <input class="form-control" type="text" id="id_jenis_imunisasi" value="<?= $imunisasi->nama_imunisasi; ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="usia_saat">Usia</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="usia_saat" value="<?= $imunisasi->usia_saat; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Tahun</div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" value="<?= $imunisasi->tanggal; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" id="keterangan" rows="3" disabled><?= $imunisasi->keterangan; ?></textarea>
                    <div id="error"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>