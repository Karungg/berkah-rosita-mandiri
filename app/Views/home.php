<?= $this->extend('layouts/homeLayout'); ?>

<?= $this->section('content'); ?>
<div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px">
    <h1 class="text-primary mb-3">
        <span class="fw-light text-dark">Our Natural</span> Hair Products
    </h1>
    <p class="mb-5">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis
        aliquet, erat non malesuada consequat, nibh erat tempus risus.
    </p>
</div>
<div class="row g-4">
    <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
        <div class="product-item text-center border h-100 p-4">
            <img class="img-fluid mb-4" src="<?= base_url('template/') ?>img/brm-1.png" alt="" />
            <a href="" class="h6 d-inline-block mb-2">Hair Shining Shampoo</a>
            <h5 class="text-primary mb-3">$99.99</h5>
            <a href="" class="btn btn-outline-primary px-3">Beli Sekarang</a>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>