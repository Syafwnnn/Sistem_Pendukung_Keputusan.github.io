<?php
$row = $db->get_row("SELECT * FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
?>

<section class="home section" > 
    <div class="main">
        <div class="main-content">
            <h1>Edit Kriteria</h1>
            <div class="box_p">
                <div class="row">
                    <div class="col-sm-6">
                        <?php if ($_POST) include 'aksi.php' ?>
                        <form method="post">
                            <div class="form-group">
                                <label>Kode <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="kode_kriteria" readonly="readonly" value="<?= $row->kode_kriteria ?>" />
                            </div>
                            <div class="form-group">
                                <label>Nama kriteria <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="nama_kriteria" value="<?= set_value('nama_kriteria', $row->nama_kriteria) ?>" />
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary"><span class="bx bx-save"></span> Simpan</button>
                                <a class="btn btn-default" href="?m=kriteria"><span class="bx bx-left-arrow-alt"></span> Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>