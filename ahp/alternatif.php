<section class="home section">
    <div class="main">
        <div class="main-content">
            <h1>Data Alternatif</h1>
            <div class="box_p">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form class="form-inline">
                            <input type="hidden" name="m" value="alternatif"/>
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $_GET['q'] ?>" />
                            </div>                    
                            <div class="form-group">
                                <a class="btn btn-primary" href="?m=alternatif_tambah"><span class="bx bx-plus"></span> Tambah Alternatif</a>
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
                                    <th>Nama Alternatif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php
                            $q = esc_field($_GET['q']);
                            $rows = $db->get_results("SELECT * FROM tb_alternatif 
                                WHERE kode_alternatif LIKE '%$q%' 
                                    OR nama_alternatif LIKE '%$q%'
                                ORDER BY kode_alternatif");
                            $no = 0;
                            foreach ($rows as $row) : ?>
                                <tr>
                                    <td><?= $row->kode_alternatif ?></td>
                                    <td><?= $row->nama_alternatif ?></td>
                                    <td>
                                        <a class="btn btn-xs btn-primary" href="?m=alternatif_ubah&ID=<?= $row->kode_alternatif ?>"><span class="bx bx-edit"></span></a>
                                        <a class="btn btn-xs btn-default" href="aksi.php?act=alternatif_hapus&ID=<?= $row->kode_alternatif ?>" onclick="return confirm('Hapus data?')"><span class="bx bx-trash"></span></a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>