<?php $ayahModel = new App\Models\AyahModel() ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nama_anak">Nama Anak</label>
        <input type="text" class="form-control" id="nama_anak" name="nama_anak">
    </div>
    <div class="form-group col-md-6">
        <label for="nik_anak">NIK Anak</label>
        <input type="text" class="form-control" id="nik_anak" name="nik_anak">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="id_ayah">Ayah</label>
        <select class="custom-select" id="id_ayah" name="id_ayah">
            <option value="">Pilih Ayah</option>
            <?php foreach ($ayahModel->findAll() as $value) : ?>
                <option value="<?= $value->id_ayah; ?>"><?= $value->nama_ayah; ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="tempat_lahir">Tempat Lahir</label>
        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir">
    </div>
    <div class="form-group col-md-4">
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-4">
        <label for="bb_lahir">Berat Badan Lahir</label>
        <input type="text" class="form-control" id="bb_lahir" name="bb_lahir">
    </div>
    <div class="form-group col-md-4">
        <label for="tb_lahir">Tinggi Badan Lahir</label>
        <input type="text" class="form-control" id="tb_lahir" name="tb_lahir">
    </div>
    <div class="form-group col-md-4">
        <label for="jenis_kelamin">Jenis Kelamin</label>
        <select class="custom-select" id="jenis_kelamin" name="jenis_kelamin">
            <option value="">Pilih Jenis Kelamin</option>
            <option value="Laki - Laki">Laki - Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>