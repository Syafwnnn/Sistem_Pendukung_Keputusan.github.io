<section class="home section">
    <div class="main">
        <div class="main-content">
            <h1>Password</h1>
            <div class="box_p">
                <div class="row">
                    <div class="col-sm-5">
                        <?php if ($_POST) include 'aksi.php' ?>
                        <form method="post">
                            <div class="form-group">
                                <label>Password Lama <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="pass1" />
                            </div>
                            <div class="form-group">
                                <label>Password Baru <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="pass2" />
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Password Baru <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="pass3" />
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary"><span class="bx bx-save"></span> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>