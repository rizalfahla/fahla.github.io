<?php 
$film =[
    [
        'img' => 'img/jackass.png',
        'judul' => 'Jackass Forever',
        'tahun' => '2022',
        'genre' => ['Documentary', ' Action ', ' Comedy'],
        'PemeranUtama' => ['johnny Knoxville,', ' Steve-o']
    ],
    [
        'img' => 'img/avatar.png',
        'judul' => 'Avatar',
        'tahun' => '2022',
        'genre' => ['Adventure', ' Action', ' Fantasy'],
        'PemeranUtama' => ['Sam Worthington,', ' Zoe Saldana']
    ],
    [
        'img' => 'img/titanic.png',
        'judul' => 'Titanic',
        'tahun' => '1997',
        'genre' => ['Drama', ' Romance'],
        'PemeranUtama' => ['Leonardo Dicaprio,', ' Kate Winslet']
    ],
    [
        'img' => 'img/avenger.png',
        'judul' => 'Avengers Endgame',
        'tahun' => '2019',
        'genre' => ['Adventure', ' Action', ' Drama'],
        'PemeranUtama' => ['Robert Downey Jr, ', 'Chris Evans,', ' Mark Rufallo']
    ],
    [
        'img' => 'img/seven.png',
        'judul' => 'The Magnificent Seven',
        'tahun' => '2016',
        'genre' => ['Adventure', 'Action', 'Western'],
        'PemeranUtama' => ['Denzel Washinton,', ' Chriss Pratt,',' Ethan Hawke']
    ]

    ];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film</title>

    <style>
        .tes {
            width : 400px;
            height : 400px;
        }
    </style>
</head>
<body>
    
        <h1>Daftar Film</h1>

        <?php foreach($film as $fm) {?>
        <ul>
            <li><img src="<?= $fm['img']; ?>" alt="<?= $fm['judul']; ?>" class='tes'></li>
            <li>Judul : <?= $fm['judul']; ?></li>
            <li>Tahun : <?= $fm['tahun']; ?></li>
            <li>Genre : <?php foreach ($fm ['genre'] as $f) {
                echo $f;
            }?>     
            </li>
            <li>Pemeran Utama : <?php foreach ($fm ['PemeranUtama'] as $u) {
                echo $u; } ?></li>
        </ul>
        <?php }?>
</body>
</html>