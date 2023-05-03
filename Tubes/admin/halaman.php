<?php include("inc_header.php") ?>
<?php
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
$sukses = "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = '';
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "select gambar from halaman where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    @unlink("../img/" . $r1['gambar']);

    if ($q1) {
        $sukses = "Berhasil hapus data";
    }
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from halaman where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);

    if ($q1) {
        $sukses = "Berhasil hapus data";
    }
}

?>
<h1>Halaman Admin</h1>
<p>
    <a href="halaman_input.php">
        <input type="button" class="btn btn-primary" value="buat halaman baru" />
    </a>
</p>
<?php
if ($sukses) {
    ?>
    <div class="alert alert-primary" role="alert">
        <?= $sukses; ?>
    </div>

    <<?php } ?>
    <form class="row g-3" method="get">
        <div class="col-auto">
            <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="katakunci"
                value="<?php echo $katakunci ?>" autocomplete="off" />
        </div>
        <div class="col-auto">
            <input type="submit" name="cari" value="Cari Tulisan" class="btn btn-secondary">
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-1">#</th>
                <th class="col-2">Gambar</th>
                <th>Judul</th>
                <th>Kutipan</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqltambahan = "";
            $per_halaman = 2;
            if ($katakunci != '') {
                $array_katakunci = explode(" ", $katakunci);
                for ($x = 0; $x < count($array_katakunci); $x++) {
                    $sqlcari[] = "(judul like '%" . $array_katakunci[$x] . "%' or 
                                kutipan like '%" . $array_katakunci[$x] . "%' or 
                                isi like '%" . $array_katakunci[$x] . "%' )";
                }
                $sqltambahan = "where " . implode("or", $sqlcari);
            }

            $sql1 = "SELECT * FROM halaman $sqltambahan ";
            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
            $q1 = mysqli_query($koneksi, $sql1);
            $total = mysqli_num_rows($q1);
            $pages = ceil($total / $per_halaman);
            $nomor = $mulai + 1;
            $sql1 = $sql1 . " order by id desc limit $mulai, $per_halaman";

            $q1 = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_array($q1)) {
                ?>
                <tr>
                    <td>
                        <?= $nomor++; ?>
                    </td>
                    <td>
                        <img src="../img/<?= news_gambar($r1['id']) ?>" style="max-height:150px;max-width:150px" />
                    </td>
                    <td>
                        <?= $r1['judul']; ?>
                    </td>
                    <td>
                        <?= $r1['kutipan']; ?>
                    </td>
                    <td>
                        <a href="halaman_input.php?id=<?= $r1['id'] ?>">
                            <span class=" badge bg-warning text-dark">Edit</span>
                        </a>
                        <a href="halaman.php?op=delete&id=<?= $r1['id']; ?>"
                            onclick="return confirm('Apakah yakin mau hapus data ?')">
                            <span class="badge bg-danger">Delete</span>
                        </a>
                    </td>
                </tr>
                <?php
            }

            ?>

        </tbody>
    </table>

    <nav aria-label="page navigation example">
        <ul class="pagination">
            <?php
            $cari = isset($_GET['cari']) ? $_GET['cari'] : "";

            for ($i = 1; $i <= $pages; $i++) {
                ?>
                <li class="page-item"></li>
                <a class="page-link"
                    href="halaman.php?katakunci=<?php echo $katakunci ?>&cari= <?= $cari ?>&page=<?= $i ?>">
                    <?= $i; ?>
                </a>
                <?php
            }

            ?>
        </ul>

    </nav>
    <?php include("inc_footer.php") ?>