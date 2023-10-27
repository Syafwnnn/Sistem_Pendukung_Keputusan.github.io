<h1>Laporan User</h1>
<table class="table table-bordered table-hover table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama User</th>
            <th>Alamat</th>
            <th>Email</th>
            <th>No HP</th>
            <th>User</th>
            <th>Level</th>
        </tr>
    </thead>
    <?php
    $q = esc_field($_GET['q']);
    $from = "FROM tb_user";
    $where = "WHERE nama_user LIKE '%$q%'";
    $rows = $db->get_results("SELECT * $from $where ORDER BY id_user");
    $no = $offset;
    foreach ($rows as $row) : ?>
        <tr>
            <td><?= ++$no ?></td>
            <td><?= $row->nama_user ?></td>
            <td><?= $row->alamat ?></td>
            <td><?= $row->email ?></td>
            <td><?= $row->no_hp ?></td>
            <td><?= $row->user ?></td>
            <td><?= $row->level ?></td>
        </tr>
    <?php endforeach ?>
</table>