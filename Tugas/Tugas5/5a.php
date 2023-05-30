<?php 
$mahasiswa = [
    [
        "Nama" => "Rizal Fahla",
        "Nrp" => "223040125",
        "Email" => "Rizal.223040125@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "img" => "img/1.jpg"
    ],
    [
        "Nama" => "Muhammad Daffa Riyadi",
        "Nrp" => "223040120",
        "Email" => "Daffa.223040120@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "img" => "img/2.jpeg"
    ],
    [
        "Nama" => "Fadhil Rizki Fauzan",
        "Nrp" => "223040105",
        "Email" => "Fadhil.223040105@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "img" => "img/3.jpg"
    ],
    [
        "Nama" => "Rivaldy Novyan Dwi Putra",
        "Nrp" => "223040110",
        "Email" => "Rivaldy.223040110@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "img" => "img/4.jpeg"
    ],
    [
        "Nama" => "Zacky Azmi Asikin",
        "Nrp" => "223040127",
        "Email" => "Zacky.223040127@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "img" => "img/5.jpg"
    ],
    [
        "Nama" => "Zabihullah Achmad Afghiansyah",
        "Nrp" => "223040119",
        "Email" => "Zabihullah.223040119@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "img" => "img/6.jpg"
    ],
    [
        "Nama" => "Subagiono Prakoso",
        "Nrp" => "223040124",
        "Email" => "Subagiono.223040124@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "img" => "img/7.jpeg"
    ],
    [
        "Nama" => "Rayhan Alfa Rezki",
        "Nrp" => "223040121",
        "Email" => "Rayhan.223040121@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "img" => "img/8.jpg"
    ],
    [
        "Nama" => "Salman Alfarizi",
        "Nrp" => "223040108",
        "Email" => "Salman.223040108@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "img" => "img/9.jpg"
    ],
    [
        "Nama" => "Diki Faturrohman",
        "Nrp" => "223040117",
        "Email" => "Diki.223040117@mail.unpas.ac.id",
        "Jurusan" => "Teknik Informatika",
        "img" => "img/10.jpg"
    ],
]


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 5a</title>
    <style>
        .ini {
            width : 200px;
            height : 200px;
        }
    </style>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <ul>
                <li><img src="<?= $mhs["img"]; ?>" class = 'ini'></li>
                <li>NAMA : <?= $mhs["Nama"]; ?></li>
                <li>NRP : <?= $mhs["Nrp"]; ?> </li>
                <li>EMAIL : <?= $mhs["Email"]; ?></li>
                <li>JURUSAN :<?= $mhs["Jurusan"]; ?> </li>
            </ul>
        <?php endforeach; ?>

</body>
</html>