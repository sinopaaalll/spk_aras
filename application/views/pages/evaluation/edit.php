<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('evaluation') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Edit <?= $title ?></h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Catatan</h2>
            <p class="section-lead"><b>* = Tidak boleh kosong</b></p>

            <div class="row">
                <div class="col-sm-12 col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> Edit Penilaian </h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('evaluation/update/' . $id_alternative) ?>" method="post" autocomplete="off">
                                <input type="hidden" name="id" id="id_alternative" value="<?= $id_alternative ?>">
                                <?php foreach ($criteria as $key => $value) { ?>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= $value->description ?> *</label>
                                        <input type="hidden" name="id<?= $key ?>" value="<?= $evaluation[$key]['id'] ?>">
                                        <input type="hidden" name="criteria<?= $key ?>" value="<?= $value->id ?>">
                                        <div class="col-sm-12 col-md-6">
                                            <select name="value<?= $key ?>" class="form-control">
                                                <option value="0" disabled selected> Input Penilain</option>
                                                <?php foreach ($subcriteria as $key1 => $value1) {
                                                    if ($value1->criteria == $value->name) { ?>
                                                        <option value="<?= $value1->weight ?>" <?= $value1->weight == $evaluation[$key]['value'] ? "selected" : "" ?>><?= $value1->name ?></option>
                                                <?php };
                                                } ?>
                                            </select>
                                        </div>
                                    </div>
                                <?php } ?>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>