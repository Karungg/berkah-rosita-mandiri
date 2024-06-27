<?= $this->extend('layouts/appLayout'); ?>

<?= $this->section('title'); ?>
User
<?= $this->endSection(); ?>

<?= $this->section('breadcumb'); ?>
User
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-12"> <!-- Default box -->
    <?php if (!empty(session()->getFlashdata('success'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <?php if (!empty(session()->getFlashdata('error'))) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <a href="<?= base_url('admin/users/create') ?>" class="btn btn-primary">Tambah Data</a>
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
                            <th class="text-center">Email</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($users as $user) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= $user['email'] ?></td>
                                <td class="text-center"><?= $user['username'] ?></td>
                                <td class="text-center">Admin</td>
                                <td class="text-center"><?= $user['created_at'] ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('admin/users/' . $user['id']) ?>/edit" class="btn btn-success">Edit</a>
                                    <form action="<?= base_url('admin/users/delete/' . $user['id']) ?>" method="post" onsubmit="return confirm('Hapus' + ' <?= $user['username'] ?>?');" style="display: inline;">
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