<?php
include_once("../inc/inc_koneksi.php");
include_once("../inc/inc_fungsi.php");

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
    <script src="../js/jquery-3.6.4.min.js"></script>

</head>

<body>
    <!-- Navbar -->
    <div class="navbar-container">
        <nav class="container navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo url_dasar() ?>/img/1.png" alt="Bootstrap" width="100px">
                </a>

                <div class=" d-flex justify-content-end collapse navbar-collapse" id="navbarScroll">
                    <form class="d-flex" role="search">
                        <input class="form-control me-3" type="search" placeholder="Cari Berita" aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit">Search</button>
                    </form>
                    <a href="login.php">
                        <button class="btn btn-outline-dark m-2" type="submit">Masuk</button>
                    </a>
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
                                <a class="nav-link" href="<?php echo url_dasar() ?>#tranding">Tranding Topic</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo url_dasar() ?>#rekomendasi">Rekomendasi</a>
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