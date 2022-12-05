<?php include 'components/head.php'; ?>

<body>

<?php include 'components/sidebar.php'; ?>

    <section id="interface">
<?php include 'components/navbar.php'; ?>
        <h3 class="judul-hasil">
            Matriks Keputusan
        </h3>
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Sifat Fisik</td>
                        <td>Ketahanan</td>
                        <td>Sifat Mekanik</td>
                        <td>Kelas Kayu</td>
                        <td>Tekstur</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query="SELECT * FROM bobot";
                        $execute = $conn->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr>
                                    <td>$no</td>
                                    <td><h5>$data[alternatif]</h5></td>
                                    <td><h5>$data[sifat_fisik]</h5></td>
                                    <td><h5>$data[ketahanan]</h5></td>
                                    <td><h5>$data[sifat_mekanik]</h5></td>
                                    <td><h5>$data[kelas_kayu]</h5></td>
                                    <td><h5>$data[tekstur]</h5></td>
                                </tr>";
                                $no++;
                            }
                        }else{
                            echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

        <h3 class="judul-hasil-2">
            Normalisasi Matriks R
        </h3>
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Sifat Fisik</td>
                        <td>Ketahanan</td>
                        <td>Sifat Mekanik</td>
                        <td>Kelas Kayu</td>
                        <td>Tekstur</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT*FROM bobot";
                    $hasil = $conn->query($sql);
                    $rows = $hasil->num_rows;
                    if ($rows > 0) {
                        $b = 0;
                        $C1 = '';
                        $C2 = '';
                        $C3 = '';
                        $C4 = '';
                        $C5 = '';
                        $C6 = '';
                        $no=1;

                        $sql = "SELECT*FROM bobot ORDER BY sifat_fisik DESC";
                        $hasil = $conn->query($sql);
                        $row = $hasil->fetch_row();
                        $C2 = $row[2];
                        $sql = "SELECT*FROM bobot ORDER BY ketahanan DESC";
                        $hasil = $conn->query($sql);
                        $row = $hasil->fetch_row();
                        $C3 = $row[3];
                        $sql = "SELECT*FROM bobot ORDER BY sifat_mekanik DESC";
                        $hasil = $conn->query($sql);
                        $row = $hasil->fetch_row();
                        $C4 = $row[4];
                        $sql = "SELECT*FROM bobot ORDER BY kelas_kayu DESC";
                        $hasil = $conn->query($sql);
                        $row = $hasil->fetch_row();
                        $C5 = $row[5];
                        $sql = "SELECT*FROM bobot ORDER BY tekstur DESC";
                        $hasil = $conn->query($sql);
                        $row = $hasil->fetch_row();
                        $C6 = $row[6];
                    } else {
                        echo "<tr>
                            <td>Data Tidak Ada</td>
                        <tr>";
                    }

                    $sql = "SELECT*FROM bobot";
                    $hasil = $conn->query($sql);
                    $rows = $hasil->num_rows;
                    if ($rows > 0) {
                        while ($row = $hasil->fetch_row()) {
                    ?>
                            <tr id='data'>
                                <td><?php echo $b = $b + 1; ?></td>
                                <td><h5><?= $row[1] ?></h5></td>
                                <td><h5><?= round($row[2] / $C2, 2) ?></h5></td>
                                <td><h5><?= round($row[3] / $C3, 2) ?></h5></td>
                                <td><h5><?= round($row[4] / $C4, 2) ?></h5></td>
                                <td><h5><?= round($row[5] / $C5, 2) ?></h5></td>
                                <td><h5><?= round($row[6] / $C6, 2) ?></h5></td>
                            </tr>
                    <?php }
                    }  ?>
                </tbody>
            </table>
        </div>

        <h3 class="judul-hasil-2">
            Perankingan
        </h3>
        <?php
            $nilai = '';
            $nama = '';
            $x = 0;
            $a = array();
            $sql = "SELECT * FROM kriteria";
            $hasil = $conn->query($sql);
            $rows = $hasil->num_rows;
            if ($rows > 0) {
                while( $row = $hasil->fetch_array(MYSQLI_ASSOC)){
                        $a[] = $row['bobot'];
                        
                    }
            }
            $sql = "TRUNCATE TABLE ranking";
            $hasil = $conn->query($sql);

            $sql = "SELECT * FROM bobot";
            $hasil = $conn->query($sql);
            $rows = $hasil->num_rows;
            if ($rows > 0) {
                while ($row = $hasil->fetch_row()) {
                    $nilai = round(
                        (($row[2] / $C2) * $a[0]) +
                        (($row[3] / $C3) * $a[1]) +
                        (($row[4] / $C4) * $a[2]) +
                        (($row[5] / $C5) * $a[3]) +
                        (($row[6] / $C6) * $a[4]), 2);
                    $nama = $row[1];
                    $sql1 = "INSERT INTO ranking (alternatif,nilai) VALUES ('" . $nama . "','" . $nilai . "')";
                    $hasil1 = $conn->query($sql1);
                }
            }
        ?>
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Nilai</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT*FROM ranking ORDER BY nilai DESC";
                        $execute = $conn->query($sql);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr>
                                    <td>$no</td>
                                    <td><h5>$data[alternatif]</h5></td>
                                    <td><h5>$data[nilai]</h5></td>
                                </tr>";
                                $no++;
                            }
                        }else{
                            echo "<tr><td  class='text-center text-green' colspan='4'><b>Kosong</b></td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <script src="./assets/js/script.js"></script>
</body>

</html>