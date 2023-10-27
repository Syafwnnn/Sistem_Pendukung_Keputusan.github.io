<?php
$c = $db->get_results("SELECT * FROM tb_rel_alternatif WHERE nilai>0");
if (!$ALTERNATIF || !$KRITERIA) :
    echo "Tampaknya anda belum mengatur alternatif dan kriteria. Silahkan tambahkan minimal 3 alternatif dan 3 kriteria.";
elseif (!$c) :
    echo "Tampaknya anda belum mengatur nilai alternatif. Silahkan atur pada menu <strong>Nilai Bobot</strong> > <strong>Nilai Bobot Alternatif</strong>.";
else :
?>

<section class="home section">
    <div class="main">
        <div class="main-content">
            <h1>Perhitungan</h1>
            <div class="box_p">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title up">Mengukur Konsistensi Kriteria</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Matriks Perbandingan Kriteria</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <?php
                                            $matriks = get_relkriteria();
                                            $total = get_total_kolom($matriks);

                                            foreach ($matriks as $key => $val) : ?>
                                                <th><?= $key ?></th>
                                            <?php endforeach ?>
                                        </tr>
                                    </thead>
                                    <?php foreach ($matriks as $key => $val) : ?>
                                        <tr>
                                            <td><?= $key ?> - <?= $KRITERIA[$key] ?></td>
                                            <?php foreach ($val as $k => $v) : ?>
                                                <td><?= round($v, 4) ?></td>
                                            <?php endforeach ?>
                                        </tr>
                                    <?php endforeach ?>
                                    <tfoot>
                                        <tr>
                                            <td>Total kolom</td>
                                            <?php foreach ($total as $key => $val) : ?>
                                                <td class="text-primary"><?= round($total[$key], 4) ?></td>
                                            <?php endforeach ?>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div> 
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Matriks Bobot Prioritas Kriteria</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>&nbsp;</th>
                                            <?php
                                            $normal = get_normalize($matriks, $total);
                                            $rata = get_rata($normal);
                                            foreach ($matriks as $key => $val) : ?>
                                                <th><?= $key ?></th>
                                            <?php endforeach ?>
                                            <th>Bobot Prioritas</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($normal as $key => $val) : ?>
                                        <tr>
                                            <th><?= $key ?></th>
                                            <?php foreach ($val as $k => $v) : ?>
                                                <td><?= round($v, 4) ?></td>
                                            <?php endforeach ?>
                                            <td class="text-primary"><?= round($rata[$key], 4) ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        </div>
                    </div>
                </div>
            
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title up">Matriks Perbandingan Alternatif</h3>
                    </div>
                    <div class="panel-body">
                        <?php foreach ($KRITERIA as $kode => $nama) : ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Matriks Perbandingan Alternatif Berdasarkan <strong><?= $nama ?></strong></h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tr>
                                            <th>&nbsp;</th>
                                            <?php
                                                foreach ($ALTERNATIF as $k => $v) {
                                                    echo "<th>$k</th>";
                                                }
                                            ?>
                                        </tr>
                                        <?php
                                        $data = get_relalternatif($kode);
                                        foreach ($data as $key => $value) {
                                            echo "<tr><th>$key</th>";
                                            foreach ($value as $k => $v) {
                                                echo "<td>" . round($v, 4) . "</td>";
                                            }
                                            echo "</tr>";
                                        }
                                        $total = get_total_kolom($data);
                                        echo "<tfoot><tr><th>Total kolom</th>";
                                        foreach ($total as $key => $value) {
                                            echo "<td class='text-primary'>" . round($total[$key], 4) . "</td>";
                                        }
                                        echo "</tr></tfoot>";
                                        ?>
                                    </table>
                                </div>
                                <div class="panel-body">
                                    Matriks bobot prioritas alternatif berdasarkan <strong><?= $nama ?></strong>:
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <tr>
                                            <th>&nbsp;</th>
                                            <?php
                                            foreach ($ALTERNATIF as $k => $v) {
                                                echo "<th>$k</th>";
                                            }
                                            ?>
                                            <th>Bobot</th>
                                        </tr>
                                        <?php
                                        $data = get_normalize($data, $total);
                                        $ratax = get_rata($data);

                                        foreach ($data as $key => $value) {
                                            echo "<tr><th>$key</th>";
                                            foreach ($value as $k => $v) {
                                                echo "<td>" . round($v, 4) . "</td>";
                                            }
                                            echo "<td class='text-primary'>" . round($ratax[$key], 4) . "</td></tr>";
                                        }
                                        ?>
                                    </table>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
        
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title up">Hasil Akhir</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">EIGEN KRITERIA DAN ALTERNATIF</h3>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <?php
                                    echo "<tr><th>Alternatif</th>";
                                    $no = 1;
                                    foreach ($KRITERIA as $key => $value) {
                                        echo "<th>$key</th>";
                                        $no++;
                                    }
                                    echo "<th>Nilai</th><th>Rank</th>";
                                    echo "<tr><td>Vektor Eigen</td>";
                                    foreach ($rata as $r) {
                                        echo "<td>" . round($r, 4) . "</td>";
                                    }
                                    echo "<td></td><td></td></tr>";

                                    $eigen_alternatif = get_eigen_alternatif($KRITERIA);
                                    $nilai = get_mmult($eigen_alternatif, $rata);
                                    $rank = get_rank($nilai);

                                    foreach ($rank as $key => $val) {
                                        $db->query("UPDATE tb_alternatif SET total='$nilai[$key]', rank='$rank[$key]' WHERE kode_alternatif='$key'");
                                        echo "<tr>";
                                        echo "<td>$key - " . $ALTERNATIF[$key] . "</td>";
                                        foreach ($eigen_alternatif[$key] as $k => $v) {
                                            echo "<td>" . round($v, 4) . "</td>";
                                        }
                                        echo "<td class='text-primary'>" . round($nilai[$key], 4) . "</td>";
                                        echo "<td class='text-primary'>$rank[$key]</td>";
                                        echo "</tr>";
                                        $no++;
                                    }
                                    echo "</tr>";
                                    ?>
                                </table>
                            </div>
                        </div>
                        <a class="btn btn-sm btn-default" href="cetak.php?m=hitung" target="_blank"><span class="bx bx-printer"></span> Cetak</a>
                    </div>
                </div>
                
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title up">Grafik</h3>
                    </div>
                    <div class="panel-body">
                        <style>
                            .highcharts-credits {
                                display: none;
                            }
                        </style>
                        <?php
                        function get_chart1()
                        {
                            global $db;
                            $rows = $db->get_results("SELECT * FROM tb_alternatif ORDER BY kode_alternatif");
                            foreach ($rows as $row) {
                                $data[$row->nama_alternatif] = $row->total * 1;
                            }
                            $chart = array();
                            $chart['chart']['type'] = 'column';
                            $chart['chart']['options3d'] = array(
                                'enabled' => true,
                                'alpha' => 15,
                                'beta' => 15,
                                'depth' => 50,
                                'viewDistance' => 25,
                            );
                            $chart['title']['text'] = 'Grafik Hasil Perangkingan';
                            $chart['plotOptions'] = array(
                                'column' => array(
                                    'depth' => 25,
                                )
                            );
                            $chart['xAxis'] = array(
                                'categories' => array_keys($data),
                            );
                            $chart['yAxis'] = array(
                                'min' => 0,
                                'title' => array('text' => 'Total'),
                            );
                            $chart['tooltip'] = array(
                                'headerFormat' => '<span style="font-size:10px">{point.key}</span><table>',
                                'pointFormat' => '<tr><td style="color:{series.color};padding:0">{series.name}: </td>
                                <td style="padding:0"><b>{point.y:.3f}</b></td></tr>',
                                'footerFormat' => '</table>',
                                'shared' => true,
                                'useHTML' => true,
                            );
                            $chart['series'] = array(
                                array(
                                    'name' => 'Total nilai',
                                    'data' => array_values($data),
                                )
                            );
                            return $chart;
                        }
                        ?>
                        <script>
                            $(function() {
                                $('#chart1').highcharts(<?= json_encode(get_chart1()) ?>);
                            })
                        </script>
                        <div id="chart1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif ?>