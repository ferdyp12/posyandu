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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?= $ibu_hamil->nama; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tinggi_badan">Tinggi Badan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="tinggi_badan" value="<?= $ibu_hamil->tinggi_badan; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Cm</div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="berat_badan">Berat Badan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="berat_badan" value="<?= $ibu_hamil->berat_badan; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Kg</div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lingkar_tangan_atas">Lingkar Tangan Atas</label>
                        <input type="text" class="form-control" id="lingkar_tangan_atas" value="<?= $ibu_hamil->lingkar_tangan_atas; ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="lingkar_perut">Lingkar Perut</label>
                        <input type="text" class="form-control" id="lingkar_perut" value="<?= $ibu_hamil->lingkar_perut; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tekanan_darah">Tekanan Darah</label>
                        <input type="text" class="form-control" id="tekanan_darah" value="<?= $ibu_hamil->tekanan_darah; ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="denyut_jantung_bayi">Denyut Jantung Bayi</label>
                        <input type="text" class="form-control" id="denyut_jantung_bayi" value="<?= $ibu_hamil->denyut_jantung_bayi; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                        <input type="date" class="form-control" id="tanggal_pemeriksaan" value="<?= $ibu_hamil->tanggal_pemeriksaan; ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>