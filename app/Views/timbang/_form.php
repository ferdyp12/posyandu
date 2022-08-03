<?php $modelAnak = new App\Models\AnakModel() ?>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="id_anak">Anak</label>
        <select class="custom-select form-input" id="id_anak" name="id_anak">
            <option value="">Pilih Anak</option>
            <?php foreach ($modelAnak->select(['id_anak', 'nama'])->findAll() as $value) : ?>
                <option value="<?= $value->id_anak; ?>"><?= $value->nama; ?></option>
            <?php endforeach; ?>
        </select>
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control form-input" id="tanggal" name="tanggal">
        <div id="error"></div>
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="berat_badan">Berat Badan</label>
        <div class="input-group">
            <input type="number" step="0.01" class="form-control form-input" id="berat_badan" name="berat_badan">
            <div class="input-group-prepend">
                <div class="input-group-text">Kg</div>
            </div>
            <div id="error"></div>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="tinggi_badan">Tinggi Badan</label>
        <div class="input-group">
            <input type="number" class="form-control form-input" id="tinggi_badan" name="tinggi_badan">
            <div class="input-group-prepend">
                <div class="input-group-text">Cm</div>
            </div>
            <div id="error"></div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="keterangan">Keterangan</label>
    <textarea class="form-control form-input" rows="3" id="keterangan" name="keterangan"></textarea>
    <div id="error"></div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>