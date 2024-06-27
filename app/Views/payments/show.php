<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
Detail Pembayaran
<?= $this->endSection(); ?>

<?= $this->section('breadcumb'); ?>
Detail Pembayaran
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
            <div class="mb-3">
                <label class="form-label">Nama Pembeli</label>
                <input class="form-control" value="<?= $payment[0]['nama_pembeli'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea class="form-control" readonly><?= $payment[0]['alamat'] ?></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Telepon</label>
                <input class="form-control" value="<?= $payment[0]['no_telp'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Pembayaran</label>
                <input class="form-control" value="<?= $payment[0]['tgl_pembayaran'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Metode Pembayaran</label>
                <input class="form-control" value="<?= $payment[0]['metode_pembayaran'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Total</label>
                <input class="form-control" value="Rp . <?= number_format($payment[0]['total']) ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Bukti pembayaran</label>
                <img src="<?= base_url('assets/img/bukti/' . $payment[0]['bukti_pembayaran']) ?>" alt="..." class="d-block img-thumbnail" style="width: 300px;">
            </div>
            <div class="mb-3">
                <label class="form-label">Dibuat Pada</label>
                <input class="form-control" value="<?= $payment[0]['created_at'] ?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Diubah Pada</label>
                <input class="form-control" value="<?= $payment[0]['updated_at'] ?>" readonly>
            </div>
        </div> <!-- /.card-body -->
        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <a href="<?= base_url('admin/payments/' . $payment[0]['id_pembayaran'] . '/edit') ?>" class="btn btn-primary">Edit</a>
            </div>
        </div> <!--end::Footer-->
        <?= form_close() ?>
    </div> <!-- /.card -->
</div>
<?= $this->endSection(); ?>