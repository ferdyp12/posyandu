<?php if (current_url(true)->getSegment(2) === 'create') : ?>
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control input" id="nama" name="nama">
        <div id="error"></div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="tinggi_badan">Tinggi Badan</label>
            <div class="input-group">
                <input type="number" class="form-control input" id="tinggi_badan" name="tinggi_badan">
                <div class="input-group-prepend">
                    <div class="input-group-text">Cm</div>
                </div>
                <div id="error"></div>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="berat_badan">Berat Badan</label>
            <div class="input-group">
                <input type="number" step="0.01" class="form-control input" id="berat_badan" name="berat_badan">
                <div class="input-group-prepend">
                    <div class="input-group-text">Kg</div>
                </div>
                <div id="error"></div>
            </div>
        </div>
        <div class="form-group col-md-4">
            <label for="tanggal_pemeriksaan">Tanggal Pemeriksaan</label>
            <input type="date" class="form-control input" id="tanggal_pemeriksaan" name="tanggal_pemeriksaan">
            <div id="error"></div>
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label for="trisemester">Trisemester</label>
        <select class="custom-select input" name="trisemester" id="trisemester">
            <option value="">Pilih Trisemester</option>
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <option value="<?= $i; ?>">Trisemester <?= $i; ?></option>
            <?php endfor; ?>
        </select>
        <div id="error"></div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="timbang">Timbang</label>
            <input type="number" step="0.1" class="form-control input" id="timbang" name="timbang">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-3">
            <label for="ukur_lingkar_lengan_atas">Ukur Lingkar Lengan Atas</label>
            <input type="number" step="0.1" class="form-control input" id="ukur_lingkar_lengan_atas" name="ukur_lingkar_lengan_atas">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-3">
            <label for="tekanan_darah">Tekanan Darah</label>
            <input type="text" class="form-control input" id="tekanan_darah" name="tekanan_darah">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-3">
            <label for="periksa_tinggi_rahim">Periksa Tinggi Rahim</label>
            <input type="text" class="form-control input" id="periksa_tinggi_rahim" name="periksa_tinggi_rahim">
            <div id="error"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="periksa_letak_dan_denyut_jantung_janin">Periksa Letak & Denyut Jantung Janin</label>
            <input type="text" class="form-control input" id="periksa_letak_dan_denyut_jantung_janin" name="periksa_letak_dan_denyut_jantung_janin">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-3">
            <label for="status_dan_imunisasi_tetanus">Status & Imunisasi Tetanus</label>
            <input type="text" class="form-control input" id="status_dan_imunisasi_tetanus" name="status_dan_imunisasi_tetanus">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-3">
            <label for="konseling">Konseling</label>
            <input type="text" class="form-control input" id="konseling" name="konseling">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-2">
            <label for="skrining_dokter">Skrining Dokter</label>
            <select class="custom-select input" name="skrining_dokter" id="skrining_dokter">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
            <div id="error"></div>
        </div>
    </div>
<?php elseif (current_url(true)->getSegment(3) === 'edit') : ?>
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
    <hr>
    <?php foreach ($ibuHamilDetail as $row) : ?>
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
        <hr>
    <?php endforeach ?>
    <div class="form-group">
        <label for="trisemester">Trisemester</label>
        <select class="custom-select input" name="trisemester" id="trisemester">
            <option value="">Pilih Trisemester</option>
            <?php for ($i = 1; $i <= 3; $i++) : ?>
                <option value="<?= $i; ?>">Trisemester <?= $i; ?></option>
            <?php endfor; ?>
        </select>
        <div id="error"></div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-3">
            <label for="timbang">Timbang</label>
            <input type="number" step="0.1" class="form-control input" id="timbang" name="timbang">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-3">
            <label for="ukur_lingkar_lengan_atas">Ukur Lingkar Lengan Atas</label>
            <input type="number" step="0.1" class="form-control input" id="ukur_lingkar_lengan_atas" name="ukur_lingkar_lengan_atas">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-3">
            <label for="tekanan_darah">Tekanan Darah</label>
            <input type="text" class="form-control input" id="tekanan_darah" name="tekanan_darah">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-3">
            <label for="periksa_tinggi_rahim">Periksa Tinggi Rahim</label>
            <input type="text" class="form-control input" id="periksa_tinggi_rahim" name="periksa_tinggi_rahim">
            <div id="error"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="periksa_letak_dan_denyut_jantung_janin">Periksa Letak & Denyut Jantung Janin</label>
            <input type="text" class="form-control input" id="periksa_letak_dan_denyut_jantung_janin" name="periksa_letak_dan_denyut_jantung_janin">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-3">
            <label for="status_dan_imunisasi_tetanus">Status & Imunisasi Tetanus</label>
            <input type="text" class="form-control input" id="status_dan_imunisasi_tetanus" name="status_dan_imunisasi_tetanus">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-3">
            <label for="konseling">Konseling</label>
            <input type="text" class="form-control input" id="konseling" name="konseling">
            <div id="error"></div>
        </div>
        <div class="form-group col-md-2">
            <label for="skrining_dokter">Skrining Dokter</label>
            <select class="custom-select input" name="skrining_dokter" id="skrining_dokter">
                <option value="0">Tidak</option>
                <option value="1">Iya</option>
            </select>
            <div id="error"></div>
        </div>
    </div>
<?php endif; ?>
<div class="form-group text-right">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>