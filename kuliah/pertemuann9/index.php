<?php
require('functions.php');
$tittle = 'Home';
$students = [
    [
        "nama" => "Rizal Fahla",
        "npm" => "223040125",
        "email" => "fahla43@gmail.com"
    ],
    [
        "nama" => "Daffa Riyadi",
        "npm" => "223040120",
        "email" => "daffa26@gmail.com"
    ]
];

// echo $_SERVER["REQUEST_URI"];

// /pw2023_223040125/kuliah/pertemuann9/

require("views/index.view.php");
?>