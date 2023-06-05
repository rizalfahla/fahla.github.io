<?php
session_start();
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");
//http://localhost/pw2023_223040125/Tubes/halaman/isi.php/20/12-jenderal-tni-jadi-staf-khusus-baru-ksad-dudung-ini-daftarnya 
//print_r($_SERVER);
$id = dapatkan_id();

$sql1 = "select * from halaman where id = '$id'";
$q1 = mysqli_query($koneksi, $sql1);
$n1 = mysqli_num_rows($q1);
$r1 = mysqli_fetch_array($q1);

$sqlGetKomentar = "select *from komentar a join members b on a.id_member = b.id where a.id_halaman = '" . $id . "'";
$q2 = mysqli_query($koneksi, $sqlGetKomentar);

$judul_halaman = $r1['judul'];

$successKomentar = false;

if (isset($_POST['description'])) {
    $id_member = $_POST['id_member'];
    $id_halaman = $_POST['id_halaman'];
    $description = $_POST['description'];

    $query = "INSERT INTO komentar (id_member, id_halaman, description) VALUES
    ('$id_member', '$id_halaman', '$description')";

    mysqli_query($koneksi, $query);
    $successKomentar = mysqli_affected_rows($koneksi);
    header("Refresh:0");
}
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
            <div class="col-md-9">
                <ol class="breadcrumb mt-3">
                    <li class=" breadcrumb-item"><a href=" <?php echo url_dasar() ?>/index.php"
                            class="text text-decoration-none">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <?php echo ucwords($r1['kategori']); ?>
                    </li>
                </ol>
                <h1 class="judul row justify-content-center">
                    <?= $r1['judul']; ?>
                </h1>
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <?= $r1['penulis']; ?> -
                            <span class="text-muted">
                                <?= $r1['tgl_isi']; ?>
                            </span>
                        </p>
                    </div>
                </div>
                <div class="gambar">
                    <img src="<?php echo url_dasar() ?>/img/<?= news_gambar($r1['id']) ?>" class="img-fluid w-full">
                </div>

                <div class="isi">
                    <?php echo set_isi($r1['isi']) ?>
                </div>

            </div>
            <div class="col-md-3">
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

        <hr>

        <div id="komentar" class="mb-3">
            <h3>Comment</h3>
            <?php if (mysqli_num_rows($q2)) { ?>
                <?php while ($obj = mysqli_fetch_object($q2)) { ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>
                                <?php echo $obj->email; ?>
                            </h5>
                            <span>
                                <?php echo $obj->description; ?>
                            </span><br>
                            <i style="font-size: 10px;">
                                <?php echo date('d F Y H:i', strtotime($obj->created_at)); ?>
                                </p>
                        </div>
                    </div>
                <?php } ?>
                <hr>
            <?php } else { ?>
                <h6>No Comments Yet</h6>
                <hr>
            <?php } ?>
        </div>

        <?php if ($_SESSION) { ?>
            <h3>Leave a Comment</h3>
            <div class="mb-3">
                <form method="post">
                    <input type="hidden" name="id_member" value="<?php echo $_SESSION['members_id']; ?>">
                    <input type="hidden" name="id_halaman" value="<?php echo $id; ?>">
                    <textarea class="form-control" id="description" name="description" placeholder="Enter Your Comment Here"
                        rows="3" required></textarea>
                    <button type="submit" class="btn btn-primary mt-3"><span class="fa fa-save"></span> Send</button>
                </form>
            </div>
        <?php } else { ?>
            <h3>Leave a Comment</h3>
            <a href="<?php echo url_dasar() ?>/login" class="btn btn-primary my-3"><span class="fa fa-save"></span> Log
                In</a>
        <?php } ?>


    </div>

</body>
<?php
require('index_footer.php');
?>

</html>