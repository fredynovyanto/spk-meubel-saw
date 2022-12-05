<?php include 'components/head.php'; ?>

<body>

<?php include 'components/sidebar.php'; ?>

    <section id="interface">
<?php include 'components/navbar.php'; ?>
        <h3 class="i-name">
            Bobot
        </h3>
            <div class="values">
                <a href="bobot_tambah.php" class="btn btn-primary">Tambah Bobot</a>
            </div>
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
                                    <td>
                                        <a href='proses/hapus.php?op=bobot&id=".$data['id_bobot']."' data-a=".$data['alternatif']." id='hapus' class='hapus'><i class='fas fa-trash'></i></a>
                                    </td>
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