<?php
$kodekec=$_SESSION[ses_kodekec];
 ?>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<figure class="highcharts-figure">
    <div id="container"></div>
    <p class="highcharts-description">
</figure>
<hr>

<figure class="highcharts-figure">
    <div id="container2"></div>
    <p class="highcharts-description">
</figure>
<hr>

<figure class="highcharts-figure">
    <div id="container3"></div>
    <p class="highcharts-description">
</figure>

<hr>

<figure class="highcharts-figure">
    <div id="container4"></div>
    <p class="highcharts-description">
</figure>

<hr>
<figure class="highcharts-figure">
    <div id="container5"></div>
    <p class="highcharts-description">
</figure>
<hr>

<figure class="highcharts-figure">
    <div id="container6"></div>
    <p class="highcharts-description">
</figure>
<hr>

<figure class="highcharts-figure">
    <div id="container7"></div>
    <p class="highcharts-description">
</figure>
<hr>

<figure class="highcharts-figure">
    <div id="container8"></div>
    <p class="highcharts-description">
</figure>
<hr>

<figure class="highcharts-figure">
    <div id="container9"></div>
    <p class="highcharts-description">
</figure>
<hr>

<figure class="highcharts-figure">
    <div id="container10"></div>
    <p class="highcharts-description">
</figure>
<hr>

<script type="text/javascript">
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Bantuan DTKS Kelurahan/Desa'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kelurahan/Desa'
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
                '<td style="padding:0"><b>{point.y:.1f} Data</b></td></tr>',
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
            $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakel = $kc['nama_kel'];

                $con = pg_query($koneksi, "select * from bantuan where kodekel='$kc[kode]' and dtks='DTKS'");
                $total = pg_num_rows($con);
                while ($isi = pg_fetch_array($con)) {
                    $jumlah = $total;
                }
            ?> {
                    name: '<?php echo $namakel; ?>',
                    data: [<?php echo $jumlah; ?>]
                },
            <?php } ?>


        ]
    });
</script>



<script type="text/javascript">
    Highcharts.chart('container2', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Bantuan Non-DTKS Kelurahan/Desa'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kelurahan/Desa'
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
                '<td style="padding:0"><b>{point.y:.1f} Data</b></td></tr>',
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
            $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakec = $kc['nama_kel'];

                $con = pg_query($koneksi, "select * from bantuan where kodekel='$kc[kode]' and nondtks='Non-DTKS'");
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


<script type="text/javascript">
    Highcharts.chart('container3', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Bantuan PBNT Kelurahan/Desa'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kelurahan/Desa'
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
                '<td style="padding:0"><b>{point.y:.1f} Data</b></td></tr>',
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
            $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakec = $kc['nama_kel'];

                $con = pg_query($koneksi, "select * from bantuan where kodekel='$kc[kode]' and pbnt='PBNT'");
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


<script type="text/javascript">
    Highcharts.chart('container4', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Bantuan JPS-Provinsi Kelurahan/Desa'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kelurahan/Desa'
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
                '<td style="padding:0"><b>{point.y:.1f} Data</b></td></tr>',
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
            $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakec = $kc['nama_kel'];

                $con = pg_query($koneksi, "select * from bantuan where kodekel='$kc[kode]' and jps_provinsi='JPS-Provinsi'");
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


<script type="text/javascript">
    Highcharts.chart('container5', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Bantuan BLT-DD Kelurahan/Desa'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kelurahan/Desa'
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
                '<td style="padding:0"><b>{point.y:.1f} Data</b></td></tr>',
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
            $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakec = $kc['nama_kel'];

                $con = pg_query($koneksi, "select * from bantuan where kodekel='$kc[kode]' and blt_dd='BLT-DD'");
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


<script type="text/javascript">
    Highcharts.chart('container6', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Bantuan PKH Kelurahan/Desa'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kelurahan/Desa'
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
                '<td style="padding:0"><b>{point.y:.1f} Data</b></td></tr>',
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
            $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakec = $kc['nama_kel'];

                $con = pg_query($koneksi, "select * from bantuan where kodekel='$kc[kode]' and pkh='PKH'");
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

<script type="text/javascript">
    Highcharts.chart('container7', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Bantuan BST Kelurahan/Desa'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kelurahan/Desa'
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
                '<td style="padding:0"><b>{point.y:.1f} Data</b></td></tr>',
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
            $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakec = $kc['nama_kel'];

                $con = pg_query($koneksi, "select * from bantuan where kodekel='$kc[kode]' and bst='BST'");
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


<script type="text/javascript">
    Highcharts.chart('container8', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Bantuan PMKS Kelurahan/Desa'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kelurahan/Desa'
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
                '<td style="padding:0"><b>{point.y:.1f} Data</b></td></tr>',
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
            $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakec = $kc['nama_kel'];

                $con = pg_query($koneksi, "select * from bantuan where kodekel='$kc[kode]' and pmks='PMKS'");
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


<script type="text/javascript">
    Highcharts.chart('container9', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Bantuan PBI Kelurahan/Desa'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kelurahan/Desa'
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
                '<td style="padding:0"><b>{point.y:.1f} Data</b></td></tr>',
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
            $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakec = $kc['nama_kel'];

                $con = pg_query($koneksi, "select * from bantuan where kodekel='$kc[kode]' and pbi='PBI'");
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


<script type="text/javascript">
    Highcharts.chart('container10', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Data Bantuan Lainnya Kelurahan/Desa'
        },
        subtitle: {
            text: 'Kabupaten Batu Bara'
        },
        xAxis: {
            categories: [
                'Kelurahan/Desa'
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
                '<td style="padding:0"><b>{point.y:.1f} Data</b></td></tr>',
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
            $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by kode");
            while ($kc = pg_fetch_array($kec)) {
                $namakec = $kc['nama_kel'];

                $con = pg_query($koneksi, "select * from bantuan where kodekel='$kc[kode]' and lainnya='Lainnya'");
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

