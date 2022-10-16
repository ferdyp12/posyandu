<?php
$modelJenisImunisasi = new App\Models\JenisImunisasiModel();
$modelAnak = new App\Models\AnakModel();
$modelImunisasi = new \App\Models\ImunisasiModel();

if (current_url(true)->getSegment(3) === 'edit') {
    foreach ($imunisasiDetail as $imunD) {
        $idJenisImunisasi[] = $imunD->id_jenis_imunisasi;
    }
}

?>
<div class="form-group">
    <label for="id_anak">Anak</label>
    <?php if (current_url(true)->getSegment(2) === 'create') : ?>
        <select class="custom-select id_anak" name="id_anak">
            <option value="">Pilih Anak</option>
            <?php foreach ($modelAnak->select(['id_anak', 'nama'])->whereNotIn('id_anak', $modelImunisasi->select('imunisasi.id_anak')->join('imunisasi_detail', 'imunisasi.id_imunisasi = imunisasi_detail.id_imunisasi')->groupBy('imunisasi.id_imunisasi')->findColumn('id_anak'))->findAll() as $value) : ?>
                <option value="<?= $value->id_anak; ?>"><?= $value->nama; ?></option>
            <?php endforeach; ?>
        </select>
    <?php elseif (current_url(true)->getSegment(3) === 'edit') : ?>
        <input type="text" class="form-control" value="<?= $imunisasi->nama_anak; ?>" disabled>
    <?php endif; ?>
    <div id="error"></div>
</div>
<div class="table-responsive mt-4">
    <table class="table table-bordered">
        <thead align="center">
            <th>No</th>
            <th>Jenis Imunisasi</th>
            <th>Bulan Ke-</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
        </thead>
        <tbody align="center">
            <?php if (current_url(true)->getSegment(2) === 'create') : ?>
                <tr>
                    <td class="align-middle">1</td>
                    <td class="align-middle">
                        <div class="form-group">
                            <select class="custom-select id_jenis_imunisasi" name="id_jenis_imunisasi">
                                <option value="">Pilih Jenis Imunisasi</option>
                                <?php foreach ($modelJenisImunisasi->select(['id_jenis_imunisasi', 'nama'])->findAll() as $value) : ?>
                                    <option value="<?= $value->id_jenis_imunisasi; ?>"><?= $value->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div id="error"></div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="form-group">
                            <input type="number" class="form-control bulan" name="bulan">
                            <div id="error"></div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="form-group">
                            <input type="datetime-local" class="form-control tanggal" name="tanggal">
                            <div id="error"></div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="form-group">
                            <textarea class="form-control keterangan" name="keterangan"></textarea>
                        </div>
                    </td>
                </tr>
                <?php elseif (current_url(true)->getSegment(3) === 'edit') :
                $no = 1;
                foreach ($imunisasiDetail as $row) : ?>
                    <tr>
                        <td class="align-middle"><?= $no++; ?></td>
                        <td class="align-middle">
                            <input type="text" class="form-control" value="<?= $row->nama; ?>" disabled>
                        </td>
                        <td class="align-middle">
                            <input type="number" class="form-control" value="<?= $row->bulan; ?>" disabled>
                        </td>
                        <td class="align-middle">
                            <input type="datetime-local" class="form-control" value="<?= $row->tanggal; ?>" disabled>
                        </td>
                        <td class="align-middle">
                            <textarea class="form-control keterangan" disabled><?= $row->keterangan; ?></textarea>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td class="align-middle">1</td>
                    <td class="align-middle">
                        <div class="form-group">
                            <select class="custom-select id_jenis_imunisasi input" name="id_jenis_imunisasi">
                                <option value="">Pilih Jenis Imunisasi</option>
                                <?php foreach ($modelJenisImunisasi->select(['id_jenis_imunisasi', 'nama'])->whereNotIn('id_jenis_imunisasi', $idJenisImunisasi)->findAll() as $value) : ?>
                                    <option value="<?= $value->id_jenis_imunisasi; ?>"><?= $value->nama; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div id="error"></div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="form-group">
                            <input type="number" class="form-control bulan input" name="bulan">
                            <div id="error"></div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="form-group">
                            <input type="datetime-local" class="form-control tanggal input" name="tanggal">
                            <div id="error"></div>
                        </div>
                    </td>
                    <td class="align-middle">
                        <div class="form-group">
                            <textarea class="form-control keterangan" name="keterangan"></textarea>
                        </div>
                    </td>
                </tr>
            <?php endif ?>
        </tbody>
    </table>
</div>
<div class="form-group text-right">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>