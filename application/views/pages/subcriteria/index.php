<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-button">
                <a href="<?= base_url('subcriteria/add') ?>" class="btn btn-primary">Add New</a>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">

                        <?php foreach ($criteria as $c) { ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"> <?= $title . " " . $c->name ?></h4>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="7%">No</th>
                                                <th>Sub Criteria Name</th>
                                                <th>Deskripsi</th>
                                                <th>Bobot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($sub_criteria as $data) {
                                                if ($data->criteria == $c->name) { ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td>
                                                            <?= $data->name ?>
                                                            <div class="table-links">
                                                                <a href="<?= base_url('subcriteria/edit/' . $data->id) ?>">Edit</a>
                                                                <div class="bullet"></div>
                                                                <a href="<?= base_url('subcriteria/delete/' . $data->id) ?>" class="text-danger btn-hapus" data-id="<?= $data->id ?>">Hapus</a>
                                                            </div>
                                                        </td>
                                                        <td><?= $data->description ?></td>
                                                        <td><?= $data->weight ?></td>
                                                    </tr>
                                            <?php }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>



                    </div>
                </div>
            </div>
    </section>
</div>