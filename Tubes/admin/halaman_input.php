<?php include("inc_header.php") ?>
<?php
$judul = "";
$kutipan = "";
$isi = "";
$penulis = "";
$gambar = "";
$gambar_name = "";
$kategori = "";
$error = "";
$sukses = "";

function gantiTandaKutip($teks)
{
    $teks = str_replace("'", "\"", $teks);
    return $teks;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql1 = "select * from halaman where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $penulis = $r1['penulis'];
    $judul = $r1['judul'];
    $kutipan = $r1['kutipan'];
    $isi = $r1['isi'];
    $gambar = $r1['gambar'];
    $kategori = $r1['kategori'];


    if ($isi == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) {
    $penulis = $_POST['penulis'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kutipan = $_POST['kutipan'];
    $kategori = $_POST['kategori'];






    if ($judul == '' or $isi == '') {
        $error = "Silakan masukkan semua data yakni data isi dan judul.";
    }

    //Array ( [foto] => Array ( [name] => Budi Rahardjo.jpg [type] => image/jpeg [tmp_name] => C:\xampp2\tmp\php4FDD.tmp [error] => 0 [size] => 2375701 ) )
    // print_r($_FILES);

    if ($_FILES['gambar']['name']) {
        $gambar_name = $_FILES['gambar']['name'];
        $gambar_file = $_FILES['gambar']['tmp_name'];

        $detail_file = pathinfo($gambar_name);
        $foto_ekstensi = $detail_file['extension'];
        // Array ( [dirname] => . [basename] => Romi Satrio Wahono.jpg [extension] => jpg [filename] => Romi Satrio Wahono )
        $ekstensi_yang_diperbolehkan = array("jpg", "jpeg", "png", "gif");
        if (!in_array($foto_ekstensi, $ekstensi_yang_diperbolehkan)) {
            $error = "Ekstensi yang diperbolehkan adalah jpg, jpeg, png dan gif";
        }
    }

    if (empty($error)) {
        if ($gambar_name) {
            $direktori = "../img";

            @unlink($direktori . "/$gambar"); //delete data

            $gambar_name = "news_" . time() . "_" . $gambar_name;
            move_uploaded_file($gambar_file, $direktori . "/" . $gambar_name);

            $gambar = $gambar_name;
        } else {
            $gambar_name = $gambar; // memasukan data dari yang sebelumnya ada 
        }

        if ($id != "") {
            $sql1 = "update halaman set penulis = '$penulis', judul = '$judul',kutipan='$kutipan',isi='" . gantiTandaKutip($isi) . "',gambar='$gambar_name', kategori='$kategori', tgl_isi=now() where id = '$id'";
        } else {
            $sql1 = "INSERT into halaman(penulis,judul,kutipan,isi,gambar,kategori) values ('$penulis','$judul','$kutipan','" . gantiTandaKutip($isi) . "','$gambar_name','$kategori')";
        }
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Sukses memasukkan data";
        } else {
            $error = "Gagal cuy masukkan data";
        }
    }
}


?>
<h1>Halaman Admin Input Data</h1>
<div class="mb-3 row">
    <a href="halaman.php">
        << Kembali ke halaman admin</a>
</div>
<?php
if ($error) {
    ?>
    <div class="alert alert-danger" role="alert">
        <?php echo $error ?>
    </div>
    <?php
}
?>
<?php
if ($sukses) {
    ?>
    <div class="alert alert-primary" role="alert">
        <?php echo $sukses ?>
    </div>
    <?php
}
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3 row">
        <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="penulis" value="<?php echo $penulis ?>" name="penulis"
                autocomplete="off">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="judul" class="col-sm-2 col-form-label">Judul</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="judul" value="<?php echo $judul ?>" name="judul"
                autocomplete="off">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="kutipan" class="col-sm-2 col-form-label">Kutipan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="kutipan" value="<?php echo $kutipan ?>" name="kutipan"
                autocomplete="off">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="isi" class="col-sm-2 col-form-label">Isi</label>
        <div class="col-sm-10">
            <textarea name="isi" class="form-control" id="summernote"><?php echo $isi ?></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="gambar" class="col-sm-2 col-form-label">Input Gambar</label>
        <div class=" col-sm-10">
            <img src="" alt="">
            <?php
            if ($gambar) {
                echo "<img src='../img/$gambar' style='max-height:100px;max-width:100px' >";
            }
            ?>
            <input class="form-control" name="gambar" type="file" id="gambar">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select form-select-lg mb-3"
            aria-label=".form-select-lg example">
            <option selected>Pilihan</option>
            <option value="topic">Topic</option>
            <option value="trending_topic">Trending Topic</option>
            <option value="news_feed">News Feed</option>
            <option value="rekomendasi">Rekomendasi Untuk Anda</option>
        </select>
    </div>
    <br>
    <div class="mb-3 row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
        </div>
    </div>
</form>
<?php include("inc_footer.php") ?>