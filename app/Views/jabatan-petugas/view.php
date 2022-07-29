<?= $this->extend('templates/posyandu/index'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= route_to('Timbang::index'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Kembali Ke Timbang</a>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id_anak">Anak</label>
                        <input type="text" class="form-control" id="id_anak" value="<?= $timbang->nama_anak; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" value="<?= $timbang->tanggal; ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="berat_badan">Berat Badan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="berat_badan" value="<?= $timbang->berat_badan; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Kg</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tinggi_badan">Tinggi Badan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="tinggi_badan" value="<?= $timbang->tinggi_badan; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Cm</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" rows="3" id="keterangan" disabled><?= $timbang->keterangan; ?></textarea>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>