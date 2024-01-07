<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('subcriteria') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
                            <h4 class="card-title"> Edit <?= $title ?> </h4>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('subcriteria/update/' . $subcriteria->id) ?>" method="post" autocomplete="off">
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Criteria *</label>
                                    <div class="col-sm-12 col-md-6">
                                        <select name="criteria" id="criteria" class="form-control" required>
                                            <option value="" disabled>Pilih Criteria</option>
                                            <?php foreach ($criteria as $c) { ?>
                                                <option value="<?= $c->id ?>" <?= $c->id == $subcriteria->criteria_id ? "selected" : "" ?>><?= $c->description ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Criteria Name*</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="form-control" name="name" placeholder="Masukkan sub criteria" value="<?= $subcriteria->name ?>" required>
                                    </div>
                                </div>
                                <!-- <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desc</label>
                                    <div class="col-sm-12 col-md-6">
                                        <textarea class="form-control" name="description"><?= $subcriteria->description ?></textarea>
                                    </div>
                                </div> -->
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bobot*</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="form-control" name="weight" placeholder="Masukkan bobot sub criteria" value="<?= $subcriteria->weight ?>" required>
                                        <small>* Jika terdapat angka decimal bisa menggunakan tanda titik <code>(.)</code></small>
                                    </div>
                                </div>
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