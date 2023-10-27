<div class="l-form">
    <div class="shape1"></div>
    <div class="shape2"></div>
    <div class="form">
        <img src="assets/images/login.svg" alt="" class="form__img">
        <form class="form__content" action="?m=login" method="post">
            <h1 class="form__title">LOGIN</h1>
            <?= show_msg() ?>
            <?php if ($_POST) include 'aksi.php'; ?>
            <div class="form__div form__div-one">
                <div class="form__icon">
                    <i class='bx bx-user-circle'></i>
                </div>
                <div class="form__div-input">
                    <label for="" class="form__label">Username</label>
                    <input type="text" class="form__input" name="user" autofocus>
                </div>
            </div>
            <div class="form__div">
                <div class="form__icon">
                    <i class='bx bx-lock' ></i>
                </div>
                <div class="form__div-input">
                    <label for="" class="form__label">Password</label>
                    <input type="password" id="inputPassword" class="form__input" name="pass">
                </div>
            </div>
            <input type="submit" class="form__button" value="Masuk">
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