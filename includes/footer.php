 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-light footer pt-5 wow fadeIn" data-wow-delay="0.1s" style="margin-top: 6rem;">
        <div class="container py-5">
            <div class="row g-5">

                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Address</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Kawo Kaduna, Nigeria</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+234 9121 5828 83</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>Admin@nooruljumah.com</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                    
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Recent Scholars</h4>

                            <?php $recent = new scholars (); ?>       
                                <?php if($recent->getRecentScholars()) : ?>
                                    <?php foreach($recent->getRecentScholars() as $recent) : ?>

                                <a class="btn btn-link" href="details.php?scholar_id=<?= $recent['scholar_id'];?>"><?= $recent["scholar_name"] ?></a>

                                <?php endforeach; ?>
                        <?php endif; ?>
                </div>


                <div class="col-lg-4 col-md-6">
                    <h4 class="text-light mb-4">Recent Audio</h4>
                    <?php $audio = new audio (); ?>       
                        <?php if($audio->getAudio()) : ?>
                            <?php foreach($audio->getAudio() as $audio) : ?>
                                <a class="btn btn-link" href="files.php?file_id=<?= $audio['file_id'];?>"><?= $audio["audio_name"] ?></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                </div>
                <!-- <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Newsletter</h4>
                    <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                    <div class="position-relative mx-auto" style="max-width: 400px;">
                        <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Noorul Juma'ah</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        <!-- Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        </br>Distributed By <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->