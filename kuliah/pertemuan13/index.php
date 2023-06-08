<?php
require('functions.php');

if (isset($_GET['button-search'])) {
    $keyword = $_GET['keyword'];
    $query = " SELECT * FROM
                    mahasiswa
                WHERE
                    nama LIKE '%$keyword%' OR 
                    email LIKE '%$keyword%' OR 
                    jurusan LIKE '%$keyword%'
                ";

    $students = query($query);
} else {
    $students = query("SELECT * FROM mahasiswa");
}

$title = 'Home';


require('views/index.view.php');