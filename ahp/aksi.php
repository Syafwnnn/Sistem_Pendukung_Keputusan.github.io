<?php
require_once 'functions.php';

/** LOGIN **/
if ($mod == 'login') {
    $user = esc_field($_POST['user']);
    $pass = esc_field($_POST['pass']);

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$user' AND pass='$pass'");
    if ($row) {
        $_SESSION['user'] = $row;
        $_SESSION['login'] = $row->user;
        $_SESSION['level'] = $row->level;
        redirect_js("halaman_admin.php");

         if ($_SESSION['level'] == 'admin'){
        header('location:halaman_admin.php');
    } else if ($_SESSION['level'] == 'Superuser'){
        header('location:qwerty/index.html');
    } else if ($_SESSION['level'] == 'user'){
        header('location:halaman_user.php');
    }
    
    } else {
        print_msg("Salah kombinasi username dan password.");
    }
} elseif ($act == 'logout') {
    unset($_SESSION['user'], $_SESSION['login'], $_SESSION['level']);
    header("location:index.php?m=login");
} elseif ($mod == 'password') {
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $pass3 = $_POST['pass3'];

    $row = $db->get_row("SELECT * FROM tb_user WHERE user='$_SESSION[login]' AND pass='$pass1'");

    if ($pass1 == '' || $pass2 == '' || $pass3 == '')
        print_msg('Field bertanda * harus diisi.');
    elseif (!$row)
        print_msg('Password lama salah.');
    elseif ($pass2 != $pass3)
        print_msg('Password baru dan konfirmasi password baru tidak sama.');
    else {
        $db->query("UPDATE tb_user SET pass='$pass2' WHERE user='$_SESSION[login]'");
        print_msg('Password berhasil diubah.', 'success');
    }
}
/** user */
elseif ($mod == 'user_tambah') {
    $nama_user = $_POST['nama_user'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    if ($nama_user == '' || $user == '' || $pass == '' || $level == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_row("SELECT * FROM tb_user WHERE user='$user'"))
        print_msg("Username sudah terdaftar!");
    else {
        $db->query("INSERT INTO tb_user (nama_user, user, pass, level) VALUES ('$nama_user', '$user', '$pass', '$level')");
        $id_user = $db->insert_id;

        $db->query("INSERT INTO tb_rel_alternatif (kode1, kode2, kode_kriteria, nilai, id_user) SELECT a1.kode_alternatif, a2.kode_alternatif, kode_kriteria, 1, '$id_user' FROM tb_alternatif a1, tb_alternatif a2, tb_kriteria");

        $db->query("INSERT INTO tb_rel_kriteria (ID1, ID2, nilai, id_user) SELECT k1.kode_kriteria, k2.kode_kriteria, 1, '$id_user' FROM tb_kriteria k1, tb_kriteria k2");

        redirect_js("halaman_admin.php?m=user");
    }
} else if ($mod == 'user_ubah') {
    $nama_user = $_POST['nama_user'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $level = $_POST['level'];

    if ($nama_user == '' || $user == '' || $pass == '' || $level == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    else {
        $db->query("UPDATE tb_user SET nama_user='$nama_user', user='$user', pass='$pass', level='$level' WHERE id_user='$_GET[ID]'");
        redirect_js("halaman_admin.php?m=user");
    }
} else if ($act == 'user_hapus') {
    $db->query("DELETE FROM tb_user WHERE id_user='$_GET[ID]'");
    header("location:halaman_admin.php?m=user");
} elseif ($mod == 'daftar') {
    $nama_user = $_POST['nama_user'];
    $user = $_POST['user'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $level = 'user';

    if ($nama_user == '' || $user == '' || $pass1 == '' || $pass2 == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($pass1 != $pass2)
        print_msg("Password dan konfirmasi password harus sama!");
    elseif ($db->get_row("SELECT * FROM tb_user WHERE user='$user'"))
        print_msg("Username sudah terdaftar!");
    else {
        $db->query("INSERT INTO tb_user (nama_user, user, pass, level) VALUES ('$nama_user', '$user', '$pass1', '$level')");
        $id_user = $db->insert_id;

        $db->query("INSERT INTO tb_rel_alternatif (kode1, kode2, kode_kriteria, nilai, id_user) SELECT a1.kode_alternatif, a2.kode_alternatif, kode_kriteria, 1, '$id_user' FROM tb_alternatif a1, tb_alternatif a2, tb_kriteria");

        $db->query("INSERT INTO tb_rel_kriteria (ID1, ID2, nilai, id_user) SELECT k1.kode_kriteria, k2.kode_kriteria, 1, '$id_user' FROM tb_kriteria k1, tb_kriteria k2");

        set_msg('Pendaftaran berhahsil. Silahkan login!');
        redirect_js("index.php?m=login");
    }
}
/** alternatif **/
elseif ($mod == 'alternatif_tambah') {
    $kode_alternatif = $_POST['kode_alternatif'];
    $nama_alternatif = $_POST['nama_alternatif'];
    if ($kode_alternatif == '' || $nama_alternatif == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode_alternatif'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_alternatif (kode_alternatif, nama_alternatif) VALUES ('$kode_alternatif', '$nama_alternatif')");

        $db->query("INSERT INTO tb_rel_alternatif(kode1, kode2, kode_kriteria, nilai, id_user) SELECT '$kode_alternatif', kode_alternatif, kode_kriteria, 1, id_user FROM tb_alternatif, tb_kriteria, tb_user");

        $db->query("INSERT INTO tb_rel_alternatif(kode1, kode2, kode_kriteria, nilai, id_user) SELECT kode_alternatif, '$kode_alternatif', kode_kriteria, 1, id_user FROM tb_alternatif, tb_kriteria, tb_user WHERE kode_alternatif<>'$kode_alternatif'");

        redirect_js("halaman_admin.php?m=alternatif");
    }
} elseif ($mod == 'alternatif_ubah') {
    $kode_alternatif = $_POST['kode_alternatif'];
    $nama_alternatif = $_POST['nama_alternatif'];
    if ($kode_alternatif == '' || $nama_alternatif == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_alternatif WHERE kode_alternatif='$kode_alternatif' AND kode_alternatif<>'$_GET[ID]'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("UPDATE tb_alternatif SET kode_alternatif='$kode_alternatif', nama_alternatif='$nama_alternatif' WHERE kode_alternatif='$_GET[ID]'");
        redirect_js("halaman_admin.php?m=alternatif");
    }
} elseif ($act == 'alternatif_hapus') {
    $db->query("DELETE FROM tb_alternatif WHERE kode_alternatif='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode1='$_GET[ID]' OR kode2='$_GET[ID]'");
    header("location:halaman_admin.php?m=alternatif");
}

/** kriteria */
elseif ($mod == 'kriteria_tambah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];
    if ($kode_kriteria == '' || $nama_kriteria == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode_kriteria'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("INSERT INTO tb_kriteria (kode_kriteria, nama_kriteria) VALUES ('$kode_kriteria', '$nama_kriteria')");

        $db->query("INSERT INTO tb_rel_kriteria(ID1, ID2, nilai, id_user) SELECT '$kode_kriteria', kode_kriteria, 1, id_user FROM tb_kriteria, tb_user");
        $db->query("INSERT INTO tb_rel_kriteria(ID1, ID2, nilai, id_user) SELECT kode_kriteria, '$kode_kriteria', 1, id_user FROM tb_kriteria, tb_user WHERE kode_kriteria<>'$kode_kriteria'");

        $db->query("INSERT INTO tb_rel_alternatif(kode1, kode2, kode_kriteria, nilai, id_user) SELECT a1.kode_alternatif, a2.kode_alternatif, '$kode_kriteria', 1, id_user FROM tb_alternatif a1, tb_alternatif a2, tb_user");
        redirect_js("halaman_admin.php?m=kriteria");
    }
} else if ($mod == 'kriteria_ubah') {
    $kode_kriteria = $_POST['kode_kriteria'];
    $nama_kriteria = $_POST['nama_kriteria'];
    if ($kode_kriteria == '' || $nama_kriteria == '')
        print_msg("Field bertanda * tidak boleh kosong!");
    elseif ($db->get_results("SELECT * FROM tb_kriteria WHERE kode_kriteria='$kode_kriteria' AND kode_kriteria<>'$_GET[ID]'"))
        print_msg("Kode sudah ada!");
    else {
        $db->query("UPDATE tb_kriteria SET kode_kriteria='$kode_kriteria', nama_kriteria='$nama_kriteria' WHERE kode_kriteria='$_GET[ID]'");
        redirect_js("halaman_admin.php?m=kriteria");
    }
} else if ($act == 'kriteria_hapus') {
    $db->query("DELETE FROM tb_kriteria WHERE kode_kriteria='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_kriteria WHERE ID1='$_GET[ID]' OR ID2='$_GET[ID]'");
    $db->query("DELETE FROM tb_rel_alternatif WHERE kode_kriteria='$_GET[ID]'");
    header("location:halaman_admin.php?m=kriteria");
}

/** relasi alternatif */
else if ($mod == 'rel_alternatif') {
    if ($_GET['kode_kriteria'] == '') {
        print_msg('Pilih kriteria terlebih dulu.');
    } elseif ($_POST['kode1'] == $_POST['kode2'] && $_POST['nilai'] <> 1) {
        print_msg('Alternatif yang sama harus bernilai 1.');
    } else {
        $db->query("UPDATE tb_rel_alternatif SET nilai='$_POST[nilai]' WHERE kode1='$_POST[kode1]' AND kode2='$_POST[kode2]' AND kode_kriteria='$_GET[kode_kriteria]' AND id_user='{$_SESSION['user']->id_user}'");
        $db->query("UPDATE tb_rel_alternatif SET nilai=1/'$_POST[nilai]' WHERE kode1='$_POST[kode2]' AND kode2='$_POST[kode1]' AND kode_kriteria='$_GET[kode_kriteria]' AND id_user='{$_SESSION['user']->id_user}'");
        print_msg('Data berhasil diubah.', 'success');
    }
}

/** relasi kriteria */
else if ($mod == 'rel_kriteria') {
    $ID1 = $_POST['ID1'];
    $ID2 = $_POST['ID2'];
    $nilai = abs($_POST['nilai']);

    if ($ID1 == $ID2 && $nilai <> 1)
        print_msg("Kriteria yang sama harus bernilai 1.");
    else {
        $db->query("UPDATE tb_rel_kriteria SET nilai=$nilai WHERE ID1='$ID1' AND ID2='$ID2'");
        $db->query("UPDATE tb_rel_kriteria SET nilai=1/$nilai WHERE ID2='$ID1' AND ID1='$ID2'");
        print_msg("Nilai kriteria berhasil diubah.", 'success');
    }
}
