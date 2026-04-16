<?php
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:../index.php');
} else {
    include "../config/library.php";
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Grafik
            <small>Kriteria Rumah Real Time e-Dasawisma</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Grafik</a></li>
            <li class="active">Kriteria Rumah Dasawisma</li>
        </ol>
    </section>

    <?php
    $kec = pg_query($koneksi, "select * from kecamatan order by kode");
    while ($kc = pg_fetch_array($kec)) {
    ?>
        <?php
        $sehat = pg_query($koneksi, "select count(nokk) as totaldata from keluarga where kodekec='$kc[kode]' and rumah='Sehat'");
        $kurang = pg_query($koneksi, "select count(nokk) as totaldata from keluarga where kodekec='$kc[kode]' and rumah='Kurang Sehat'");
        $total = pg_query($koneksi, "select count(nokk) as totaldata from keluarga where kodekec='$kc[kode]'");
        $jlh = pg_fetch_array($total);
        $jumlah = $jlh[totaldata];
        $totalsehat = pg_num_rows($sehat);
        $totalkurang = pg_num_rows($kurang);
        $data = 'array ( "label" => ' . '"' . $kc[nama_kec] . '"' . ", " . '"y"' . "=> " . round($totalsehat / $jumlah * 100, 2) . ")";
        print_r($data)
        ?>
    <?php };

    ?>


    <!DOCTYPE HTML>
    <html>

    <head>
        <script>
            window.onload = function() {

                var chart = new CanvasJS.Chart("chartContainer", {
                    animationEnabled: true,
                    theme: "light2",
                    title: {
                        text: "CMS Market Share - 2017"
                    },
                    axisY: {
                        suffix: "%",
                        scaleBreaks: {
                            autoCalculate: true
                        }
                    },
                    data: [{
                        type: "column",
                        yValueFormatString: "#,##0\"%\"",
                        indexLabel: "{y}",
                        indexLabelPlacement: "inside",
                        indexLabelFontColor: "white",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    }]
                });
                chart.render();

            }
        </script>
    </head>

    <body>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </body>

    </html>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-12">
                <div class="box-body chart-responsive">
                    <h3><?= $dataPoints; ?></h3>
                    <div class="chart" id="bar-chart" style="height: 300px;"></div>
                </div>
                <h3>Keterangan</h3>
                <div>Jumlah data Kriteria rumah Sehat/Kurang Sehat di bagi jumlah rumah tangga yang di input</div>
                <br>
                <div class="col-md-3">
                    <ul>
                        <li>01 - MEDANG DERAS</li>
                        <li>02 - SEI SUKA </li>
                        <li>03 - AIR PUTIH</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>04 - LIMA PULUH</li>
                        <li>05 - TALAWI</li>
                        <li>06 - TANJUNG TIRAM</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>07 - SEI BALAI</li>
                        <li>08 - LAUT TADOR</li>
                        <li>09 - LIMA PULUH PESISIR</li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul>
                        <li>10 - DATUK LIMA PULUH</li>
                        <li>11 - DATUK TANAH DATAR</li>
                        <li>12 - NIBUNG HANGUS</li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->

        <div class='box-body'>
            <div class="box-body table-responsive no-padding">
                <table class='table table-bordered table-striped text-center'>
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Kecamatan</th>
                            <th>Data Input</th>
                            <th>Rumah Sehat</th>
                            <th>Rumah Kurang Serah</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        $kec = pg_query($koneksi, "select * from kecamatan order by kode");
                        while ($kc = pg_fetch_array($kec)) {
                        ?>
                            <?php
                            $total = pg_query($koneksi, "select count(nokk) as totaldata from keluarga where kodekec='$kc[kode]'");
                            $jlh = pg_fetch_array($total);
                            $jumlah = $jlh[totaldata];
                            $sehat = pg_query($koneksi, "select count(nokk) as totaldata from keluarga where kodekec='$kc[kode]' and rumah='Sehat'");
                            $jlhsehat = pg_fetch_array($sehat);
                            $jumlahsehat = $jlhsehat[totaldata];
                            $kurang = pg_query($koneksi, "select count(nokk) as totaldata from keluarga where kodekec='$kc[kode]' and rumah='Kurang Sehat'");
                            $jlhkurang = pg_fetch_array($kurang);
                            $jumlahkurang = $jlhkurang[totaldata];
                            ?>


                            <tr>
                                <td><?php echo " $kc[kode]"; ?></td>
                                <td><?php echo " $kc[nama_kec]"; ?></td>
                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $jumlahsehat . ' (' . (round($jumlahsehat / $jumlah * 100, 2)) . '%)'; ?></td>
                                <td><?php echo $jumlahkurang . ' (' . (round($jumlahkurang / $jumlah * 100, 2)) . '%)'; ?></td>

                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
        <!-- /.row -->
    </section>

    <!-- right col (We are only adding the ID to make the widgets sortable)-->
    <section class="col-lg-5 connectedSortable">



    </section><!-- /.content -->




<?php
}
?>