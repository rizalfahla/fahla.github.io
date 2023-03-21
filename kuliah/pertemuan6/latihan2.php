<?php 
//array multidimensi

$mahasiswa =[
            ['daffa', '🍖', '🙉'], 
            ['fadil', '🍗', '🐮'], 
            ['rizal', '🥓', '🐊'], 
            ['fahla', '🍔', '🦍'], 
            ['valdy', '🍟', '🦖']
        ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>latihan 1</title>
</head>
<body>
    
    <h2>Daftar Mahasiswa</h2>

    <?php foreach($mahasiswa as $ms) {?>
    <ul>
        <li>Nama : <?= $ms [0]; ?></li>
        <li>Makanan Favorit : <?= $ms[1]; ?> </li>
        <li>Peliharaan : <?= $ms[2]; ?> </li>
    </ul>

    <?php }?>
</body>
</html>