<?php
session_start();
include_once("../inc/inc_koneksi.php");
?>

<?php
$username = "";
$email = "";
$password = "";
$password2 = "";
$err = "";
$sukses = "";

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $old_password = $_POST['old_password'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($username == '') {
        $err .= "<li>Silakan masukkan nama lengkap</li>";
    }

    if ($password != '') { //jika akan melakukan perubahan password
        $sql1 = "select * from members where email = '" . $_SESSION['members_email'] . "'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        if ($confirm_password == '' or $password == '') {
            $err .= "<li>Silakan masukkan password lama, password baru serta konfirmasi password</li>";
        }

        if ($password != $confirm_password) {
            $err .= "<li>Silakan masukkan password dan konfirmasi password yang sama</li>";
        }

        if (strlen($password) < 6) {
            $err .= "<li>Panjang karakter yang diizininkan untuk password adalah 6 karakter, minimal.</li>";
        }
    }
    $password = password_hash($password, PASSWORD_DEFAULT);
    if (empty($err)) {
        if (password_verify($old_password, $r1['password'])) {
            $sql2 = "update members set password = '" . $password . "', username = '" . $username . "' where email = '" . $_SESSION['members_email'] . "'";
            mysqli_query($koneksi, $sql2);

            $_SESSION['members_username'] = $username;

            $sukses = "Data berhasil diubah";
            $delay = 0; // Where 0 is an example of a time delay. You can use 5 for 5 seconds, for example!
            header("Refresh: $delay;");
            exit();
        } else {
            $err .= "<li>Password lama tidak sesuai.</li>";
        }
    }
}
?>

<?php
include("../index_navbar.php");
include_once("../inc/inc_fungsi.php");
?>

<div class="container my-3">
    <div class="card">
        <div class="card-header">
            <h5>Profile</h1>
        </div>
        <form action="" method="POST">
            <!-- <input type="hidden" nama="register" value="true"> -->
            <div class="card-body">
                <?php if ($err) {
                    echo "<div class='error'><ul>$err</ul></div>";
                } ?>
                <?php if ($sukses) {
                    echo "<div class='sukses'>$sukses</div>";
                } ?>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" disabled class="form-control" id="email"
                        value="<?php echo $_SESSION['members_email'] ?>">
                </div>
                <div class="mb-2">
                    <label for="username" class="form-label"><span class="text-danger">*</span> Nama Lengkap</label>
                    <input type="text" class="form-control" id="username" name="username"
                        value="<?php echo $_SESSION['members_username'] ?>" required>
                </div>
                <hr>
                <div class="mb-2">
                    <label for="old_password" class="form-label"><span class="text-danger">*</span> Password
                        Lama</label>
                    <input type="password" class="form-control" id="old_password" name="old_password" required>
                </div>
                <div class="mb-2">
                    <label for="password" class="form-label"><span class="text-danger">*</span> Password Baru</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-2">
                    <label for="confirm_password" class="form-label"><span class="text-danger">*</span> Ulangi Password
                        Baru</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-end mb-2" name="register">
                    <span class="fa fa-save"></span> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<?php include("../index_footer.php") ?>