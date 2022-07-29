<div class="form-row">
    <div class="form-group col-md-6">
        <label for="nama_akseptor">Nama Akseptor</label>
        <input type="text" class="form-control form-input" id="nama_akseptor" name="nama_akseptor">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" class="form-control form-input" id="tanggal_lahir" name="tanggal_lahir">
        <div id="error"></div>
    </div>
</div>
<div class="form-group">
    <label for="nama_suami">Nama Suami</label>
    <input type="text" class="form-control form-input" id="nama_suami" name="nama_suami">
    <div id="error"></div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="berat_badan">Berat Badan</label>
        <div class="input-group">
            <input type="number" class="form-control form-input" id="berat_badan" name="berat_badan">
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
<div class="form-row">
    <div class="form-group col-md-6">
        <label for="tensi">Tensi</label>
        <input type="text" class="form-control form-input" id="tensi" name="tensi">
        <div id="error"></div>
    </div>
    <div class="form-group col-md-6">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control form-input" id="tanggal" name="tanggal">
        <div id="error"></div>
    </div>
</div>
<div class="form-group">
    <label for="alamat">Alamat</label>
    <textarea class="form-control form-input" rows="3" id="alamat" name="alamat"></textarea>
    <div id="error"></div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>