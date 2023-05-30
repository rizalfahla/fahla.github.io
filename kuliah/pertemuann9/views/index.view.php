<?php
require('partials/nav.php');
require('partials/header.php');
?>

<div class="container">
    <h1>Halaman Home</h1>

    <h3>Daftar Mahasiswa</h3>

    <?php foreach ($students as $student): ?>
        <ul>
            <li>Nama:
                <?= $student['nama'] ?>
            </li>
            <li>Npm:
                <?= $student['npm'] ?>
            </li>
            <li>Email:
                <?= $student['email'] ?>
            </li>
        </ul>
    <?php endforeach; ?>
</div>

<?php
require('partials/footer.php');
?>