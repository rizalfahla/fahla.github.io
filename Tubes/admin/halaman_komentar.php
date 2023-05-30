<?php include("inc_header.php") ?>
<?php
$id = $_GET['id'];
$sukses = "";
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $idKomentar = $_GET['id_komentar'];
    $sql1 = "delete from komentar where id = '$idKomentar'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    }
}
?>

<div class="container">
    <h1>Halaman Admin Komentar</h1>
    <?php
    if ($sukses) {
        ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $sukses ?>
        </div>
        <?php
    }
    ?>
    <table class="table table-striped" id="tableData">
        <thead>
            <tr>
                <th class=" col-1">#</th>
                <th class="col-1">Email</th>
                <th>Nama</th>
                <th class="col-7">Komentar</th>
                <th class="col-1">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqltambahan = "where 1 = 1 and a.id_halaman = '" . $id . "'";
            $per_halaman = 5;
            if ($katakunci != '') {
                $array_katakunci = explode(" ", $katakunci);
                for ($x = 0; $x < count($array_katakunci); $x++) {
                    $sqlcari[] = "(username like '%" . $array_katakunci[$x] . "%' or email like '%" . $array_katakunci[$x] . "%')";
                }
                $sqltambahan = " and " . implode(" or ", $sqlcari);
            }
            $sql1 = "select a.*, b.username, b.email from komentar a join members b on a.id_member = b.id $sqltambahan";
            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $mulai = ($page > 1) ? ($page * $per_halaman) - $per_halaman : 0;
            $q1 = mysqli_query($koneksi, $sql1);
            $total = mysqli_num_rows($q1);
            $pages = ceil($total / $per_halaman);
            $nomor = $mulai + 1;
            $sql1 = $sql1 . " order by id desc limit $mulai,$per_halaman";

            $q1 = mysqli_query($koneksi, $sql1);

            while ($r1 = mysqli_fetch_array($q1)) {
                ?>
                <tr>
                    <td>
                        <?php echo $nomor++ ?>
                    </td>
                    <td>
                        <?php echo $r1['email'] ?>
                    </td>
                    <td>
                        <?php echo $r1['username'] ?>
                    </td>
                    <td>
                        <?php echo $r1['description']; ?>
                    </td>
                    <td>
                        <a href="halaman_komentar.php?op=delete&id=<?= $id ?>&id_komentar=<?= $r1['id'] ?>"
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

</div>
<?php include("inc_footer.php") ?>

<script>
    $(document).ready(function () {
        $('#tableData').DataTable();
    });
</script>