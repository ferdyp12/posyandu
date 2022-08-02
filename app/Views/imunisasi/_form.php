<?php $modelJenisImunisasi = new App\Models\JenisImunisasiModel();
$modelAnak = new App\Models\AnakModel() ?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="id_anak">Anak</label>
        <select class="custom-select" id="id_anak" name="id_anak">
            <option value="">Pilih Anak</option>
            <?php foreach ($modelAnak->select(['id_anak', 'nama'])->findAll() as $value) : ?>
                <option value="<?= $value->id_anak; ?>"><?= $value->nama; ?></option>
            <?php endforeach; ?>
        </select>
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="id_jenis_imunisasi">Jenis Imunisasi</label>
        <select class="custom-select" id="id_jenis_imunisasi" name="id_jenis_imunisasi">
            <option value="">Pilih Jenis Imunisasi</option>
            <?php foreach ($modelJenisImunisasi->select(['id_jenis_imunisasi', 'nama'])->findAll() as $value) : ?>
                <option value="<?= $value->id_jenis_imunisasi; ?>"><?= $value->nama; ?></option>
            <?php endforeach; ?>
        </select>
        <div id="error"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="usia_saat">Usia</label>
        <div class="input-group">
            <input type="number" class="form-control" id="usia_saat" name="usia_saat">
            <div class="input-group-prepend">
                <div class="input-group-text">Tahun</div>
            </div>
            <div id="error"></div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal">
        <div id="error"></div>
    </div>
</div>
<div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
    <div id="error"></div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>