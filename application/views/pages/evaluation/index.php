<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-button">
                <!-- <a href="<?= base_url('evaluation/add') ?>" class="btn btn-primary">Add New</a> -->
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
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($alternative as $data) { ?>
                                        <tr>
                                            <td><?= $no++; ?> </td>
                                            <td>
                                                <?= $data->name ?>
                                                <!-- <div class="table-links">
                                                    <a href="<?= base_url('evaluation/edit/' . $data->id) ?>">Edit</a>
                                                    <div class="bullet"></div>
                                                    <a href="<?= base_url('evaluation/delete/' . $data->id) ?>" class="text-danger btn-hapus" data-id="<?= $data->id ?>">Hapus</a>
                                                </div> -->
                                            </td>
                                            <td>
                                                <?php
                                                // Assuming $data->id is the ID of the alternative

                                                $editLink = base_url('evaluation/edit/' . $data->id);
                                                $inputLink = base_url('evaluation/input/' . $data->id);

                                                // Check if an evaluation record exists for the given alternative ID
                                                $this->db->where('alternative_id', $data->id);
                                                $query = $this->db->get('evaluations');

                                                if ($query->num_rows() > 0) {
                                                    // If a record exists, provide a link for editing
                                                    echo '<a href="' . $editLink . '" class="btn btn-sm btn-warning"><span class="fa fa-edit"></span> &nbsp;Edit</a>';
                                                } else {
                                                    // If no record exists, provide a link for input
                                                    echo '<a href="' . $inputLink . '" class="btn btn-sm btn-primary input-button"><span class="fa fa-pen"></span> &nbsp;Input</a>';
                                                }
                                                ?>
                                            </td>
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

<div class="modal fade" tabindex="-1" role="dialog" id="modal-input">
    <div class="modal-dialog" role="document">
        <form id="form" action="<?= base_url(''); ?>" enctype="multipart/form-data" method="post" autocomplete="off">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Input Penilaian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" name="id" id="id_alternative">
                    <?php foreach ($criteria as $key => $value) { ?>
                        <div class="form-group row">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"><?= $value->name ?> *</label>
                            <div class="col-sm-12 col-md-9">
                                <select name="value<?= $key ?>" id="" class="form-control">
                                    <option value="0" disabled selected> Input Penilain</option>
                                    <?php foreach ($subcriteria as $key => $value1) {
                                        if ($value1->criteria == $value->name) { ?>
                                            <option value="<?= $value1->id ?>"><?= $value1->name ?></option>
                                    <?php };
                                    } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>


                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="simpan" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="<?= base_url('assets/') ?>modules/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.input-button').click(function() {
            // Get data attributes from the clicked button
            var id = $(this).data('id');

            console.log(id);

            // Set values in the modal form fields
            $('#id_alternative').val(id);

        });

        // Clear the form fields when the modal is closed
        // $('#modal-edit').on('hidden.bs.modal', function() {
        //     $('.edit-id').val('');
        // });
    });
</script>