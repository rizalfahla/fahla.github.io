<?php 

echo "<h4> Menghitung Luas Lingkaran</h4>";
function LuasLingkaran($r){
    $phi = 3.14;
    return $phi * $r * $r;
}
echo "jari- jari = 10 cm <br>";
echo "Luas Lingkaran = ";
echo LuasLingkaran(10);
echo " cm^2";


echo "<hr>";

echo "<h4> Menghitung Keliling Lingkaran</h4>";
function KelilingLingkaran($r){
    $phi = 3.14;
    $k = 2;
    return $k * $phi * $r;
}
echo "jari- jari = 20 cm <br>";
echo "Keliling Lingkaran = ";
echo KelilingLingkaran(20);
echo " cm";
echo "<hr>";


?>