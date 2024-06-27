<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Detail Produk
<?= $this->endSection(); ?>

<?= $this->section('breadcumb'); ?>
Detail Produk
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
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input class="form-control" value="<?= $product[0]['nama_produk'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea class="form-control" readonly><?= $product[0]['deskripsi'] ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga</label>
                <input class="form-control" value="Rp . <?= number_format($product[0]['harga']) ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input class="form-control" value="<?= $product[0]['stok'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Link</label>
                <input class="form-control" value="<?= $product[0]['link'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <input class="form-control" value="<?= $product[0]['nama_kategori'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Dibuat Pada</label>
                <input class="form-control" value="<?= $product[0]['created_at'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Diubah Pada</label>
                <input class="form-control" value="<?= $product[0]['updated_at'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto Produk</label>
                <img src="<?= base_url('assets/img/produk/' . $product[0]['gambar']) ?>" alt="..." class="d-block img-thumbnail" style="width: 200px;">
            </div>
        </div> <!-- /.card-body -->
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <a href="<?= base_url('admin/products/' . $product[0]['id_produk'] . '/edit') ?>" class="btn btn-primary">Edit</a>
            </div>
        </div> <!--end::Footer-->
        <?= form_close() ?>
    </div> <!-- /.card -->
</div>
<?= $this->endSection(); ?>