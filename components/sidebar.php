<?php 
$activePage = basename($_SERVER['PHP_SELF'], ".php");
?>
<?php
    if (isset($_SESSION['user']) && $_SESSION['pass']) {
        //it's ok
    } else {
        header("Location: ../login.php");
    }
    ?>
<section id="menu">
    <div class="logo">
        <a href="alternatif.php">
            <h2>SPK SAW</h2>
        </a>
    </div>
    <div class="items">
            <li class="<?= ($activePage == 'alternatif' || $activePage == 'alternatif_ubah' || $activePage == 'index') ? 'on-active':''; ?>"><i class="fas fa-tree"></i><a href="alternatif.php">Alternatif</a></li>
            <li class="<?= ($activePage == 'kriteria' || $activePage == 'kriteria_tambah' || $activePage == 'kriteria_ubah') ? 'on-active':''; ?>"><i class="fas fa-receipt"></i><a href="kriteria.php">Kriteria</a></li>
            <li class="<?= ($activePage == 'subkriteria' || $activePage == 'subkriteria_tambah' || $activePage == 'subkriteria_ubah') ? 'on-active':''; ?>"><i class="fas fa-th-large"></i><a href="subkriteria.php">Sub Kriteria</a></li>
            <li class="<?= ($activePage == 'bobot' || $activePage == 'bobot_tambah') ? 'on-active':''; ?>"><i class="fas fa-balance-scale"></i><a href="bobot.php">Bobot</a></li>
            <li class="<?= ($activePage == 'hasil') ? 'on-active':''; ?>"><i class="fas fa-chart-bar"></i><a href="hasil.php">Hasil</a></li>
            <li><i class="fas fa-sign-out-alt"></i><a href="logout.php">Logout</a></li>
    </div>
</section>