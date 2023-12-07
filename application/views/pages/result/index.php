<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-button">
                <a href="<?= base_url('result/calculate_and_save_ki') ?>" class="btn btn-primary">Dapatkan Hasil</a>
                <a href="<?= base_url('result/cetak_hasil') ?>" target="_blank" class="btn btn-danger"><span class="fas fa-print"></span>&nbsp; Cetak</a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped" id="non-datatable">
                                <thead>
                                    <tr>
                                        <th>Alternative</th>
                                        <th>Alternative Name</th>
                                        <th>K<sub>i</sub></th>
                                        <th>Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($result as $data) { ?>
                                        <tr>
                                            <td><?= $data->alternative_name ?></td>
                                            <td><?= $data->description ?></td>
                                            <td><?= $data->result ?></td>
                                            <td><?= $data->ranking ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>