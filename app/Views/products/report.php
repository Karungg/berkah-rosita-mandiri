<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Laporan Produk
<?= $this->endSection(); ?>

<?= $this->section('breadcumb'); ?>
Laporan Produk
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-12"> <!-- Default box -->
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <div class="d-flex">
                    <?= form_open('admin/report/products/pdf') ?>
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-danger me-2">Export PDF</button>
                    <?= form_close() ?>

                    <?= form_open('admin/report/products/excel') ?>
                    <?= csrf_field() ?>
                    <button type="submit" class="btn btn-success">Export Excel</button>
                    <?= form_close() ?>
                </div>
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse"> <i data-lte-icon="expand" class="bi bi-plus-lg"></i> <i data-lte-icon="collapse" class="bi bi-dash-lg"></i> </button> <button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove"> <i class="bi bi-x-lg"></i> </button>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-1" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nama Produk</th>
                            <th class="text-center">Deskripsi</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Foto Produk</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($products as $product) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $product['nama_produk'] ?></td>
                                <td class="text-center"><?= $product['deskripsi'] ?></td>
                                <td class="text-center"><?= $product['harga'] ?></td>
                                <td class="text-center"><?= $product['stok'] ?></td>
                                <td class="text-center"><?= $product['nama_kategori'] ?></td>
                                <td class="text-center">
                                    <img src="<?= base_url('assets/img/produk/' . $product['gambar']) ?>" alt="..." class="img-thumbnail" style="width: 100px;">
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</div>
<?= $this->endSection(); ?>