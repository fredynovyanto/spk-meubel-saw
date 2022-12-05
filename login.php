<?php 
include 'components/head.php'; 
?>

<body>
    <?php 
    if (isset($_SESSION['user']) && $_SESSION['pass']) {
        //it's ok
        header('Location: javascript://history.go(-1)');
    }
    ?>
    <section id="interface-login">
        <div class="card-login">
            <h3 class="login-title">
                LOGIN
            </h3>
                <h5 class="login-spk" style="">
                    Sistem Pendukung Keputusan Penentuan Jenis Kayu untuk Meubel Metode SAW
                </h5>
            <div class="alert alert-red text-center" style="display:none;" id="alert"><i class="fa fa-info-circle fa-lg"></i><p id="value">sdasdasd</p></div>
            <form id="formlogin" action="proses/cek_login.php" method="post">
                <input type="hidden" name="op" value="kriteria">
                <div class="input-group">
                    <input type="text" class="input-custom" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="input-group">
                    <input type="password" class="input-custom" name="password" id="password" placeholder="Password" required>
                </div>
                <button type="submit" id="buttonsimpan" class="btn-login btn-primary">Sign in</button>
            </form>
        </div>
    </section>

    <script src="./assets/js/script.js"></script>
</body>

</html>