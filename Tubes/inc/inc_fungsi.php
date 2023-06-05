<?php
function list_news()
{
    global $koneksi;
    $sql1 = "select * from halaman where kategori = 'topic' limit 5";
    $q1 = mysqli_query($koneksi, $sql1);
    return mysqli_fetch_all($q1);
}

function list_tranding()
{
    global $koneksi;
    $sql1 = "select * from halaman where kategori = 'trending_topic' limit 4";
    $q1 = mysqli_query($koneksi, $sql1);
    return mysqli_fetch_all($q1);
}

function list_rekomendasi()
{
    global $koneksi;
    $sql1 = "select * from halaman where kategori = 'rekomendasi' limit 3";
    $q1 = mysqli_query($koneksi, $sql1);
    return mysqli_fetch_all($q1);
}

function newsFeed()
{
    global $koneksi;
    $sql1 = "select * from halaman where kategori = 'news_feed' limit 4";
    $q1 = mysqli_query($koneksi, $sql1);
    return mysqli_fetch_all($q1);
}

function url_dasar()
{
    $url_dasar = "http://" . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']);
    return $url_dasar;
}

function bersihkan_judul($judul)
{
    $judul_baru = strtolower($judul);
    $judul_baru = preg_replace("/[^a-zA-Z0-9\s]/", "", $judul_baru);
    $judul_baru = str_replace(" ", "-", $judul_baru);
    return $judul_baru;
}
function buat_link_halaman($id)
{
    global $koneksi;
    $sql1 = "select * from halaman where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $judul = bersihkan_judul($r1['judul']);
    // http://localhost/website-company-profile/halaman.php/8/judul
    return url_dasar() . "/isi.php/$id/$judul";
}

function dapatkan_id()
{
    $id = "";
    if (isset($_SERVER['PATH_INFO'])) {
        $id = dirname($_SERVER['PATH_INFO']);
        $id = preg_replace("/[^0-9]/", "", $id);
    }
    return $id;
}

function set_isi($isi)
{
    $isi = str_replace("../img/", url_dasar() . " /img/ ", $isi);
    return $isi;
}

function potongkata($kalimat, $panjang)
{
    if (strlen($kalimat) > $panjang) {
        $kalimat = wordwrap($kalimat, $panjang);
        $kalimat = substr($kalimat, 0, strpos($kalimat, "\n")) . "...";
    }
    return $kalimat;
}

function news_gambar($id)
{
    global $koneksi;
    $sql1 = "select * from halaman where id ='$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $gambar = $r1['gambar'];

    return $gambar;
}
?>