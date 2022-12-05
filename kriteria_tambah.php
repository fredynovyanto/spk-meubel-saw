<?php include 'components/head.php'; ?>

<body>

<?php include 'components/sidebar.php'; ?>

    <section id="interface">
<?php include 'components/navbar.php'; ?>
        <h3 class="i-name">
            Tambah Kriteria
        </h3>
        <div class="card">
            <form id="form" action="proses/tambah.php" method="post">
                <input type="hidden" name="op" value="kriteria">
                <div class="input-group">
                    <label for="kode_kriteria">Kode</label>
                    <input type="text" class="input-custom" name="kode_kriteria" id="kode_kriteria" placeholder="Masukkan kode" required>
                </div>
                <div class="input-group">
                    <label for="nama_kriteria">Nama Kriteria</label>
                    <input type="text" class="input-custom" name="nama_kriteria" id="nama_kriteria" placeholder="Masukkan nama kriteria" required>
                </div>
                <div class="input-group">
                    <label for="bobot">Bobot</label>
                    <input type="number" step="any" class="input-custom" name="bobot" id="bobot" placeholder="Masukkan bobot" required>
                </div>
                <div class="input-group">
                    <label for="tipe">Tipe</label>
                    <select class="input-custom" name="tipe" id="tipe">
                        <option value="">--Pilih tipe--</option>
                        <option value="Benefit">Benefit</option>
                        <option value="Cost">Cost</option>
                    </select>
                </div>
                <button type="submit" id="buttonsimpan" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </section>

    <script src="./assets/js/script.js"></script>
</body>

</html>