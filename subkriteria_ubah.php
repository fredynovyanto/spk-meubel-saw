<?php include 'components/head.php'; ?>

<body>

<?php include 'components/sidebar.php'; ?>

    <section id="interface">
<?php include 'components/navbar.php'; ?>
        <h3 class="i-name">
            Ubah Sub Kriteria
        </h3>
        <?php
            $id=htmlspecialchars(@$_GET['id']);
            $query="SELECT * FROM subkriteria WHERE id_subkriteria='$id'";
            $execute=$conn->query($query);
            if ($execute->num_rows > 0){
                $data=$execute->fetch_array(MYSQLI_ASSOC);
            }else{
                header('location: index.php');
            }
        ?>
        <div class="card">
            <form id="form" action="proses/ubah.php" method="post">
                <input type="hidden" name="op" value="subkriteria">
                <input type="hidden" name="id" value="<?= $data['id_subkriteria']; ?>">
                <div class="input-group">
                    <label for="id_kriteria">Kriteria</label>
                    <select class="input-custom" name="id_kriteria" id="id_kriteria">
                        <option value="">Pilih Kriteria</option>
                        <?php
                        $query2="SELECT id_kriteria, nama_kriteria FROM kriteria";
                        $execute=$conn->query($query2);
                        if ($execute->num_rows > 0){
                            while ($data2=$execute->fetch_array(MYSQLI_ASSOC)){
                                if ($data['id_kriteria']==$data2['id_kriteria']) {
                                    $selected="selected";
                                }else{
                                    $selected=null;
                                }
                                echo "<option $selected value=$data2[id_kriteria]>$data2[nama_kriteria]</option>";
                            }
                        }else{
                            echo '<option disabled value="">Tidak ada data</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="subkriteria">Sub Kriteria</label>
                    <input type="text" class="input-custom" name="subkriteria" id="subkriteria" placeholder="Masukkan sub kriteria" value="<?= $data['keterangan'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="nilai">Nilai</label>
                    <input type="number" step="any" class="input-custom" name="nilai" id="nilai" placeholder="Masukkan nilai" value="<?= $data['nilai'] ?>" required>
                </div>
                <button type="submit" id="buttonsimpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </section>

    <script src="./assets/js/script.js"></script>
</body>

</html>