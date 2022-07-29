<?= $this->extend('templates/posyandu/index'); ?>

<?= $this->section('content'); ?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
    <a href="<?= route_to('KeluargaBerencana::index'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-caret-left fa-sm text-white-50"></i> Kembali Ke Keluarga Berencana</a>
</div>

<!-- Content Row -->
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nama_akseptor">Nama Akseptor</label>
                        <input type="text" class="form-control" id="nama_akseptor" value="<?= $kb->nama_akseptor; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" value="<?= $kb->tanggal_lahir; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_suami">Nama Suami</label>
                    <input type="text" class="form-control" id="nama_suami" value="<?= $kb->nama_suami; ?>" disabled>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="berat_badan">Berat Badan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="berat_badan" value="<?= $kb->berat_badan; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Kg</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tinggi_badan">Tinggi Badan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" id="tinggi_badan" value="<?= $kb->tinggi_badan; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Cm</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tensi">Tensi</label>
                        <input type="text" class="form-control" id="tensi" value="<?= $kb->tensi; ?>" disabled>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" value="<?= $kb->tanggal; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" rows="3" id="alamat" disabled><?= $kb->alamat; ?></textarea>
                </div>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>