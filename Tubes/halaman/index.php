<?php
session_start();
require('index_navbar.php');
include_once("../inc/inc_koneksi.php");
include_once("../inc/inc_fungsi.php");
?>
<!-- Project -->
<div class="project">
  <div class="container project px-4 py-5 mt-2" id="news">
    <div class="row align-items-start">
      <?php foreach (list_news() as $value) { ?>
        <div class="col-md-3">
          <div class="card">
            <a href="<?php echo buat_link_halaman($value[0]) ?>" class="text text-decoration-none nuaing link link-info">
              <img src="../img/<?= news_gambar($value[0]) ?>" class="card-img-top" />
            </a>
            <div class="card-body">
              <a href="<?php echo buat_link_halaman($value[0]) ?>"
                class="text text-decoration-none nuaing link link-info">
                <h5 class="card-title">
                  <?= potongkata($value[2], 50) ?>
                </h5>
              </a>
              <p class="card-text">
                <?= potongkata($value[3], 100) ?>
              </p>
              <p class="card-text"><small class="text-muted">
                  <?= $value[6] ?>
                </small></p>
            </div>
          </div>
        </div>
      <?php }
      ?>
    </div>
    <hr>
  </div>

  <div class="container project2 p-4" id="tranding">
    <h2>Trending Topic</h2>
    <div class="row">
      <div class="col-md-5">
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <?php foreach (list_tranding() as $key => $value) { ?>
              <div class="carousel-item <?= $key == 0 ? 'active' : '' ?>">
                <img src="../img/<?= news_gambar($value[0]) ?>" class="d-block w-100" alt="...">
              </div>
            <?php } ?>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>

      <div class="col-md-7">
        <div class="row">
          <?php foreach (list_tranding() as $key => $value) { ?>
            <div class="col-md-3">
              <div class="card">
                <img src="../img/<?= news_gambar($value[0]) ?>" class="card-img-top">
                <div class="card-body">
                  <span style="font-size: 8px;">Top Tranding</span>
                  <a href="<?php echo buat_link_halaman($value[0]) ?>"
                    class="text text-decoration-none link link-warning">
                    <h5 class="card-title" style="font-size: 12px">
                      <?= potongkata($value[2], 30) ?>
                    </h5>
                  </a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <hr>
  </div>

  <div class="container project3 p-4" id="rekomendasi">
    <div class="row">
      <div class="col-md-8">
        <h2>Recommendation For You</h2>
        <div class="row">
          <?php foreach (list_rekomendasi() as $value) { ?>
            <div class="col-md-4">
              <div class="card">
                <img src="../img/<?= news_gambar($value[0]) ?>" class="card-img-top" alt="tes" />
                <div class="card-body">
                  <a href="<?php echo buat_link_halaman($value[0]) ?>"
                    class="text text-decoration-none link link-warning">
                    <h5 class="card-title">
                      <?= potongkata($value[2], 30) ?>
                    </h5>
                  </a>
                  <p class="card-text">
                    <?= potongkata($value[3], 100) ?>
                  </p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>

      <div class="col-md-4" id="newsfeed">
        <h2>News Feed</h2>
        <?php foreach (newsFeed() as $key => $value) { ?>
          <a href="<?php echo buat_link_halaman($value[0]) ?>" style="text-decoration: none;">
            <div class="warp-list-terpopuler pop-event pop-track-0">
              <div class="content-row">
                <div class="nomor-list">
                  <?= ($key + 1) ?>
                </div>
                <div class="title-terpopuler small">
                  <h3>
                    <?= potongkata($value[2], 100) ?>
                  </h3>
                </div>
              </div>
            </div>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
<?php
require('index_footer.php');
?>

<script src="../js/script.js">

</script>

</body>

</html>