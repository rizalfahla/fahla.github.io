<?php 
    $x = 25;
    $hasilkali = $x * 5;
    $hasilbagi = $hasilkali / 2;
    $ditambah = $hasilbagi + 75;
    $dikurang = $ditambah - 20;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1b</title>
</head>
<body>
    <p>
        Aku adalah angka <b><?php echo $x ?></b><br>
        Jika aku dikali 5, maka aku sekarang menjadi <b><?php echo $hasilkali ?></b><br>
        Jika aku dibagi 2, maka aku sekarang menjadi <b><?php echo $hasilbagi ?></b><br>
        Jika aku ditambah 75, maka aku sekarang menjadi <b><?php echo $ditambah ?></b><br>
        Jika aku dikurang 20, maka aku sekarang menjadi <b><?php echo $dikurang ?></b><br>
    </p>
</body>
</html>