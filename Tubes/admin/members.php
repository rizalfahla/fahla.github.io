<?php include("inc_header.php") ?>
<?php
$sukses = "";
$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from members where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($q1) {
        $sukses = "Berhasil hapus data";
    }
}
?>
<div class="container">
    <h1>Halaman Admin Members</h1>
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
                <th class="col-1">#</th>
                <th class="col-2">Email</th>
                <th>Nama</th>
                <th class="col-2">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqltambahan = "";
            $per_halaman = 10;
            if ($katakunci != '') {
                $array_katakunci = explode(" ", $katakunci);
                for ($x = 0; $x < count($array_katakunci); $x++) {
                    $sqlcari[] = "(username like '%" . $array_katakunci[$x] . "%' or email like '%" . $array_katakunci[$x] . "%')";
                }
                $sqltambahan = " where " . implode(" or ", $sqlcari);
            }
            $sql1 = "select * from members $sqltambahan";
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
                        <?php
                        if ($r1['status'] == '1') {
                            ?>
                            <span class="badge bg-success">Aktif</span>
                            <?php
                        } else {
                            ?>
                            <span class="badge bg-light">Belum Aktif</span>
                            <?php
                        }
                        ?>
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