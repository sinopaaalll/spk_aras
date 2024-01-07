<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-button">
                <!-- <a href="<?= base_url('result/calculate_and_save_ki/') ?>" class="btn btn-primary">Calc Result</a> -->
            </div>
        </div>

        <div class="section-body">

            <?php
            // Pemeriksaan apakah ada data evaluasi
            if (empty($evaluation)) {
                echo '<div class="alert alert-info">Tidak ada data evaluasi.</div>';
            } else {
            ?>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><span class="fa fa-calculator"></span> Data Penilaian </h4>
                            </div>
                            <div class="card-body">
                                <!-- Tabel Evaluasi -->
                                <table class="table table-bordered text-center" id="non-datatable">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Alternative</th>
                                            <th colspan="<?= count($criteria) ?>">Criteria</th>
                                        </tr>
                                        <tr>
                                            <?php foreach ($criteria as $key => $value) { ?>
                                                <th><?= $value->description ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($alternative as $key1 => $value1) { ?>
                                            <tr>
                                                <th class="text-left"><?= $value1->description ?></th>
                                                <?php foreach ($criteria as $key2 => $value2) { ?>
                                                    <!-- Menambahkan calculate_x0 sebelum get_evaluation_value -->
                                                    <td><?= get_evaluation($evaluation, $subcriteria, $value1->name, $value2->name) ?></td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th class="text-left">Tipe</th>
                                            <?php foreach ($criteria as $key => $value) { ?>
                                                <th><?= $value->jenis ?></th>
                                            <?php } ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><span class="fa fa-calculator"></span> Data Perhitungan </h4>
                            </div>
                            <div class="card-body">
                                <!-- Tabel Evaluasi -->
                                <table class="table table-bordered text-center" id="non-datatable">
                                    <thead>
                                        <tr>
                                            <th rowspan="2">Alternative</th>
                                            <th colspan="<?= count($criteria) ?>">Criteria</th>
                                        </tr>
                                        <tr>
                                            <?php foreach ($criteria as $key => $value) { ?>
                                                <th><?= $value->name ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Baris X0 -->
                                        <tr>
                                            <th>A0</th>
                                            <?php foreach ($criteria as $key => $value) { ?>
                                                <td><?= calculate_x0($evaluation, $value->id, $value->jenis) ?></td>
                                            <?php } ?>
                                        </tr>

                                        <?php foreach ($alternative as $key1 => $value1) { ?>
                                            <tr>
                                                <th><?= $value1->name ?></th>
                                                <?php foreach ($criteria as $key2 => $value2) { ?>
                                                    <!-- Menambahkan calculate_x0 sebelum get_evaluation_value -->
                                                    <td><?= get_evaluation_value($evaluation, $value1->name, $value2->name) ?></td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tipe</th>
                                            <?php foreach ($criteria as $key => $value) { ?>
                                                <th><?= $value->jenis ?></th>
                                            <?php } ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Matrix -->
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><span class="fa fa-calculator"></span> Matriks Keputusan </h4>
                            </div>
                            <div class="card-body">
                                <?php
                                // Memasukkan data dari tabel (termasuk A0) ke dalam variabel $x
                                $x = array();
                                foreach ($alternative as $key1 => $value1) {
                                    $row = array();
                                    foreach ($criteria as $key2 => $value2) {
                                        $row[$value2->name] = get_evaluation_value($evaluation, $value1->name, $value2->name);
                                    }
                                    $x[$value1->name] = $row;
                                }
                                // echo '<pre>' . print_r($x) . '</pre>' . '<br>';


                                // Menambahkan A0 ke dalam variabel $x pada index [0]
                                $row = array();
                                foreach ($criteria as $key2 => $value2) {
                                    $row[$value2->name] = calculate_x0($evaluation, $value2->id, $value2->jenis);
                                }
                                $x = ["A0" => $row] + $x;

                                // echo '<pre>' . print_r($x) . '</pre>' . '<br>';

                                // Menampilkan matrix dalam bentuk tabel
                                echo '<div class="row">';
                                echo '<div class="col-md-2 d-flex align-items-center justify-content-center">';
                                echo '<h1>X =</h1>';
                                echo '</div>';
                                echo '<div class="col-md-10">';
                                echo '<table class="table table-bordered text-center">';
                                foreach ($x as $key => $row) {
                                    echo '<tr>';
                                    foreach ($row as $cell) {
                                        echo '<td>' . $cell . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Normalisasi Matriks -->
                <div class="row mt-4">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><span class="fa fa-calculator"></span> Normalisasi Matriks </h4>
                            </div>
                            <div class="card-body">
                                <?php
                                // Normalisasi Matriks
                                $normalizedX = normalize_matrix($x, $criteria);

                                // Menampilkan matriks yang sudah dinormalisasi
                                echo '<div class="row">';
                                // echo '<pre>' . print_r($normalizedX) . '</pre>' . '<br>';

                                echo '<div class="col-md-2 d-flex align-items-center justify-content-center">';
                                echo '<h1>X<sup>*</sup> =</h1>';
                                echo '</div>';
                                echo '<div class="col-md-10">';
                                echo '<table class="table table-bordered">';
                                foreach ($normalizedX as $key => $row) {
                                    echo '<tr>';
                                    foreach ($row as $cell) {
                                        echo '<td>' . $cell . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><span class="fa fa-calculator"></span> Bobot </h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <?php foreach ($criteria as $key => $value) { ?>
                                                <th><?= $value->name ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php foreach ($criteria as $key => $value) { ?>
                                                <th><?= $value->weight ?></th>
                                            <?php } ?>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Normalisasi Matriks Terbobot -->
                <div class="row mt-4">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><span class="fa fa-calculator"></span> Normalisasi Matriks Terbobot </h4>
                            </div>
                            <div class="card-body">
                                <?php
                                // Matriks Bobot dari criteria

                                // Normalisasi Matriks Terbobot
                                $weightedNormalizedX = normalize_weighted_matrix($normalizedX, $criteria);

                                // Menampilkan matriks yang sudah dinormalisasi dan terbobot
                                echo '<div class="row">';
                                // echo '<pre>' . print_r($weightedNormalizedX) . '</pre>' . '<br>';

                                echo '<div class="col-md-2 d-flex align-items-center justify-content-center">';
                                echo '<h1> D =</h1>';
                                echo '</div>';
                                echo '<div class="col-md-10">';
                                echo '<table class="table table-bordered">';
                                foreach ($weightedNormalizedX as $key => $row) {
                                    echo '<tr>';
                                    foreach ($row as $cell) {
                                        echo '<td>' . $cell . '</td>';
                                    }
                                    echo '</tr>';
                                }
                                echo '</table>';
                                echo '</div>';
                                echo '</div>';
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Nilai Optimum -->
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><span class="fa fa-calculator"></span> Nilai Optimum </h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Alternatif</th>
                                            <th>Proses Hitung</th>
                                            <th>S<sub>ij</sub></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        // echo print_r($weightedNormalizedX);

                                        // $alternatif = array_column($alternative, 'name');

                                        // print_r($alternatif);

                                        $optimalValues = calculate_optimal_values($weightedNormalizedX);
                                        // echo print_r($optimalValues);

                                        foreach ($optimalValues as $optimal) {
                                        ?>
                                            <tr class="text-center">
                                                <td><?= $optimal['alternatif'] ?></td> <!-- Sesuaikan dengan rumus atau proses yang benar -->
                                                <td><b>SUM</b><br>(<?= $optimal['proses_sum'] ?>)</td> <!-- Sesuaikan dengan rumus atau proses yang benar -->
                                                <td><?= $optimal['sum'] ?></td> <!-- Sesuaikan dengan rumus atau proses yang benar -->
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card Nilai Optimum -->
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"><span class="fa fa-calculator"></span> Nilai Derajat Utilitas </h4>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center">
                                            <th>Alternatif</th>
                                            <th>S<sub>ij</sub></th>
                                            <th>K<sub>i</sub></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $optimalValues = calculate_optimal_values($weightedNormalizedX);

                                        $s0 = $optimalValues['A0']['sum'];
                                        foreach ($optimalValues as $optimal) {
                                            $si = $optimal['sum'];

                                            $ki = calculate_ki($si, $s0);
                                        ?>
                                            <tr class="text-center">
                                                <td><?= $optimal['alternatif'] ?></td>
                                                <td><?= $optimal['sum'] ?></td>
                                                <td><?= $ki ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            <?php } ?>

        </div>
    </section>
</div>