<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Edit Kategori
<?= $this->endSection(); ?>

<?= $this->section('breadcumb'); ?>
Edit Kategori
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-12"> <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= base_url('admin/categories') ?>" class="btn btn-primary">Kembali</a>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove"> <i class="bi bi-x-lg"></i> </button>
            </div>
        </div>
        <div class="card-body">
            <?php $errors = validation_errors() ?>
            <?= form_open('admin/categories/' . $category[0]['id_kategori'] . '/edit') ?>
            <?= csrf_field() ?>
            <?= form_hidden('id_kategori', $category[0]['id_kategori']) ?>
            <?= form_hidden('_method', 'PUT') ?>
            <div class="mb-3">
                <label for="nama_kategori" class="form-label">Nama kategori</label>
                <input type="text" class="form-control <?= (isset($errors['nama_kategori'])) ? 'is-invalid' : '' ?>" id="nama_kategori" name="nama_kategori" value="<?= $category[0]['nama_kategori'] ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('nama_kategori') ?>
                </div>
            </div>
        </div> <!-- /.card-body -->
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div> <!--end::Footer-->
        <?= form_close() ?>
    </div> <!-- /.card -->
</div>
<?= $this->endSection(); ?>