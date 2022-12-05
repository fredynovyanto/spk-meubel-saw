<?php include 'components/head.php'; ?>

<body>

<?php include 'components/sidebar.php'; ?>

    <section id="interface">
<?php include 'components/navbar.php'; ?>
        <h3 class="i-name">
            Kriteria
        </h3>
            <div class="values">
                <a href="kriteria_tambah.php" class="btn btn-primary">Tambah Kriteria</a>
            </div>
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Kode</td>
                        <td>Nama Kriteria</td>
                        <td>Bobot</td>
                        <td>Tipe</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM kriteria";
                        $execute = $conn->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr>
                                    <td>$no</td>
                                    <td><h5>$data[kode_kriteria]</h5></td>
                                    <td><h5>$data[nama_kriteria]</h5></td>
                                    <td><h5>$data[bobot]</h5></td>
                                    <td><h5>$data[tipe]</h5></td>
                                    <td>
                                        <a href='kriteria_ubah.php?id=".$data['id_kriteria']."' class='edit'><i class='fas fa-edit'></i></a>
                                        <a href='proses/hapus.php?op=kriteria&id=".$data['id_kriteria']."' data-a=".$data['nama_kriteria']." id='hapus' class='hapus'><i class='fas fa-trash'></i></a>
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