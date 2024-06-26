<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Hairnic - Single Product Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="<?= base_url('template/') ?>img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap" rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Libraries Stylesheet -->
    <link href="<?= base_url('template/') ?>lib/animate/animate.min.css" rel="stylesheet" />
    <link href="<?= base_url('template/') ?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('template/') ?>css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="<?= base_url('template/') ?>css/style.css" rel="stylesheet" />
</head>

<body>
    <?= $this->include('partials/spinner'); ?>

    <?= $this->include('partials/navbar'); ?>

    <?= $this->include('partials/hero'); ?>

    <?= $this->include('partials/about'); ?>

    <!-- Product Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <?= $this->renderSection('content'); ?>
        </div>
    </div>
    <!-- Product End -->

    <?= $this->include('partials/subcribe'); ?>

    <?= $this->include('partials/footer'); ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('template/') ?>lib/wow/wow.min.js"></script>
    <script src="<?= base_url('template/') ?>lib/easing/easing.min.js"></script>
    <script src="<?= base_url('template/') ?>lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url('template/') ?>lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= base_url('template/') ?>js/main.js"></script>
</body>

</html>