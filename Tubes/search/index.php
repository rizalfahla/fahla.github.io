<?php
session_start();
require('index_navbar.php');
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");

$keyword = "";
$hasil = [];

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    $result = mysqli_query($koneksi, "select *from halaman where judul like '%" . $keyword . "%' or isi like '%" . $keyword . "%'");
    $hasil = mysqli_fetch_all($result);
}
?>
<div class="container project px-4 py-5 mt-2">
    <p>Hasil pencarian
        <b>"
            <?php echo $keyword; ?>"
        </b>,
        <?php echo count($hasil); ?> hasil ditemukan
    </p>
    <div class="row">
        <?php foreach ($hasil as $value) { ?>
            <div class="col-md-3 mt-3">
                <div class="card">
                    <a href="<?php echo buat_link_halaman($value[0]) ?>"
                        class="text text-decoration-none nuaing link link-info">
                        <img src="<?php echo url_dasar() ?>/img/<?= news_gambar($value[0]) ?>" class="card-img-top" />
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
        <?php } ?>
    </div>
</div>





<?php
require('index_footer.php');
?>