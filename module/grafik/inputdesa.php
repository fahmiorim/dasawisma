
<?php 
$kodekec=$_SESSION[ses_kodekec];
 ?>


<!-- Main content -->
<section class="content">
    <div class="row">
        <h3 align="center">Monitoring Kinerja Penginputan Desa</h3>
</br>
    <div class='box-body'>
        <div class="box-body table-responsive no-padding">
            <table class='table table-bordered table-striped text-center'>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Kelurahan / Desa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $no = 1;
                    $kec = pg_query($koneksi, "select * from kelurahan where kodekec='$kodekec' order by id ");
                    while ($kc = pg_fetch_array($kec)) {
                    ?>
                        <tr>
                            <td><?php echo " $kc[kode]"; ?></td>
                            <td><?php echo " $kc[nama_kel]"; ?></td>
                <td>
                <a href="modul/grafik/monitoring.php?kodekel=<?php echo $kc['kode'];?>" class="btn btn-info btn-xs" role="button">
                      <i class="fa fa-eye"></i> Monitoring</a></td>
            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>

            </table>
        </div>
    </div>
    </div>
</section>