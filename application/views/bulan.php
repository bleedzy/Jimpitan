<style>
    .table-responsive {
        overflow-x: auto;
    }

    .fixed-column {
        position: sticky;
        left: 0;
        background-color: white;
        z-index: 1;
    }
</style>
<div class="row">
    <div class="col-12 mb-4 d-flex justify-content-between">
        <?php if (!isset($jimpitan)) { ?>
            <form class="form-group" method="POST" action="<?= site_url('month') ?>">
                <h3>Pilih Bulan Yang Akan Dicek :</h3>
                <input type="month" name="bulan" class="form-control">
                <input class="btn btn-primary mt-3" type="submit" value="Cek">
            </form>
        <?php } else { ?>
            <h2 class="font-weight-bold">Data Jimpitan Bulan <?= $month ?></h2>
        <?php } ?>
    </div>
    <?php if (isset($month)) { ?>
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <?php
                    $grouped_data = [];
                    foreach ($jimpitan as $row) {
                        $grouped_data[$row['nama']][] = $row;
                    }

                    $dates = [];
                    for ($day = 1; $day <= date('t', strtotime($selected_month . '-01')); $day++) {
                        $dates[] = $selected_month . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
                    }

                    $count_data = [];
                    foreach ($jimpitan as $row) {
                        $tanggal = $row['tanggal'];
                        if (!isset($count_data[$tanggal])) {
                            $count_data[$tanggal] = 0;
                        }
                        if ($row['status'] == 'ada') {
                            $count_data[$tanggal]++;
                        }
                    }

                    $pengambil_by_date = [];
                    foreach ($pengambil as $row) {
                        $tanggal = $row['tanggal'];
                        if (!isset($pengambil_by_date[$tanggal])) {
                            $pengambil_by_date[$tanggal] = [];
                        }
                        $pengambil_by_date[$tanggal][] = $row['nama'];
                    }
                    ?>
                    <div class="table-responsive">
                        <div class="table-responsive pt-3">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="fixed-column text-light bg-dark">Nama Orang</th>
                                        <?php foreach ($dates as $date) : ?>
                                            <th><?= $date; ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($grouped_data as $nama_orang => $rows) : ?>
                                        <tr>
                                            <td class="fixed-column font-weight-bold text-capitalize text-light bg-info"><?= $nama_orang; ?></td>
                                            <?php
                                            $status_by_date = array_column($rows, 'status', 'tanggal');
                                            foreach ($dates as $date) :
                                                $status = isset($status_by_date[$date]) ? $status_by_date[$date] : '';
                                            ?>
                                                <td class="text-capitalize <?= $status == 'ada' ? 'text-success' : 'text-danger' ?>"><?= $status; ?></td>
                                            <?php endforeach; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                    <tr>
                                        <td class="fixed-column font-weight-bold text-capitalize text-light bg-primary">Jumlah Uang</td>
                                        <?php foreach ($dates as $date) : ?>
                                            <td>
                                                <?php
                                                if (isset($count_data[$date])) {
                                                    $jumlah = $count_data[$date] * 500;
                                                } else {
                                                    $jumlah = 0;
                                                }
                                                echo 'Rp. ' . number_format($jumlah, 2, ",", ".");
                                                ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                    <tr>
                                        <td class="fixed-column font-weight-bold text-capitalize text-light bg-primary">Nama Pengambil</td>
                                        <?php foreach ($dates as $date) : ?>
                                            <td class="font-weight-bold">
                                                <?php
                                                if (isset($pengambil_by_date[$date])) {
                                                    echo implode(', ', $pengambil_by_date[$date]);
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </td>
                                        <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>