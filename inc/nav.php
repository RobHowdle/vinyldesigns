<?php
    $currentPage = basename($_SERVER['SCRIPT_NAME'] ?? '');
    if ($currentPage === '') {
        $currentPage = 'index.php';
    }

    $isActive = function (string $page) use ($currentPage): bool {
        return $page === $currentPage;
    };
?>

<nav class="navbar navbar-expand-lg navbar-dark" data-aos="fade-up">
    <div class="nav-button text-center">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">

        <ul class="navbar-nav nav-fill w-100">

        <li class="nav-item<?php echo $isActive('index.php') ? ' active' : ''; ?>">
            <a class="nav-link" href="index.php" <?php echo $isActive('index.php') ? 'aria-current="page"' : ''; ?> data-aos="fade-right" data-aos-delay="300">Home<?php echo $isActive('index.php') ? ' <span class="sr-only">(current)</span>' : ''; ?></a>
        </li>

        <li class="nav-item<?php echo $isActive('services.php') ? ' active' : ''; ?>">
            <a class="nav-link" href="services.php" <?php echo $isActive('services.php') ? 'aria-current="page"' : ''; ?> data-aos="fade-right" data-aos-delay="200">Services<?php echo $isActive('services.php') ? ' <span class="sr-only">(current)</span>' : ''; ?></a>
        </li>

        <li class="nav-item<?php echo $isActive('testimonials.php') ? ' active' : ''; ?>">
            <a class="nav-link" href="testimonials.php" <?php echo $isActive('testimonials.php') ? 'aria-current="page"' : ''; ?> data-aos="fade-left" data-aos-delay="200">Testimonials<?php echo $isActive('testimonials.php') ? ' <span class="sr-only">(current)</span>' : ''; ?></a>
        </li>

        <li class="nav-item<?php echo $isActive('contact.php') ? ' active' : ''; ?>">
            <a class="nav-link" href="contact.php" <?php echo $isActive('contact.php') ? 'aria-current="page"' : ''; ?> data-aos="fade-left" data-aos-delay="300">Contact<?php echo $isActive('contact.php') ? ' <span class="sr-only">(current)</span>' : ''; ?></a>
        </li>

        </ul>

    </div>
</nav>

<div class="navbar-dark bg-dark" data-aos="fade-up" data-aos-delay="100">
    <a class="navbar-brand" href="index.php"><img src="img/VDLogoThick.png" class="img-fluid"></a>
</div>

