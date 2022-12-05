<?php include 'components/head.php'; ?>

<body>

<?php include 'components/sidebar.php'; ?>

    <section id="interface">
<?php include 'components/navbar.php'; ?>
        <h3 class="i-name">
            Tambah Sub Kriteria
        </h3>
        <div class="card">
            <form id="form" action="proses/tambah.php" method="post">
                <input type="hidden" name="op" value="subkriteria">
                <div class="input-group">
                    <label for="id_kriteria">Kriteria</label>
                    <select class="input-custom" name="id_kriteria" id="id_kriteria">
                        <option value="">Pilih Kriteria</option>
                        <?php
                        $query="SELECT id_kriteria, nama_kriteria FROM kriteria";
                        $execute=$conn->query($query);
                        if ($execute->num_rows > 0){
                            while ($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                if ($pilih==$data['id_kriteria']) {
                                    $selected="selected";
                                }else{
                                    $selected=null;
                                }
                                echo "<option $selected value=$data[id_kriteria]>$data[nama_kriteria]</option>";
                            }
                        }else{
                            echo '<option disabled value="">Tidak ada data</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="subkriteria">Sub Kriteria</label>
                    <input type="text" class="input-custom" name="subkriteria" id="subkriteria" placeholder="Masukkan sub kriteria" required>
                </div>
                <div class="input-group">
                    <label for="nilai">Nilai</label>
                    <input type="number" step="any" class="input-custom" name="nilai" id="nilai" placeholder="Masukkan nilai" required>
                </div>
                <button type="submit" id="buttonsimpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </section>

    <script src="./assets/js/script.js"></script>
</body>

</html>