<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="<?= base_url('criteria') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
                            <form action="<?= base_url('criteria/update/' . $criteria->id) ?>" method="post" autocomplete="off">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Criteria Name*</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="form-control" name="name" placeholder="Masukkan criteria" value="<?= $criteria->name ?>" required>
                                        <?= form_error('name', '<span class="text-danger"></span>') ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Desc</label>
                                    <div class="col-sm-12 col-md-6">
                                        <textarea class="form-control" name="description"><?= $criteria->description ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bobot*</label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="text" class="form-control" name="weight" placeholder="Masukkan bobot kriteria" value="<?= $criteria->weight ?>" required>
                                        <small>* Jika terdapat angka decimal bisa menggunakan tanda titik <code>(.)</code></small>
                                        <?= form_error('weight', '<span class="text-danger"></span>') ?>
                                    </div>
                                </div>
                                <div class=" form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Attribute *</label>
                                    <div class="col-sm-12 col-md-6">
                                        <select name="jenis" id="jenis" class="form-control" required>
                                            <option value="benefit" <?= $criteria->jenis == "benefit" ? "selected" : "" ?>>benefit</option>
                                            <option value="cost" <?= $criteria->jenis == "cost" ? "selected" : "" ?>>cost</option>
                                        </select>
                                        <?= form_error('jenis', '<span class="text-danger"></span>') ?>
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