<?php $ayahModel = new App\Models\AyahModel() ?>

<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nama">Nama</label>
        <input type="text" class="form-control form-input" id="nama" name="nama">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="kk">Nomor Kartu Keluarga</label>
        <input type="number" class="form-control form-input" id="kk" name="kk">
        <div id="error"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nik">Nomor Induk Kewarganegaraan</label>
        <input type="number" class="form-control form-input" id="nik" name="nik">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="no_telp">Nomor Telepon</label>
        <input type="number" class="form-control form-input" id="no_telp" name="no_telp">
        <div id="error"></div>
    </div>
</div>
<div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea type="text" class="form-control form-input" id="alamat" name="alamat"></textarea>
    <div id="error"></div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="rw">RW</label>
        <input type="number" class="form-control form-input" id="rw" name="rw">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="rt">RT</label>
        <input type="number" class="form-control form-input" id="rt" name="rt">
        <div id="error"></div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>