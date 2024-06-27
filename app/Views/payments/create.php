<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Tambah Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('breadcumb'); ?>
Tambah Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-12"> <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= base_url('admin/payments') ?>" class="btn btn-primary">Kembali</a>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove"> <i class="bi bi-x-lg"></i> </button>
            </div>
        </div>
        <div class="card-body">
            <?php $errors = validation_errors() ?>
            <?= form_open_multipart('admin/payments/create') ?>
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="nama_pembeli" class="form-label">Nama Pembeli</label>
                <input type="text" class="form-control <?= (isset($errors['nama_pembeli'])) ? 'is-invalid' : '' ?>" id="nama_pembeli" name="nama_pembeli" value="<?= old('nama_pembeli') ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('nama_pembeli') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control <?= (isset($errors['alamat'])) ? 'is-invalid' : '' ?>" id="alamat" name="alamat"><?= old('alamat') ?></textarea>
                <div class="invalid-feedback">
                    <?= validation_show_error('alamat') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="no_telp" class="form-label">Nomor Telepon</label>
                <input type="number" class="form-control <?= (isset($errors['no_telp'])) ? 'is-invalid' : '' ?>" id="no_telp" name="no_telp" value="<?= old('no_telp') ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('no_telp') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="tgl_pembayaran" class="form-label">Tanggal Pembayaran</label>
                <input type="date" class="form-control <?= (isset($errors['tgl_pembayaran'])) ? 'is-invalid' : '' ?>" id="tgl_pembayaran" name="tgl_pembayaran" value="<?= old('tgl_pembayaran') ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('tgl_pembayaran') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                <input type="text" class="form-control <?= (isset($errors['metode_pembayaran'])) ? 'is-invalid' : '' ?>" id="metode_pembayaran" name="metode_pembayaran" value="<?= old('metode_pembayaran') ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('metode_pembayaran') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="id_produk" class="form-label">Produk</label>
                <select name="id_produk" class="form-select <?= (isset($errors['id_produk'])) ? 'is-invalid' : '' ?>">
                    <?php foreach ($products as $product) : ?>
                        <option value="<?= $product['id_produk'] ?>"><?= $product['nama_produk'] ?></option>
                    <?php endforeach ?>
                </select>
                <div class="invalid-feedback">
                    <?= validation_show_error('id_produk') ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="total" class="form-label">Total</label>
                <input type="number" class="form-control <?= (isset($errors['total'])) ? 'is-invalid' : '' ?>" id="total" name="total" value="<?= old('total') ?>">
                <div class="invalid-feedback">
                    <?= validation_show_error('total') ?>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control <?= (isset($errors['bukti_pembayaran'])) ? 'is-invalid' : '' ?>" id="bukti_pembayaran" name="bukti_pembayaran">
                <label class="input-group-text" for="bukti_pembayaran">Foto Produk</label>
                <div class="invalid-feedback">
                    <?= validation_show_error('bukti_pembayaran') ?>
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