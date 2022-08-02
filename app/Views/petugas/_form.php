<?php $jabatanPetugasModel = new App\Models\JabatanPetugasModel() ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" id="nama" name="nama">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="id_petugas_jabatan">Petugas Jabatan</label>
        <select class="custom-select form-input" id="id_petugas_jabatan" name="id_petugas_jabatan">
            <option value="">Pilih Petugas Jabatan</option>
            <?php foreach ($jabatanPetugasModel->findAll() as $value) : ?>
                <option value="<?= $value->id_petugas_jabatan; ?>"><?= $value->nama; ?></option>
            <?php endforeach ?>
        </select>
        <div id="error"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" name="password">
        <div id="error"></div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>