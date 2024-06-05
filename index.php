<?php
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/class-autoload.inc.php');
?>
<!-- Carousel Start -->
<div class="container-fluid p-0 pb-2">
    <div class="owl-carousel header-carousel position-relative mb-5">
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="./images/nooruljumah.webp" alt="" height="100vh">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <h1 class="display-2 text-white text-center animated slideInDown">
                            <class="right">Nooruljumah
                        </h1>
                        <p class="text-white text-center animated slideInDown">Your Sunnah Scholars right away!</p>
                        <form" action="#" style="margin:auto;max-width:300px">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search Scholar">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="owl-carousel-item position-relative">
            <img class="img-fluid" src="./images/nooruljumah.webp" alt="">
            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center"
                style="background: rgba(6, 3, 21, .5);">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-10 col-lg-8">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Noorul-Juma'ah</h5>
                            <h1 class="display-3 text-white animated slideInDown mb-4">#1 Site For Your <span
                                    class="text-success">Sunnah</span> Scholars</h1>
                            <p class="fs-5 fw-medium text-white mb-4 pb-2">Free Audio Download of your sunna scholars.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Team Start -->
<div class="container-xxl">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h1 class="mb-5">Scholars</h1>
        </div>
        <div class="row g-4">

            <?php $scholar = new scholars(); ?>
            <?php if ($scholar->getScholars()): ?>
            <?php foreach ($scholar->getScholars() as $scholar): ?>

            <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="team-item p-4">
                    <div class="overflow-hidden mb-4">
                        <a href="details.php?scholar_id=<?= $scholar['scholar_id']; ?>">
                            <?php
                                    if ($scholar['scholar_img'] == "") {
                                        ?>
                            <img class="img-fluid" src="admin/upload/scholar/aside.jpeg">
                            <?php
                                    } else {
                                        ?>
                            <img class="img-fluid image-resize"
                                src="admin/upload/scholar/<?= $scholar['scholar_img']; ?>" alt="">
                            <?php } ?>
                        </a>
                    </div>
                    <h5 class="mb-0"><?= $scholar['scholar_name']; ?></h5>
                    <p><?= $scholar['scholar_location']; ?></p>
                    <div class="btn-slide mt-1">
                        <a href="http://facebook.com/sharer.php?u=http://www.nooruljumah.com/details.php?scholar_id=<?= $scholar['scholar_id']; ?>"
                            target="_blank"><i class="fa fa-share"></i></a>
                        <span>
                            <a href="http://facebook.com/sharer.php?u=http://www.nooruljumah.com/details.php?scholar_id=<?= $scholar['scholar_id']; ?>"
                                target="_blank"><i class="fab fa-facebook-f"></i></a>
                            <a href="http://twitter.com/share?url=http://www.nooruljumah.com/details.php?scholar_id=<?= $scholar['scholar_id']; ?>"
                                target="_blank"><i class="fab fa-twitter"></i></a>
                            <a href="http://instagram.com/share?url=http://www.nooruljumah.com/details.php?scholar_id=<?= $scholar['scholar_id']; ?>"
                                target="_blank"><i class="fab fa-instagram"></i></a>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <?php else: ?>

            <h1>No data found!</h1>

            <?php endif; ?>
        </div>
    </div>
</div>
<!-- Team End -->

<?php
include ('includes/footer.php');
include ('includes/script.php');
?>