<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Edit Produk
<?= $this->endSection(); ?>

<?= $this->section('breadcumb'); ?>
Edit Produk
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-12"> <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= base_url('admin/products') ?>" class="btn btn-primary">Kembali</a>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove"> <i class="bi bi-x-lg"></i> </button>
            </div>
        </div>
        <div class="card-body">
            <?php $errors = validation_errors() ?>
            <?= form_open_multipart('admin/products/' . $product[0]['id_produk'] . '/edit') ?>
            <?= csrf_field() ?>
            <?= form_hidden('id_produk', $product[0]['id_produk']) ?>
            <?= form_hidden('_method', 'PUT') ?>
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control <?= (isset($errors['nama_produk'])) ? 'is-invalid' : '' ?>" id="nama_produk" name="nama_produk" value="<?= $product[0]['nama_produk'] ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('nama_produk') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control <?= (isset($errors['deskripsi'])) ? 'is-invalid' : '' ?>" id="deskripsi" name="deskripsi"><?= $product[0]['deskripsi'] ?></textarea>
                <div class="invalid-feedback">
                    <?= validation_show_error('deskripsi') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" class="form-control <?= (isset($errors['harga'])) ? 'is-invalid' : '' ?>" id="harga" name="harga" value="<?= $product[0]['harga'] ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('harga') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" class="form-control <?= (isset($errors['stok'])) ? 'is-invalid' : '' ?>" id="stok" name="stok" value="<?= $product[0]['stok'] ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('stok') ?>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control <?= (isset($errors['gambar'])) ? 'is-invalid' : '' ?>" id="gambar" name="gambar">
                <label class="input-group-text" for="gambar">Foto Produk</label>
                <div class="invalid-feedback">
                    <?= validation_show_error('gambar') ?>
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