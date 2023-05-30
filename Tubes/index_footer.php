<?php
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");

?>

<footer class="bg-dark text-white pt-5 pb-4">
    <div class="container text-md-left">
        <div class="row text-md-left">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">
                    Kopet News
                </h5>
                <img src="<?php echo url_dasar() ?>/img/1.png" style="width:150px;">

            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Category</h5>
                <p>
                    <a href="<?php echo url_dasar() ?>#news" class="text-white" style="text-decoration: none;">News</a>
                </p>
                <p>
                    <a href="<?php echo url_dasar() ?>#tranding" class="text-white"
                        style="text-decoration: none;">Trending Topic</a>
                </p>
                <p>
                    <a href="<?php echo url_dasar() ?>#rekomendasi" class="text-white"
                        style="text-decoration: none;">Recommendation For You</a>
                </p>
                <p>
                    <a href="<?php echo url_dasar() ?>#newsfeed" class="text-white" style="text-decoration: none;">News
                        Feed</a>
                </p>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact</h5>
                <p>
                    <i class="fas fa-home mr-3"></i> Bandung, Indonesia
                </p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> kopetnews666@gmail.com
                </p>
                <p>
                    <i class="fas fa-phone mr-3"></i> +62123456789
                </p>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row align-items-center ">
            <div class="col-md-7 col-lg-8">
                <p>
                    Copyright &#169;2023 All Right Reserved by:
                    <a href="#" class="text-warning" style="text-decoration: none;">Kopet News</a>
                </p>
            </div>

            <div class="col-md-5 col-lg-4">
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px ;"><i
                                    class="fab fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px ;"><i
                                    class="fab fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px ;"><i
                                    class="fab fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size:23px ;"><i
                                    class="fab fa-youtube"></i></a>
                        </li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
</footer>