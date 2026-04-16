<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
</figure>

<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Persentase Data KRT Kecamatan'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kecamatan'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Grafik Input'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} Terinput</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [

            <?php
            $kec = pg_query($koneksi, "select * from kecamatan order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakec = $kc['nama_kec'];

                $con = pg_query($koneksi, "select * from datakrt where kodekec='$kc[kode]'");
                $total = pg_num_rows($con);
                while ($isi = pg_fetch_array($con)) {
                    $jumlah = $total;
                }
            ?> {
                    name: '<?php echo $namakec; ?>',
                    data: [<?php echo $jumlah; ?>]
                },
            <?php } ?>


        ]
    });
</script>

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- /.col (LEFT) -->
        <div class="col-md-12">
        <h3>Keterangan</h3>
            <h5>*Apabila Data Input, Jumlah KK berbeda (<i>Data Minus</i>) dan Persentase lebih dari 100%. Mohon koreksi ke Desa terkait,
            kemungkinan kesalahan pada saat menginput atau Data KK yang Tidak Valid.</h5>
            <hr>
            <h3>Perhitungan Persentase</h3>
            <h5>*Rumus Persentase : Data Input KRT / Jumlah KRT * 100.</h5>
            <hr>
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
    <hr>
    <!-- /.col (RIGHT) -->

    <div class='box-body'>
        <div class="box-body table-responsive no-padding">
            <table class='table table-bordered table-striped text-center'>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Kecamatan</th>
                        <th>Data Input KRT</th>
                        <th>Belum Terinput KRT</th>
                        <th>Jumlah KRT</th>
                        <th>Persentase</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 0;
                    $kec = pg_query($koneksi, "select * from kecamatan order by kode");
                    while ($kc = pg_fetch_array($kec)) {
                    ?>
                        <tr>
                        <td><?php echo $no=$no+1;?></td>
                            <td><?php echo " $kc[kode]"; ?></td>
                            <td><?php echo " $kc[nama_kec]"; ?></td>

                            <!-- Ngambil data krt -->
                            <?php
                            $total = pg_query($koneksi, "select count(nokrt) as totaldata from datakrt where kodekec= '$kc[kode]'");
                            $jlh = pg_fetch_array($total);
                            $jumlah = $jlh['totaldata'];
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
                    }
                    ?>
                </tbody>

            </table>

        </div>
    </div>
</section>