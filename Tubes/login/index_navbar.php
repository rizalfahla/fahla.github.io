<?php
include_once("inc/inc_koneksi.php");
include_once("inc/inc_fungsi.php");

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
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopet News</title>
    <!-- ini fungsi untuk menambahkan icon di tab browser -->
    <link rel="shortcut icon" href="<?php echo url_dasar() ?>/img/1.png" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?php echo url_dasar() ?>/ini.css">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <!-- cdjns -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- jquery -->
    <script src="js/jquery-3.6.4.min.js"></script>

</head>

<body>
    <!-- Navbar -->
    <div class="navbar-container">
        <nav class="container navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo url_dasar() ?>#home">
                    <img src="<?php echo url_dasar() ?>/img/1.png" alt="Bootstrap" width="100px">
                </a>

                <div class=" d-flex justify-content-end collapse navbar-collapse" id="navbarScroll">
                    <form class="d-flex" action="<?php echo url_dasar() ?>/search.php" role="search">
                        <div class="input-group">
                            <input type="search" name="keyword" id="keyword" class="form-control" placeholder="Search"
                                aria-label="Search" autocomplete="off">
                            <div class="input-group-btn">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <?php if (isset($_SESSION['members_username'])) { ?>
                        <div class="dropdown ms-2">
                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <?php echo ucwords($_SESSION['members_username']); ?>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><a class="dropdown-item" href="<?php echo url_dasar(); ?>/login/logout.php">Logout</a>
                                </li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <a href="<?php echo url_dasar() ?>/login">
                            <button class="btn btn-outline-dark m-2" type="submit">Signup
                            </button>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <section class="container" id="home">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <div id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="<?php echo url_dasar() ?>#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo url_dasar() ?>#news">News</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo url_dasar() ?>#tranding">Trending Topic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo url_dasar() ?>#rekomendasi">Recommendation</a>
                            </li>
                            <liv class="nav-item">
                                <a href="<?php echo url_dasar() ?>#newsfeed" class="nav-link">News Feed
                                </a>
                                </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </section>
        <!-- akhir navbar -->
    </div>