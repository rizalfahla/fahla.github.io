<?php
session_start();
include_once("inc_koneksi.php");
include_once("inc_fungsi.php");
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
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($username == '' or $email == '' or $password == '' or $password2 == '') {
        $err .= "<li>please enter all fields.</li>";
    }

    //cek di db apakah email sudah ada atau belum

    if ($email != '') {
        $sql1 = "select email from members where email = '$email'";
        $q1 = mysqli_query($koneksi, $sql1);
        $n1 = mysqli_num_rows($q1);
        if ($n1 > 0) {
            $err .= "<li>The email you entered is already registered.</li>";
        }

        //validasi email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err .= "<li>The email you entered is invalid.</li>";
        }
    }

    //cek password
    if ($password != $password2) {
        $err .= "<li>Password and password confirmation do not match.</li>";
    }
    if (strlen($password) < 6) {
        $err .= "<li>The allowed character length for passwords is at least 6 characters.</li>";
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    if (empty($err)) {
        $status = "1";
        $sql1 = "insert into members(username,email,password,status) values ('$username','$email','$password','$status')";
        $q1 = mysqli_query($koneksi, $sql1);

        if ($q1) {
            $sukses = "Process is successful";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="main">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Form Registration</h2>
                        <?php if ($err) {
                            echo "<div class='error'><ul>$err</ul></div>";
                        } ?>
                        <?php if ($sukses) {
                            echo "<div class='sukses'>$sukses</div>";
                        } ?>
                        <br>
                        <form action="" method="POST" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <label for="password2"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password2" id="password2"
                                    placeholder="Repeat your password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all
                                    statements in <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="register" id="register" class="form-submit"
                                    value="Register" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/1.png" alt="sing up image"></figure>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>