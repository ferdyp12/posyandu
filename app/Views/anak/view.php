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
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_anak">Nama Anak</label>
                        <input type="text" class="form-control" id="nama_anak" value="<?= $anak->nama_anak; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nik_anak">NIK Anak</label>
                        <input type="text" class="form-control" id="nik_anak" value="<?= $anak->nik_anak; ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="id_ayah">Ayah</label>
                        <input type="text" class="form-control" id="id_ayah" value="<?= $anak->id_ayah; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" value="<?= $anak->tempat_lahir; ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tgl_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" value="<?= $anak->tgl_lahir; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bb_lahir">Berat Badan Lahir</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="bb_lahir" value="<?= $anak->bb_lahir; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Kg</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tb_lahir">Tinggi Badan Lahir</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="tb_lahir" value="<?= $anak->tb_lahir; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Cm</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" value="<?= $anak->jenis_kelamin; ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>