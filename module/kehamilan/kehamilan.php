<?php
// 1. Pengecekan Session
if (empty($_SESSION['ses_user']) || empty($_SESSION['ses_password'])) {
    header('location:404.php');
    exit();
} else {
    include "../../config/koneksi.php";
    $aksi = "module/kehamilan/aksi_kehamilan.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch ($act) {
        default:
            // --- LOGIKA PAGINATION & QUERY ---
            $batas = 10;
            $hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
            $posisi = ($hal - 1) * $batas;

            if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
                $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM kehamilan");
                $title = "CATATAN IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL*, KELAHIRAN BAYI, BAYI MENINGGAL DAN KEMATIAN BALITA";
                $query_data = "SELECT * FROM kehamilan ORDER BY id DESC LIMIT $batas OFFSET $posisi";
            } else {
                $kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
                $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM kehamilan WHERE kodekel='$kodekel'");
                $title = "CATATAN IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL*, KELAHIRAN BAYI, BAYI MENINGGAL DAN KEMATIAN BALITA DESA " . $_SESSION['ses_namakel'];
                $query_data = "SELECT * FROM kehamilan WHERE kodekel='$kodekel' ORDER BY id DESC LIMIT $batas OFFSET $posisi";
            }

            if (!$count_query) {
                die("Error count query: " . pg_last_error($koneksi));
            }
            $count_result = pg_fetch_array($count_query);
            $jmldata = $count_result['total'];
            $jmlhalaman = ceil($jmldata / $batas);
            ?>

                <div class='box-header with-border'>
                    <h3 class='box-title'><?php echo $title; ?></h3>
                </div>
                
                <div class='box-body'>
                    <div style="text-align:right; margin-bottom:10px;">
                        <a class="btn bg-green" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>
                        <a class="btn bg-purple" href="?module=kehamilan&act=tambahkehamilan"><i class="fa fa-plus"></i> Tambah</a>
                    </div>

                    <div class="table-responsive">
                        <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Bulan</th>
                                    <th>Tahun</th>
                                    <th>Dasawisma</th>
                                    <th>Jlh Bumil</th>
                                    <th>Jlh Melahirkan</th>
                                    <th>Nifas</th>
                                    <th>Meninggal</th>
                                    <th>Jlh Bayi Lahir LK</th>
                                    <th>Jlh Bayi Lahir P</th>
                                    <th>Akte Lahir</th>
                                    <th>Bayi Meninggal LK</th>
                                    <th>Bayi Meninggal P</th>
                                    <th>Balita Meninggal LK</th>
                                    <th>Balita Meninggal P</th>
                                    <th>Keterangan</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = $posisi + 1;
                                $lingk = pg_query($koneksi, $query_data);

                                if (pg_num_rows($lingk) > 0) {
                                    while ($lk = pg_fetch_array($lingk)) {
                                        echo "<tr>
                                            <td>$no</td>
                                            <td>{$lk['bulan']}</td>
                                            <td>{$lk['tahun']}</td>
                                            <td>{$lk['dasawisma']}</td>
                                            <td>{$lk['jlhbumil']}</td>
                                            <td>{$lk['jlhmelahirkan']}</td>
                                            <td>{$lk['jlhnifas']}</td>
                                            <td>{$lk['jlhmeninggal']}</td>
                                            <td>{$lk['bayilahirl']}</td>
                                            <td>{$lk['bayilahirp']}</td>
                                            <td>{$lk['akte']}</td>
                                            <td>{$lk['bayimeninggalk']}</td>
                                            <td>{$lk['bayimeninggalp']}</td>
                                            <td>{$lk['balital']}</td>
                                            <td>{$lk['balitap']}</td>
                                            <td>{$lk['keterangan']}</td>
                                            <td>
                                                <a href='?module=lihatkehamilan&id={$lk['id']}' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></a>
                                                <a href='?module=editkehamilan&id={$lk['id']}' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>
                                                <a href='?module=hapuskehamilan&id={$lk['id']}' class='btn btn-xs btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>
                                            </td>
                                        </tr>";
                                        $no++;
                                    }
                                } else {
                                    echo "<tr><td colspan='17' class='text-center'>Tidak ada data</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <?php
                        $batas_halaman = 5;
                        $start = max(1, $hal - floor($batas_halaman / 2));
                        $end = min($jmlhalaman, $start + $batas_halaman - 1);

                        if ($hal > 1) {
                            echo "<li><a href='?module=kehamilan&hal=1'>&laquo;</a></li>";
                        }
                        for ($i = $start; $i <= $end; $i++) {
                            $aktif = ($i == $hal) ? "class='active'" : "";
                            echo "<li $aktif><a href='?module=kehamilan&hal=$i'>$i</a></li>";
                        }
                        if ($hal < $jmlhalaman) {
                            echo "<li><a href='?module=kehamilan&hal=$jmlhalaman'>&raquo;</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            <?php
            break;

        case "tambahkehamilan":
            ?>
            <section class="content-header">
                <h1 class="text-center">Form Tambah Catatan Ibu Hamil, Melahirkan, Nifas, Ibu Meninggal*, Kelahiran Bayi, Bayi Meninggal dan Kematian Balita</h1>
            </section>

            <div class="box box-info" style="margin-top: 20px;">
                <script type="text/javascript">
                    $(function() {
                        $( "#tglentry" ).datepicker({ altFormat: 'yy-mm-dd' });
                        $( "#tglentry" ).change(function() {
                             $( "#tglentry" ).datepicker( "option", 'dateFormat', "yy-mm-dd" );
                         });
                    });
                </script>

                <form class="form-horizontal" action="<?php echo $aksi; ?>?module=kehamilan&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tgl.Entry <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Bulan<span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <select class="validate[required] form-control select2" name='bulan' id='bulan' required>
                                            <option value="">Pilih</option>
                                            <option value="Januari">Januari</option>
                                            <option value="Februari">Februari</option>
                                            <option value="Maret">Maret</option>
                                            <option value="April">April</option>
                                            <option value="Mei">Mei</option>
                                            <option value="Juni">Juni</option>
                                            <option value="Juli">Juli</option>
                                            <option value="Agustus">Agustus</option>
                                            <option value="September">September</option>
                                            <option value="Oktober">Oktober</option>
                                            <option value="November">November</option>
                                            <option value="Desember">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tahun<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="text" class="validate[required] form-control" id="tahun" name="tahun" placeholder="yyyy" value="<?php echo date('Y'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kode Kelurahan<span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="kodekel" value="<?php echo $_SESSION['ses_kodekel']; ?>" placeholder="Kode Kelurahan" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Kelurahan<span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="namakel" value="<?php echo $_SESSION['ses_namakel']; ?>" placeholder="Nama Kelurahan" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="kodekec" value="<?php echo $_SESSION['ses_kodekec']; ?>" placeholder="Kode Kecamatan" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Kecamatan<span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="namakec" value="<?php echo $_SESSION['ses_namakec']; ?>" placeholder="Nama Kecamatan" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Lingkungan <span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class='validate[required] form-control select2' name='nama_lingkungan' id='lingkungan' required>
                                            <option value="">Pilih</option>
                                            <?php
                                            $lk = pg_query($koneksi, "SELECT * FROM lingkungan order by kode"); 
                                            while($p = pg_fetch_array($lk)){
                                                echo "<option value=\"{$p['nama_lingkungan']}\">{$p['nama_lingkungan']}</option>\n";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Dasawisma <span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <select class='validate[required] form-control select2' name='dasawisma' id='dasawisma' required>
                                            <option value="">Pilih</option>
                                            <?php
                                            $lk = pg_query($koneksi, "SELECT * FROM dasawisma where kodekel='{$_SESSION['ses_kodekel']}' order by kode"); 
                                            while($p = pg_fetch_array($lk)){
                                                echo "<option value=\"{$p['nama_dasawisma']}\">{$p['nama_dasawisma']}</option>\n";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jumlah Ibu Hamil<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="validate[required,custom[number]] form-control" name="jlhbumil" id="jlhbumil" placeholder="Ibu Hamil" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jumlah Ibu Melahirkan<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="validate[required,custom[number]] form-control" name="jlhmelahirkan" id="jlhmelahirkan" placeholder="Ibu Melahirkan" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jumlah Ibu Nifas<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="validate[required,custom[number]] form-control" name="jlhnifas" id="jlhnifas" placeholder="Ibu Nifas" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jumlah Ibu Meninggal<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="validate[required,custom[number]] form-control" name="jlhmeninggal" id="jlhmeninggal" placeholder="Ibu Meninggal" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jlh Bayi Lahir LK<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="validate[required,custom[number]] form-control" name="bayilahirl" id="bayilahirl" placeholder="Bayi Lahir LK" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jlh Bayi Lahir Pr<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="number" class="validate[required,custom[number]] form-control" name="bayilahirp" id="bayilahirp" placeholder="Bayi Lahir Pr" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Akte Kelahiran</label>
                                    <div class="col-sm-5">
                                        <select class="form-control" name='akte' id='akte'>
                                            <option value="">Pilih</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Bayi Meninggal LK<span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="number" class="validate[required,custom[number]] form-control" name="bayimeninggalk" id="bayimeninggalk" placeholder="Bayi Meninggal LK" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Bayi Meninggal Pr<span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="number" class="validate[required,custom[number]] form-control" name="bayimeninggalp" id="bayimeninggalp" placeholder="Bayi Meninggal Pr" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Balita Meninggal LK<span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="number" class="validate[required,custom[number]] form-control" name="balital" id="balital" placeholder="Balita Meninggal LK" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Balita Meninggal Pr<span class="text-danger">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="number" class="validate[required,custom[number]] form-control" name="balitap" id="balitap" placeholder="Balita Meninggal Pr" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Keterangan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">User Entry</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="userentry" id="userentry" value="<?php echo $_SESSION['ses_nama']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Waktu Entry</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo date('H:i:s'); ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Level User</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="level" id="level" value="<?php echo $_SESSION['ses_level']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a type="submit" href="appmaster.php?module=kehamilan" name="cmdkehamilan" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                        <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                    </div>
                </form>
            </div>
            <?php
            break;
    }
}
?>
