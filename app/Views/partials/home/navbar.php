<!-- Navbar Start -->
<div class="container-fluid sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light p-0">
            <a href="<?= base_url() ?>" class="navbar-brand">
                <img src="<?= base_url('assets/img/web/logo.png') ?>" alt="logo" width="100">
            </a>
            <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="<?= base_url() ?>" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Products</a>
                        <div class="dropdown-menu bg-light mt-2">
                            <?php foreach ($categories as $category) : ?>
                                <a href="<?= base_url('categories/' . $category['nama_kategori']) ?>" class="dropdown-item"><?= $category['nama_kategori'] ?></a>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light mt-2">
                            <a href="feature.html" class="dropdown-item">Features</a>
                            <a href="how-to-use.html" class="dropdown-item">How To Use</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="blog.html" class="dropdown-item">Blog Articles</a>
                            <a href="404.html" class="dropdown-item">404 Page</a>
                        </div>
                    </div> -->
                    <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                </div>
                <?php if (!logged_in()) { ?>
                    <a href="<?= base_url('login') ?>" class="btn btn-dark py-2 px-4 d-none d-lg-inline-block">Login</a>
                <?php } else { ?>
                    <?php if (in_groups('admin')) { ?>
                        <a href="<?= base_url('admin') ?>" class="btn btn-dark py-2 px-4 d-none d-lg-inline-block">Dashboard</a>
                    <?php } ?>
                <?php } ?>
            </div>
        </nav>
    </div>
</div>
<!-- Navbar End -->