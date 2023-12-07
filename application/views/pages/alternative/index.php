<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-button">
                <a href="<?= base_url('alternative/add') ?>" class="btn btn-primary">Add New</a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Data <?= $title ?> </h4>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th width="7%">No</th>
                                        <th>Alternative Name</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($alternative as $data) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <?= $data->name ?>
                                                <div class="table-links">
                                                    <a href="<?= base_url('alternative/edit/' . $data->id) ?>">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="<?= base_url('alternative/delete/' . $data->id) ?>" class="text-danger btn-hapus" data-id="<?= $data->id ?>">Hapus</a>
                                                </div>
                                            </td>
                                            <td><?= $data->description ?></td>
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