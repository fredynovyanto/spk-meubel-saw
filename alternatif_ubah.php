<?php include 'components/head.php'; ?>

<body>

<?php include 'components/sidebar.php'; ?>

    <section id="interface">
<?php include 'components/navbar.php'; ?>
        <h3 class="i-name">
            Ubah Alternatif
        </h3>
        <?php
            $id=htmlspecialchars(@$_GET['id']);
            $query="SELECT * FROM alternatif WHERE id_alternatif='$id'";
            $execute=$conn->query($query);
            if ($execute->num_rows > 0){
                $data=$execute->fetch_array(MYSQLI_ASSOC);
            }else{
                header('location: alternatif.php');
            }
        ?>
        <div class="card">
            <form id="form" action="proses/ubah.php" method="post">
                <input type="hidden" name="op" value="alternatif">
                <input type="hidden" name="id" value="<?= $data['id_alternatif']; ?>">
                <div class="input-group">
                    <label for="alternatif">Nama Alternatif</label>
                    <input type="text" class="input-custom" name="alternatif" id="alternatif" value="<?= $data['nama_alternatif'] ?>" placeholder="Masukkan nama alternatif">
                </div>
                <button type="submit" id="buttonsimpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </section>

    <script src="./assets/js/script.js"></script>
</body>

</html>