<?php
$row = $db->get_row("SELECT * FROM tb_user WHERE id_user='$_GET[ID]'");
?>

<section class="home section"> 
    <div class="main">
        <div class="main-content">
            <h1>Edit Pengguna</h1>
            <div class="box_p">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if ($_POST) include 'aksi.php' ?>
                        <form method="post">
                            <div class="form-group">
                                <label>Nama User <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nama_user" value="<?= set_value('nama_user', $row->nama_user) ?>" />
                            </div>
                            <div class="form-group">
                                <label>Username <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="user" value="<?= set_value('user', $row->user) ?>" />
                            </div>
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="pass" value="<?= set_value('pass', $row->pass) ?>" />
                            </div>
                            <div class="form-group">
                                <label>Level <span class="text-danger">*</span></label>
                                <select class="form-control" name="level">
                                    <?= get_level_option(set_value('level', $row->level)) ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary"><span class="bx bx-save"></span> Simpan</button>
                                <a class="btn btn-default" href="?m=user"><span class="bx bx-left-arrow-alt"></span> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>