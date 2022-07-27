<?= $this->extend('templates/posyandu/index'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= route_to('Ayah::index'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Kembali Ke List Ayah</a>
</div>

<!-- Content Row -->
<div class="row">

    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?= $ayah->nama; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="kk">Nomor Kartu Keluarga</label>
                        <input type="number" class="form-control" id="kk" value="<?= $ayah->kk; ?>" disabled>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nik">Nomor Induk Kewarganegaraan</label>
                        <input type="number" class="form-control" id="nik" value="<?= $ayah->nik; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="no_telp">Nomor Telepon</label>
                        <input type="number" class="form-control" id="no_telp" value="<?= $ayah->no_telp; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" disabled><?= $ayah->alamat; ?></textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="rw">RW</label>
                        <input type="number" class="form-control" id="rw" value="<?= $ayah->rw; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="rt">RT</label>
                        <input type="number" class="form-control" id="rt" value="<?= $ayah->rt; ?>" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>