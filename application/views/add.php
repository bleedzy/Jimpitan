<form action="<?= site_url('home/save') ?>" method="post" class="row">
    <div class="col-12 mb-4">
        <h2 class="font-weight-bold">Masukan Jimpitan Hari Ini</h2>
    </div>

    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tabel Jimpitan</h4>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Profile</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($anggota as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td class="text-capitalize"><?= $row->nama ?></td>
                                    <td>
                                        <div class="form-inline">
                                            <div class="form-check mr-3">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="status[<?= $row->id ?>]" id="optionsRadios1" value="kosong" checked>
                                                    Kosong
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="status[<?= $row->id ?>]" id="optionsRadios2" value="ada">
                                                    Ada
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label class="font-weight-bold" for="nama">Masukan Nama Pengambil :</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" required>
                </div>
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn btn-primary">Simpan Data Jimpitan</button>
                </div>
            </div>
        </div>
    </div>
</form>