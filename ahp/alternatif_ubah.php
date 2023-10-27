<?php
$row = $db->get_row("SELECT * FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
?>

<section class="home section" > 
    <div class="main">
        <div class="main-content">
            <h1>Edit Alternatif</h1>
            <div class="box_p">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if ($_POST) include 'aksi.php' ?>
                        <form method="post">
                            <div class="form-group">
                                <label>Kode <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="kode_alternatif" readonly="readonly" value="<?= $row->kode_alternatif ?>" />
                            </div>
                            <div class="form-group">
                                <label>Nama alternatif <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nama_alternatif" value="<?= set_value('nama_alternatif', $row->nama_alternatif) ?>" />
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