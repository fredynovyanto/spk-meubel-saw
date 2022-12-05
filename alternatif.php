<?php include 'components/head.php'; ?>

<body>
<?php include 'components/sidebar.php'; ?>

    <section id="interface">
<?php include 'components/navbar.php'; ?>
        <h3 class="i-name">
            Alternatif
        </h3>
        <form id="form" action="proses/tambah.php" method="post">
            <div class="values-alt">
                <input type="hidden" name="op" value="alternatif">
                <input class="text-input" type="text" name="alternatif" id="alternatif" placeholder="Masukkan alternatif...">
                <button type="submit" id="buttonsimpan" class="btn btn-primary btn-alternatif">Tambah Alternatif</button>
            </div>
        </form>
        <div class="board">
            <table width="100%">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Alternatif</td>
                        <td>Aksi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM alternatif";
                        $execute = $conn->query($query);
                        if ($execute->num_rows > 0){
                            $no=1;
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo"
                                <tr>
                                    <td>$no</td>
                                    <td><h5>$data[nama_alternatif]</h5></td>
                                    <td>
                                        <a href='alternatif_ubah.php?id=".$data['id_alternatif']."' class='edit'><i class='fas fa-edit'></i></a>
                                        <a href='proses/hapus.php?op=alternatif&id=".$data['id_alternatif']."' data-a=".$data['nama_alternatif']." id='hapus' class='hapus'><i class='fas fa-trash'></i></a>
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