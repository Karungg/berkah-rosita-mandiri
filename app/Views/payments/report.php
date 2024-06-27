<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Laporan Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('breadcumb'); ?>
Laporan Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-12"> <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= base_url('admin/payments/create') ?>" class="btn btn-danger">Export PDF</a>
                <a href="<?= base_url('admin/payments/create') ?>" class="btn btn-success">Export Excel</a>
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
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</div>
<?= $this->endSection(); ?>