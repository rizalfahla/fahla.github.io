<?php 
//array
//membuat array 
$hari = array('senin', 'selasa', 'rabu');
$bulan = ['januari', 'februari', 'maret'];
$myArray = ['fahla', 20, false];
$binatang = ['🙉','🐮','🐊','🦍','🦖'];

echo $binatang[3];
echo "<hr/>";

// mencetak seluruh array
//var_dump, print_r

var_dump($hari);
echo "<br>";
echo "<hr/>";

print_r($bulan);
echo "<br>";
echo "<hr>";

var_dump($myArray);
echo "<br>";

print_r($binatang);
echo "<br>";

//manipulasi isi array
//isi elemen menggunakan index nya

$hari[3] = 'kamis';
print_r($hari);
echo "<br>";

//menambahkan elemen baru di akhir array

$hari[] ="jumat";
$hari[] = "sabtu";
print_r($hari);
echo "<br>";

//menambahkan elemen baru di akhir array menggunakan array push()

array_push($bulan, 'april', 'mei');
print_r($bulan);
echo "<br>";

//menambahkan elemen baru di awal menggunakan array_unshift

array_unshift($binatang, '🐀','🐉');
print_r($binatang);
echo "<br>";

//menghapus elemen di akhir array menggunakan array_pop

array_pop($hari);
array_pop($hari);
print_r($hari);
echo "<br>";

//menghapus elemen di awal array menggunakan array_shift
array_shift($hari);
print_r($hari);
echo "<br>";

?>