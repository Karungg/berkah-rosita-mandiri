<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('breadcumb'); ?>
Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-12"> <!-- Default box -->
    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= base_url('admin/payments/create') ?>" class="btn btn-primary">Tambah Data</a>
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
                            <th class="text-center">Nama Pembeli</th>
                            <th class="text-center">Tanggal Pembayaran</th>
                            <th class="text-center">Nomor Telepon</th>
                            <th class="text-center">Metode Pembayaran</th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($payments as $payment) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $payment['nama_pembeli'] ?></td>
                                <td class="text-center"><?= $payment['tgl_pembayaran'] ?></td>
                                <td class="text-center"><?= $payment['no_telp'] ?></td>
                                <td class="text-center"><?= $payment['metode_pembayaran'] ?></td>
                                <td class="text-center">Rp. <?= number_format($payment['total']) ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/payments/' . $payment['id_pembayaran']) ?>" class="btn btn-primary">Detail</a>
                                    <a href="<?= base_url('admin/payments/' . $payment['id_pembayaran']) ?>/edit" class="btn btn-success">Edit</a>
                                    <form action="<?= base_url('admin/payments/delete/' . $payment['id_pembayaran']) ?>" method="post" onsubmit="return confirm('Hapus' + ' <?= $payment['nama_pembeli'] ?>?');" style="display: inline;">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Hapus</a>
                                    </form>
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