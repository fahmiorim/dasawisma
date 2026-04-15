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
            <small>Input Real Time e-Dasawisma</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Grafik</a></li>
            <li class="active">Input Dasawisma</li>
        </ol>
    </section>



    <!-- <script>
        var refreshId = setInterval(function() {
            $input = load('themes/inputdasawisma.php');
        }, 1000);
    </script> -->

    <!--<script>
        $(function() {
            "use strict";
            //BAR CHART
            var bar = new Morris.Bar({
                element: 'bar-chart',
                resize: true,
                data: [<?php
                        $kec = pg_query($koneksi, "select * from kecamatan order by kode");
                        while ($kc = pg_fetch_array($kec)) {
                        ?>
                        <?php
                            $jumlah = pg_query($koneksi, "select * from datakrt where kodekec='$kc[kode]'");
                            $jumlahkk = $kc['jlh_kk'];
                            $total = pg_num_rows($jumlah);
                            $data = '{k:' . "'$kc[kode]'" . " , " . 'j : ' . "'" . round($total / $jumlahkk * 100, 2) . "'" . "},";
                            echo $data;
                        ?>
                    <?php } ?>
                ],
                barColors: ['#00a65a'],
                xkey: 'k',
                ykeys: ['j'],
                labels: ['Persen'],
                hideHover: 'no'
            });
        });
    </script>-->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-12">
                <div class="box-header with-border">
                    <h3 class="box-title">Bar Chart</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="bar-chart" style="height: 300px;"></div>
                </div>
                <h3>Keterangan</h3>
                <div>Jumlah data kepala rumah tangga yang di input per Kecamatan di bagi Jumlah kepala rumah tangga Data Disdukcapil</div>
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
                            <th>Belum Terinput</th>
                            <th>Jumlah KK</th>
                            <th>Persentase</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        $kec = pg_query($koneksi, "select * from kecamatan order by kode");
                        while ($kc = pg_fetch_array($kec)) {
                        ?>
                            <tr>
                                <td><?php echo " $kc[kode]"; ?></td>
                                <td><?php echo " $kc[nama_kec]"; ?></td>

                                <!-- COBA -->
                                <?php
                                $total = pg_query($koneksi, "select count(kode) as totaldata from datakrt where kodekec= '$kc[kode]'");
                                $jlh = pg_fetch_array($total);
                                $jumlah = $jlh[totaldata];
                                ?>
                                <!-- ============================================= -->

                                <?php
                                $jumlahkk = $kc['jlh_kk'];
                                $beluminput = $jumlahkk - $jumlah;
                                ?>

                                <td><?php echo $jumlah; ?></td>
                                <td><?php echo $beluminput; ?></td>
                                <td><?php echo $jumlahkk; ?></td>
                                <td><?php $persen = round($jumlah / $jumlahkk * 100, 2);
                                    echo $persen ?> %</td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </section>

<?php
}
?>