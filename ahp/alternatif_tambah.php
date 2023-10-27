<section class="home section"> 
    <div class="main">
        <div class="main-content">
            <h1>Tambah Alternatif</h1>
            <div class="box_p">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if ($_POST) include 'aksi.php' ?>
                        <form method="post">
                            <div class="form-group">
                                <label>Kode <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="kode_alternatif" value="<?= set_value('kode_alternatif', kode_oto('kode_alternatif', 'tb_alternatif', 'A', 2)) ?>" />
                            </div>
                            <div class="form-group">
                                <label>Nama Alternatif <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nama_alternatif" value="<?= set_value('nama_alternatif') ?>" />
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary"><span class="bx bx-save"></span> Simpan</button>
                                <a class="btn btn-default" href="?m=alternatif"><span class="bx bx-left-arrow-alt"></span> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>