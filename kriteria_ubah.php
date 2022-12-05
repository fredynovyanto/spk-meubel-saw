<?php include 'components/head.php'; ?>

<body>

<?php include 'components/sidebar.php'; ?>

    <section id="interface">
<?php include 'components/navbar.php'; ?>
        <h3 class="i-name">
            Ubah Kriteria
        </h3>
        <?php
            $id=htmlspecialchars(@$_GET['id']);
            $tipe=array("Benefit","Cost");
            $query="SELECT * FROM kriteria WHERE id_kriteria='$id'";
            $execute=$conn->query($query);
            if ($execute->num_rows > 0){
                $data=$execute->fetch_array(MYSQLI_ASSOC);
            }else{
                header('location: index.php');
            }
        ?>
        <div class="card">
            <form id="form" action="proses/ubah.php" method="post">
                <input type="hidden" name="op" value="kriteria">
                <input type="hidden" name="id" value="<?= $data['id_kriteria']; ?>">
                <div class="input-group">
                    <label for="kode_kriteria">Kode</label>
                    <input type="text" class="input-custom" name="kode_kriteria" id="kode_kriteria" placeholder="Masukkan kode" value="<?= $data['kode_kriteria'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="nama_kriteria">Nama Kriteria</label>
                    <input type="text" class="input-custom" name="nama_kriteria" id="nama_kriteria" placeholder="Masukkan nama kriteria" value="<?= $data['nama_kriteria'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="bobot">Bobot</label>
                    <input type="number" step="any" class="input-custom" name="bobot" id="bobot" placeholder="Masukkan bobot" value="<?= $data['bobot'] ?>" required>
                </div>
                <div class="input-group">
                    <label for="tipe">Tipe</label>
                    <select class="input-custom" name="tipe" id="tipe">
                        <?php
                            foreach ($tipe as $tp){
                                if ($tp == $data['tipe']){
                                    $selected="selected";
                                }else{
                                    $selected=null;
                                }
                                echo"<option $selected value=\"$tp\">$tp</option>";
                            }
                        ?>
                    </select>
                </div>
                <button type="submit" id="buttonsimpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </section>

    <script src="./assets/js/script.js"></script>
</body>

</html>