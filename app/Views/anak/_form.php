<?php $ayahModel = new App\Models\AyahModel() ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nama">Nama</label>
        <input type="text" class="form-control form-input" id="nama" name="nama">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="nik">Nomor Induk Kewarganegaraan</label>
        <input type="number" class="form-control form-input" id="nik" name="nik">
        <div id="error"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="anak_ke">Anak yang ke-</label>
        <input type="number" class="form-control form-input" id="anak_ke" name="anak_ke">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="id_ayah">Ayah</label>
        <select class="custom-select form-input" id="id_ayah" name="id_ayah">
            <option value="">Pilih Ayah</option>
            <?php foreach ($ayahModel->findAll() as $value) : ?>
                <option value="<?= $value->id_ayah; ?>"><?= $value->nama; ?></option>
            <?php endforeach ?>
        </select>
        <div id="error"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control form-input" id="tempat_lahir" name="tempat_lahir">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control form-input" id="tanggal_lahir" name="tanggal_lahir">
        <div id="error"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-3">
        <label for="berat_badan_lahir">Berat Badan Lahir</label>
        <div class="input-group">
            <input type="number" class="form-control form-input" id="berat_badan_lahir" name="berat_badan_lahir">
            <div class="input-group-prepend">
                <div class="input-group-text">Kg</div>
            </div>
            <div id="error"></div>
        </div>
    </div>
    <div class="form-group col-md-3">
        <label for="tinggi_badan_lahir">Tinggi Badan Lahir</label>
        <div class="input-group">
            <input type="number" class="form-control form-input" id="tinggi_badan_lahir" name="tinggi_badan_lahir">
            <div class="input-group-prepend">
                <div class="input-group-text">Cm</div>
            </div>
            <div id="error"></div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="custom-select form-input" id="jenis_kelamin" name="jenis_kelamin">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki - Laki">Laki - Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
        <div id="error"></div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>