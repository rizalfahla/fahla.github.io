<?php
include_once("../inc/inc_koneksi.php");
include_once("../inc/inc_fungsi.php");
//http://localhost/pw2023_223040125/Tubes/halaman/isi.php/20/12-jenderal-tni-jadi-staf-khusus-baru-ksad-dudung-ini-daftarnya 
//print_r($_SERVER);
$id = dapatkan_id();

$sql1 = "select * from halaman where id = '$id'";
$q1 = mysqli_query($koneksi, $sql1);
$n1 = mysqli_num_rows($q1);
$r1 = mysqli_fetch_array($q1);

$judul_halaman = $r1['judul'];
?>

<?php
require('index_navbar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopet News</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-9">
                <ol class="breadcrumb mt-3">
                    <li class=" breadcrumb-item"><a href=" <?php echo url_dasar() ?>/index.php"
                            class="text text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                </ol>
                <h1 class="judul row justify-content-center">
                    <?= $r1['judul']; ?>
                </h1>
                <div class="row">
                    <div class="col-6">
                        <p>
                            <?= $r1['penulis']; ?> -
                            <span class="text-muted">
                                <?= $r1['tgl_isi']; ?>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="gambar">
                    <img src="../../../img/<?= news_gambar($r1['id']) ?>" class="img-fluid w-full">
                </div>

                <div class="isi">
                    <?php echo set_isi($r1['isi']) ?>
                </div>

            </div>
            <div class="col-3">
                <h4 class="judul mt-5">
                    Now Trending
                </h4>
                <hr>
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

</body>
<?php
require('index_footer.php');
?>

</html>