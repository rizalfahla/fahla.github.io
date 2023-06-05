<?php
session_start();
include_once("../inc/inc_koneksi.php");
include_once("../inc/inc_fungsi.php");
?>

<?php
$email = "";
$password = "";
$err = "";

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($koneksi, "select * from members where id = '$id'");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['email'])) {
        $_SESSION['login'] = true;
        $_SESSION['members_email'] = $row['email'];
        $_SESSION['members_id'] = $row['id'];
        $_SESSION['members_username'] = $row['username'];
        header("Location: ../index.php");
        exit;
    }
}

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($koneksi, "select * from members where email = '$email'");

    if ($email == '' or $password == '') {
        $err .= "<li>Please enter all fields</li>";
    } else {
        $sql1 = "select * from members where email = '$email'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);
        $n1 = mysqli_num_rows($q1);

        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            $_SESSION['login'] = true;

            //coockie
            if (isset($_POST['remember'])) {
                // buat cookie
                $time = time();
                setcookie('id', $row['id'], time() + 60, '/');
                setcookie('key', hash('sha256', $email), time() + 60, '/');
            }

            $_SESSION['members_email'] = $email;
            $_SESSION['members_id'] = $r1['id'];
            $_SESSION['members_username'] = $r1['username'];
            header("Location: ../index.php");
            exit;
        }

        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../img/1.png" type="image/x-icon">
    <title>Sign Up Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/1.png" alt="sing up image"></figure>
                        <a href="register.php" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Form Login</h2>

                        <?php if (isset($error)): ?>
                            <p style="color: red; font-style: italic;">username / password salah</p>
                        <?php endif; ?>
                        <?php if ($err) {
                            echo "<div class='error'><ul class='pesan'>$err</ul></div>";
                        } ?>

                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email" />
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember" id="remember" class="agree-term" />
                                <label for="remember" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>