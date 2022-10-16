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
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" value="<?= $ibuHamil->nama; ?>" disabled>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="tinggi_badan">Tinggi Badan</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="<?= $ibuHamil->tinggi_badan; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Cm</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="berat_badan">Berat Badan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" value="<?= $ibuHamil->berat_badan; ?>" disabled>
                            <div class="input-group-prepend">
                                <div class="input-group-text">Kg</div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
                        <input type="date" class="form-control input" value="<?= $ibuHamil->tanggal_pemeriksaan; ?>" disabled>
                    </div>
                </div>
                <?php foreach ($ibuHamilDetail as $row) : ?>
                    <hr>
                    <div class="form-group">
                        <label for="trisemester">Trisemester</label>
                        <select class="custom-select" disabled>
                            <option value="">Pilih Trisemester</option>
                            <?php for ($i = 1; $i <= 3; $i++) : ?>
                                <option value="<?= $i; ?>" <?= $i == $row->trisemester ? 'selected' : ''; ?>>Trisemester <?= $i; ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="timbang">Timbang</label>
                            <input type="text" class="form-control" value="<?= $row->timbang; ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="ukur_lingkar_lengan_atas">Ukur Lingkar Lengan Atas</label>
                            <input type="text" class="form-control" value="<?= $row->ukur_lingkar_lengan_atas; ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="tekanan_darah">Tekanan Darah</label>
                            <input type="text" class="form-control" value="<?= $row->tekanan_darah; ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="periksa_tinggi_rahim">Periksa Tinggi Rahim</label>
                            <input type="text" class="form-control" value="<?= $row->periksa_tinggi_rahim; ?>" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="periksa_letak_dan_denyut_jantung_janin">Periksa Letak & Denyut Jantung Janin</label>
                            <input type="text" class="form-control" value="<?= $row->periksa_letak_dan_denyut_jantung_janin; ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="status_dan_imunisasi_tetanus">Status & Imunisasi Tetanus</label>
                            <input type="text" class="form-control" value="<?= $row->status_dan_imunisasi_tetanus; ?>" disabled>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="konseling">Konseling</label>
                            <input type="text" class="form-control" value="<?= $row->konseling; ?>" disabled>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="skrining_dokter">Skrining Dokter</label>
                            <select class="custom-select" disabled>
                                <option value="0" <?= $row->skrining_dokter == 0 ? 'selected' : ''; ?>>Tidak</option>
                                <option value="1" <?= $row->skrining_dokter == 1 ? 'selected' : ''; ?>>Iya</option>
                            </select>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection() ?>