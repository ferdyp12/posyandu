<?php $petugasModel = new App\Models\PetugasModel() ?>

<div class="form-group">
    <label for="id_petugas">Petugas</label>
    <select class="custom-select" name="id_petugas" id="id_petugas">
        <option value="">Pilih Petugas</option>
        <?php foreach ($petugasModel->findAll() as $value) : ?>
            <option value="<?= $value->id_petugas; ?>"><?= $value->nama; ?></option>
        <?php endforeach ?>
    </select>
    <div id="error"></div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="username">Username</label>
        <input type="text" class="form-control" id="username" name="username">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password">
        <div id="error"></div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>