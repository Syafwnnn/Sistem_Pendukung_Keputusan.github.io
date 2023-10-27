<section class="home section" id="DP">
    <div class="main">
        <div class="main-content">
            <h1>Data Pengguna</h1>
            <div class="box_p" class="<?= is_hidden('user') ?>">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <form class="form-inline">
                            <input type="hidden" name="m" value="user" />
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?= $_GET['q'] ?>" />
                            </div>                
                            <div class="form-group">
                                <a class="btn btn-primary" href="?m=user_tambah"><span class="bx bx-plus"></span> Tambah Pengguna</a>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-default" href="cetak.php?<?= $_SERVER['QUERY_STRING'] ?>" target="_blank"><span class="bx bx-printer"></span> Cetak</a>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>User</th>
                                <th>Level</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $q = esc_field($_GET['q']);
                        $pg = new Paging();
                        $limit = 10;
                        $offset = $pg->get_offset($limit, $_GET['page']);
                        $from = "FROM tb_user";
                        $where = "WHERE nama_user LIKE '%$q%'";
                        $rows = $db->get_results("SELECT * $from $where ORDER BY id_user LIMIT $offset, $limit");
                        $jumrec = $db->get_var("SELECT COUNT(*) $from $where");
                        $no = $offset;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= ++$no ?></td>
                                <td><?= $row->nama_user ?></td>
                                <td><?= $row->user ?></td>
                                <td><?= $row->level ?></td>
                                <td>
                                    <a class="btn btn-xs btn-primary" href="?m=user_ubah&ID=<?= $row->id_user ?>"><span class="bx bx-edit"></span></a>
                                    <a class="btn btn-xs btn-default" href="aksi.php?act=user_hapus&ID=<?= $row->id_user ?>" onclick="return confirm('Hapus data?')"><span class="bx bx-trash"></span></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>