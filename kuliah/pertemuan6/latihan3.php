<?php 
//array associative
//array yang indexnya adalah string yang kita buat sendiri

$mahasiswa =[
            [
                'nama' => 'daffa',
                'makanan' => ['🍖'], 
                'peliharaan' => '🙉'
            ], 
            [
                'nama' => 'fadil', 
                'makanan' => ['🍗', '🍖'], 
                'peliharaan' => '🐮'
            ], 
            [
                'nama' => 'rizal', 
                'makanan' => ['🥓'], 
                'peliharaan' => '🐊'
            ], 
            [
                'nama' => 'fahla', 
                'makanan' => ['🍔'], 
                'peliharaan' => '🦍'
            ], 
            [
                'nama' => 'valdy', 
                'makanan' => ['🍟', '🍔'], 
                'peliharaan' =>'🦖'
            ]
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
        <li>Nama : <?= $ms ['nama']; ?></li>
        <li>Makanan Favorit : 
            <?php foreach ($ms ['makanan'] as $m) {
                echo $m;
            }?>     
        </li>
        <li>Peliharaan : <?= $ms['peliharaan']; ?> </li>
    </ul>

    <?php }?>
</body>
</html>