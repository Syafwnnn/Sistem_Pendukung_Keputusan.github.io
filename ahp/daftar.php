<div class="l-form">
    <div class="shape1"></div>
    <div class="shape2"></div>
    <div class="form">
        <img src="assets/images/welcome.svg" alt="" class="form__img">
        <?php if ($_POST) include 'aksi.php' ?>
        <form class="form__content_us" method="post">
            <h1 class="form__title">REGISTRASI</h1>
            <div class="form__div form__div-name">
                <div class="form__icon">
                    <i class='bx bx-user-circle'></i>
                </div>
                <div class="form__div-input">
                    <label for="" class="form__label">Nama</label>
                    <input type="text" class="form__input" name="nama_user" value="<?= set_value('nama_user') ?>" >
                </div>
            </div>
            <div class="form__div form__div-un">
                <div class="form__icon">
                    <i class='bx bx-user-circle'></i>
                </div>
                <div class="form__div-input">
                    <label for="" class="form__label">Username</label>
                    <input type="text" class="form__input" name="user" value="<?= set_value('user') ?>">
                </div>
            </div>
            <div class="form__div form__pw" >
                <div class="form__icon">
                    <i class='bx bx-lock' ></i>
                </div>
                <div class="form__div-input">
                    <label for="" class="form__label">Password</label>
                    <input type="password" class="form__input" name="pass1" value="<?= set_value('pass1') ?>">
                </div>
            </div>
            <div class="form__div form__changepw">
                <div class="form__icon">
                    <i class='bx bx-lock' ></i>
                </div>
                <div class="form__div-input">
                    <label for="" class="form__label">Konfirmasi Password</label>
                    <input type="password" class="form__input" name="pass2" value="<?= set_value('pass2') ?>">
                </div>
            </div>
            <input type="submit" class="form__button" value="Registrasi">
            <div class="form__social">
                <a onclick="location.href='../index.html'" class="form__social-text">Kembali</a>
            </div>
        </form>
    </div>
</div>

<!--=============== FOOTER ===============-->
<footer class="footer section">
    <p class="footer__copy">&#169; Moh. Syafwan I Djuru. 2023</p>
</footer>