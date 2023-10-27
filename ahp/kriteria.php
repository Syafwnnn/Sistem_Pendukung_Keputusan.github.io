<section class="home section" > 
    <div class="main">
        <div class="main-content">
            <h1>Data Kriteria</h1>
            <div class="box_p">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form class="form-inline">
                            <input type="hidden" name="m" value="kriteria" />
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $_GET['q'] ?>" />
                            </div>
                                        
                            <div class="form-group">
                                <a class="btn btn-primary" href="?m=kriteria_tambah"><span class="bx bx-plus"></span> Tambah Kriteria</a>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-default" href="cetak.php?<?= $_SERVER['QUERY_STRING'] ?>" target="_blank"><span class="bx bx-printer"></span> Cetak</a>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Kriteria</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $q = esc_field($_GET['q']);
                            $rows = $db->get_results("SELECT * FROM tb_kriteria WHERE nama_kriteria LIKE '%$q%' ORDER BY kode_kriteria");
                            $no = 0;
                            foreach ($rows as $row) : ?>
                                <tr>
                                    <td><?= $row->kode_kriteria ?></td>
                                    <td><?= $row->nama_kriteria ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="?m=kriteria_ubah&ID=<?= $row->kode_kriteria ?>"><span class="bx bx-edit"></span></a>
                                        <a class="btn btn-xs btn-default" href="aksi.php?act=kriteria_hapus&ID=<?= $row->kode_kriteria ?>" onclick="return confirm('Hapus data?')"><span class="bx bx-trash"></span></a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 