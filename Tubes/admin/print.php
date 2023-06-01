<?php
require_once __DIR__ . '/vendor/autoload.php';

require '../inc/inc_fungsi.php';
require '../inc/inc_koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM halaman");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita</title>
</head>
<body>
    <h1>Daftar Berita</h1>
    <table border="1" cellpadding="10" cellspacing="0">

        <tr>
            <th>No.</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Kutipan</th>
        </tr>';

$i = 1;
foreach ($result as $row) {
    $html .= '<tr>
            <td>' . $i++ . '</td>
            <td><img src="../img/' . $row["gambar"] . '" width="100"></td>
            <td>' . $row["judul"] . '</td>
            <td>' . $row["kutipan"] . '</td>
        </tr>';
}

$html .= '</table>    
</body>
</html>';
$mpdf->WriteHTML($html);
$mpdf->Output('Daftar-Berita.pdf', 'I');

?>