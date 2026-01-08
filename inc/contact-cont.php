<section id="contact">
    <div class="section-content text-center" data-aos="fade-up" data-aos-delay="200">
        <h1 class="section-header">Get in <span class="content-header wow fadeIn" data-wow-delay="0.2s" data-wow-duration="2s"> Touch with us</span></h1>
        <h3>We aim to respond as quickly as we can to your email, if you'd prefer to speak to us then give us a call!</h3>
    </div>
    <div class="contact-section">
        <div class="container">

            <?php if (isset($_GET['status'])): ?>
                <?php
                $status = $_GET['status'];
                $isSuccess = ($status === 'success');
                $alertClass = $isSuccess ? 'alert-success' : 'alert-danger';
                $alertText = $isSuccess
                    ? 'Thanks — your message has been sent.'
                    : 'Sorry — there was a problem sending your message. Please try again.';
                ?>
                <div class="alert <?php echo $alertClass; ?>" role="alert">
                    <?php echo $alertText; ?>
                </div>
            <?php endif; ?>

            <div class="text-center mb-4">
                <a class="btn btn-info btn-contact-call btn-lg" href="tel:07966269224">
                    <i class="fas fa-phone" aria-hidden="true"></i>
                    CALL NOW
                </a>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10" data-aos="fade-up" data-aos-delay="300">
                    <div class="contact-form-box">
                        <form action="handler.php" method="post" id="contact_form" role="form" novalidate>
                            <div class="messages"></div>

                            <div class="form-row">
                                <div class="col-md-6 form-line pr-md-4">
                                    <div class="form-group mb-4">
                                        <input type="text" name="name" class="form-control" placeholder="Your Name" autocomplete="name" required>
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="email" name="email" class="form-control" placeholder="Your Email" autocomplete="email" required>
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="tel" name="number" class="form-control" placeholder="Your Contact Number" autocomplete="tel">
                                    </div>
                                </div>

                                <div class="col-md-6 pl-md-4 mt-4 mt-md-0">
                                    <div class="form-group mb-4">
                                        <textarea class="form-control" name="message" id="description" placeholder="Enter Your Message" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <div class="g-recaptcha" data-sitekey="6LdGqgAVAAAAAPrMUDkIoFjIv4_W6PjAFdfvLiE5"></div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block submit">
                                        <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                        Send Message
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>