<?php
// 1. Pengecekan Session
if (empty($_SESSION['ses_user']) || empty($_SESSION['ses_password'])) {
    header('location:404.php');
    exit();
} else {
    include "../config/koneksi.php";
    $aksi = "module/bantuan/aksi_bantuan.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch ($act) {
        default:
            // --- LOGIKA PAGINATION & QUERY ---
            $batas = 10;
            $hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
            $posisi = ($hal - 1) * $batas;

            if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
                $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM bantuan WHERE nama IS NOT NULL AND nama != ''");
                $title = "DATA BANTUAN KELUARGA KABUPATEN BATU BARA";
                $query_data = "SELECT * FROM bantuan WHERE nama IS NOT NULL AND nama != '' ORDER BY kelurahan, lingkungan DESC LIMIT $batas OFFSET $posisi";
            } else {
                $kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
                $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM bantuan WHERE kodekel='$kodekel' AND nama IS NOT NULL AND nama != ''");
                $title = "DATA BANTUAN KELUARGA DESA " . $_SESSION['ses_namakel'];
                $query_data = "SELECT * FROM bantuan WHERE kodekel='$kodekel' AND nama IS NOT NULL AND nama != '' ORDER BY lingkungan DESC LIMIT $batas OFFSET $posisi";
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
                        <?php if ($_SESSION['ses_level'] == 'admkel') { ?>
                            <a class="btn bg-purple" href="?module=bantuan&act=tambahbantuan"><i class="fa fa-plus"></i> Tambah</a>
                        <?php } ?>
                    </div>

                    <div class="table-responsive">
                        <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Tgl.Entry</th>
                                    <th>No.KK</th>
                                    <th>Nama</th>
                                    <th>Dasawisma</th>
                                    <th>Lingkungan</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
                                    <th>DTKS</th>
                                    <th>Non-DTKS</th>
                                    <th>PBNT</th>
                                    <th>JPS-Prov</th>
                                    <th>BLT-DD</th>
                                    <th>PKH</th>
                                    <th>BST</th>
                                    <th>PMKS</th>
                                    <th>PBI</th>
                                    <th>Lainnya</th>
                                    <th width="120">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = $posisi + 1;
                                $lingk = pg_query($koneksi, $query_data);

                                if (pg_num_rows($lingk) > 0) {
                                    while ($lk = pg_fetch_array($lingk)) {
                                        $dtks = !empty($lk['dtks']) ? '<i class="fa fa-check text-success"></i>' : '';
                                        $non_dtks = !empty($lk['nondtks']) ? '<i class="fa fa-check text-success"></i>' : '';
                                        $pbnt = !empty($lk['pbnt']) ? '<i class="fa fa-check text-success"></i>' : '';
                                        $jps_prov = !empty($lk['jps_provinsi']) ? '<i class="fa fa-check text-success"></i>' : '';
                                        $blt_dd = !empty($lk['blt_dd']) ? '<i class="fa fa-check text-success"></i>' : '';
                                        $pkh = !empty($lk['pkh']) ? '<i class="fa fa-check text-success"></i>' : '';
                                        $bst = !empty($lk['bst']) ? '<i class="fa fa-check text-success"></i>' : '';
                                        $pmks = !empty($lk['pmks']) ? '<i class="fa fa-check text-success"></i>' : '';
                                        $pbi = !empty($lk['pbi']) ? '<i class="fa fa-check text-success"></i>' : '';
                                        $lainnya = !empty($lk['lainnya']) ? '<i class="fa fa-check text-success"></i>' : '';
                                        
                                        echo "<tr>
                                            <td>$no</td>
                                            <td>{$lk['tglentry']}</td>
                                            <td>{$lk['nokk']}</td>
                                            <td>{$lk['nama']}</td>
                                            <td>{$lk['nama_dasawisma']}</td>
                                            <td>{$lk['lingkungan']}</td>
                                            <td>{$lk['kelurahan']}</td>
                                            <td>{$lk['kecamatan']}</td>
                                            <td class='text-center'>$dtks</td>
                                            <td class='text-center'>$non_dtks</td>
                                            <td class='text-center'>$pbnt</td>
                                            <td class='text-center'>$jps_prov</td>
                                            <td class='text-center'>$blt_dd</td>
                                            <td class='text-center'>$pkh</td>
                                            <td class='text-center'>$bst</td>
                                            <td class='text-center'>$pmks</td>
                                            <td class='text-center'>$pbi</td>
                                            <td class='text-center'>$lainnya</td>
                                            <td>
                                                <a href='?module=lihatbantuan&id={$lk['id']}' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></a>
                                                <a href='?module=editbantuan&id={$lk['id']}' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>
                                                <a href='?module=hapusbantuan&id={$lk['id']}' class='btn btn-xs btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>
                                            </td>
                                        </tr>";
                                        $no++;
                                    }
                                } else {
                                    echo "<tr><td colspan='19' class='text-center'>Tidak ada data</td></tr>";
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
                            echo "<li><a href='?module=bantuan&hal=1'>&laquo;</a></li>";
                        }
                        for ($i = $start; $i <= $end; $i++) {
                            $aktif = ($i == $hal) ? "class='active'" : "";
                            echo "<li $aktif><a href='?module=bantuan&hal=$i'>$i</a></li>";
                        }
                        if ($hal < $jmlhalaman) {
                            echo "<li><a href='?module=bantuan&hal=$jmlhalaman'>&raquo;</a></li>";
                        }
                        ?>
                    </ul>
                </div>
           
            <?php
            break;

        case "tambahbantuan":
            ?>
            <section class="content-header">
                <h1 class="text-center">Form Tambah Data Bantuan Keluarga</h1>
            </section>

            <div class="box box-info" style="margin-top: 20px;">
                <form class="form-horizontal" action="<?php echo $aksi; ?>?module=bantuan&act=input" method="POST" id="form-tambah">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tgl.Entry <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="tglentry" value="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">NIK <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nik" id="nik" maxlength="16" readonly required>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal19">
                                            <i class="fa fa-search"></i> Cari
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No.KK <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nokk" id="nokk" maxlength="16" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama" id="nama" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kode Dasawisma <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="kode" id="kode" readonly required>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal10">
                                            <i class="fa fa-search"></i> Cari
                                        </button>
                                    </div>
                                </div>
                                <?php 
                                    $fields = [
                                        'nama_dasawisma' => 'Nama Dasawisma',
                                        'lingkungan' => 'Lingkungan',
                                        'kelurahan' => 'Kelurahan',
                                        'kecamatan' => 'Kecamatan'
                                    ];
                                    foreach ($fields as $name => $label) {
                                        echo "<div class='form-group'>
                                                <label class='col-sm-4 control-label'>$label</label>
                                                <div class='col-sm-8'>
                                                    <input type='text' class='form-control' name='$name' id='$name' readonly>
                                                </div>
                                              </div>";
                                    }
                                ?>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Penerima Bantuan <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="penerima_bantuan" required>
                                            <option value="">Pilih</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jenis Bantuan</label>
                                    <div class="col-sm-8">
                                        <?php
                                        $bantuan_types = ['dtks' => 'DTKS', 'non_dtks' => 'Non-DTKS', 'pbnt' => 'PBNT', 'jps_prov' => 'JPS-Provinsi', 'blt_dd' => 'BLT-DD', 'pkh' => 'PKH', 'bst' => 'BST', 'pmks' => 'PMKS', 'pbi' => 'PBI', 'lainnya' => 'Lainnya'];
                                        foreach ($bantuan_types as $key => $label) {
                                            echo "<div class='checkbox'>
                                                    <label>
                                                        <input type='checkbox' name='$key' value='$label'> $label
                                                    </label>
                                                  </div>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-8 col-md-offset-2">
                            <a href="?module=bantuan" class="btn btn-default"><i class="fa fa-remove"></i> Batal</a>
                            <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan Data</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal fade" id="myModal10" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Pilih Data Dasawisma</h4>
                        </div>
                        <div class="modal-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Nama Dasawisma</th>
                                        <th>Lingkungan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $kodekel_ses = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
                                    $qu = pg_query($koneksi, "SELECT * FROM dasawisma WHERE kodekel='$kodekel_ses' AND nama_dasawisma != '' ORDER BY lingkungan DESC");
                                    while ($data = pg_fetch_array($qu)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $data['kode']; ?></td>
                                            <td><?php echo $data['nama_dasawisma']; ?></td>
                                            <td><?php echo $data['lingkungan']; ?></td>
                                            <td>
                                                <button class="btn btn-xs btn-primary pilih-dasawisma" 
                                                    data-kode="<?php echo $data['kode']; ?>" 
                                                    data-nama="<?php echo $data['nama_dasawisma']; ?>"
                                                    data-lingkungan="<?php echo $data['lingkungan']; ?>"
                                                    data-kelurahan="<?php echo $data['kelurahan']; ?>"
                                                    data-kecamatan="<?php echo $data['kecamatan']; ?>">
                                                    Pilih
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="myModal19" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Pilih Data Warga</h4>
                        </div>
                        <div class="modal-body">
                            <table id="example4" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>No.KK</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $qu = pg_query($koneksi, "SELECT * FROM datawarga WHERE kodekel='$kodekel_ses' AND nama != '' ORDER BY nokk");
                                    while ($data = pg_fetch_array($qu)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $data['nik']; ?></td>
                                            <td><?php echo $data['nokk']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td>
                                                <button class="btn btn-xs btn-primary pilih-warga" 
                                                    data-nik="<?php echo $data['nik']; ?>" 
                                                    data-nokk="<?php echo $data['nokk']; ?>"
                                                    data-nama="<?php echo $data['nama']; ?>">
                                                    Pilih
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <script>
            $(document).on('click', '.pilih-dasawisma', function() {
                $('#kode').val($(this).data('kode'));
                $('#nama_dasawisma').val($(this).data('nama'));
                $('#lingkungan').val($(this).data('lingkungan'));
                $('#kelurahan').val($(this).data('kelurahan'));
                $('#kecamatan').val($(this).data('kecamatan'));
                $('#myModal10').modal('hide');
            });
            $(document).on('click', '.pilih-warga', function() {
                $('#nik').val($(this).data('nik'));
                $('#nokk').val($(this).data('nokk'));
                $('#nama').val($(this).data('nama'));
                $('#myModal19').modal('hide');
            });
            </script>
            <?php
            break;
    }
}
?>
