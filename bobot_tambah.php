<?php include 'components/head.php'; ?>

<body>

<?php include 'components/sidebar.php'; ?>

    <section id="interface">
<?php include 'components/navbar.php'; ?>
        <h3 class="i-name">
            Tambah Bobot
        </h3>
        <div class="card">
            <form id="form" action="proses/tambah.php" method="post">
                <input type="hidden" name="op" value="bobot">
                <div class="input-group">
                    <label for="alternatif">Alternatif</label>
                    <select class="input-custom" name="alternatif" id="alternatif" required>
                        <option selected disabled>--Pilih Alternatif--</option>
                        <?php
                        $query="SELECT * FROM alternatif";
                        $execute=$conn->query($query);
                        if ($execute->num_rows > 0){
                            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                echo "<option value=\"$data[nama_alternatif]\">$data[nama_alternatif]</option>";
                            }
                        }else {
                            echo "<option value=\"\">Belum ada Alternatif</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group">
                    <label for="sifat_fisik">Sifat Fisik</label>
                    <select class="input-custom" name="sifat_fisik" id="sifat_fisik" required>
                        <option value="">--Pilih Sifat Fisik--</option>
                        <option value="1">Sedang</option>
                        <option value="2">Keras</option>
                        <option value="3">Sangat Keras</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="ketahanan">Ketahanan</label>
                    <select class="input-custom" name="ketahanan" id="ketahanan" required>
                        <option value="">--Pilih Ketahanan--</option>
                        <option value="1">1 - 5 Tahun</option>
                        <option value="2">5 - 10 Tahun</option>
                        <option value="3">10 – 15 Tahun</option>
                        <option value="4">15 – 20 Tahun</option>
                        <option value="5">20 Tahun Keatas</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="sifat_mekanik">Sifat Mekanik</label>
                    <select class="input-custom" name="sifat_mekanik" id="sifat_mekanik" required>
                        <option value="">--Pilih Sifat Mekanik--</option>
                        <option value="1">Berat < 215</option>
                        <option value="2">Berat 300 – 215</option>
                        <option value="3">Berat 425 – 300</option>
                        <option value="4">Berat 650 – 425</option>
                        <option value="5">Berat > 650</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="kelas_kayu">Kelas Kayu</label>
                    <select class="input-custom" name="kelas_kayu" id="kelas_kayu" required>
                        <option value="">--Pilih Kelas Kayu--</option>
                        <option value="1">Kekuatan < 0.30</option>
                        <option value="2">Kekuatan 0.30 – 0.40</option>
                        <option value="3">Kekuatan 0.4 – 0.60</option>
                        <option value="4">Kekuatan 0.60 – 0.90</option>
                        <option value="5">Kekuatan > 0.90</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="tekstur">Tekstur</label>
                    <select class="input-custom" name="tekstur" id="tekstur" required>
                        <option value="">--Pilih Tekstur--</option>
                        <option value="1">Kasar</option>
                        <option value="2">Sedang</option>
                        <option value="3">Sedikit Halus</option>
                        <option value="4">Halus</option>
                    </select>
                </div>
                <button type="submit" id="buttonsimpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </section>

    <script src="./assets/js/script.js"></script>
</body>

</html>