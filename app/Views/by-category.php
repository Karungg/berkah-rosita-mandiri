<?= $this->extend('layouts/categoryLayout'); ?>

<?= $this->section('content'); ?>
<!-- Product Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-primary mb-3"><span class="fw-light text-dark"></span><?= $products[0]['nama_kategori'] ?></h1>
        </div>
        <div class="row g-4">
            <?php foreach ($products as $product) : ?>
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="product-item text-center border h-100 p-4">
                        <img class="img-fluid mb-4" src="<?= base_url('assets/img/produk/' . $product['gambar']) ?>" alt="">
                        <a href="" class="h6 d-inline-block mb-2"><?= $product['nama_produk'] ?></a>
                        <h5 class="text-primary mb-3">Rp. <?= $product['harga'] ?></h5>
                        <a href="<?= $product['link'] ?>" class="btn btn-outline-primary px-3">Beli Sekarang</a>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>
<!-- Product End -->
<?= $this->endSection(); ?>