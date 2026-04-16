<?php
// 1. Pengecekan Session
if (empty($_SESSION['ses_user']) || empty($_SESSION['ses_password'])) {
    header('location:404.php');
    exit();
} else {
    include "../config/koneksi.php";
    $aksi = "module/datakrt/aksi_datakrt.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch ($act) {
        default:
            // --- LOGIKA PAGINATION & QUERY ---
            $batas = 10;
            $hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
            $posisi = ($hal - 1) * $batas;

            if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
                $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM datakrt WHERE namakrt IS NOT NULL AND namakrt != ''");
                $title = "DATA KEPALA RUMAH TANGGA KABUPATEN BATU BARA";
                $query_data = "SELECT * FROM datakrt WHERE namakrt IS NOT NULL AND namakrt != '' ORDER BY kelurahan, nama_lingkungan DESC LIMIT $batas OFFSET $posisi";
            } else {
                $kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
                $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM datakrt WHERE kodekel='$kodekel' AND namakrt IS NOT NULL AND namakrt != ''");
                $title = "DATA KEPALA RUMAH TANGGA DESA " . $_SESSION['ses_namakel'];
                $query_data = "SELECT * FROM datakrt WHERE kodekel='$kodekel' AND namakrt IS NOT NULL AND namakrt != '' ORDER BY nama_lingkungan DESC LIMIT $batas OFFSET $posisi";
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
                            <a class="btn bg-purple" href="?module=datakrt&act=tambahdatakrt"><i class="fa fa-plus"></i> Tambah</a>
                        <?php } ?>
                    </div>

                    <div class="table-responsive">
                        <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>No.KRT</th>
                                    <th>Nama KRT</th>
                                    <th>Dasawisma</th>
                                    <th>Lingkungan</th>
                                    <th>Kelurahan</th>
                                    <th>Kecamatan</th>
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
                                            <td>{$lk['nokrt']}</td>
                                            <td>{$lk['namakrt']}</td>
                                            <td>{$lk['nama_dasawisma']}</td>
                                            <td>{$lk['nama_lingkungan']}</td>
                                            <td>{$lk['kelurahan']}</td>
                                            <td>{$lk['kecamatan']}</td>
                                            <td>
                                                <a href='?module=lihatdatakrt&id={$lk['id']}' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></a>
                                                <a href='?module=editdatakrt&id={$lk['id']}' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>
                                                <a href='?module=hapusdatakrt&id={$lk['id']}' class='btn btn-xs btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>
                                            </td>
                                        </tr>";
                                        $no++;
                                    }
                                } else {
                                    echo "<tr><td colspan='8' class='text-center'>Tidak ada data</td></tr>";
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
                            echo "<li><a href='?module=datakrt&hal=1'>&laquo;</a></li>";
                        }
                        for ($i = $start; $i <= $end; $i++) {
                            $aktif = ($i == $hal) ? "class='active'" : "";
                            echo "<li $aktif><a href='?module=datakrt&hal=$i'>$i</a></li>";
                        }
                        if ($hal < $jmlhalaman) {
                            echo "<li><a href='?module=datakrt&hal=$jmlhalaman'>&raquo;</a></li>";
                        }
                        ?>
                    </ul>
                </div>
         
            <?php
            break;

        case "tambahdatakrt":
            $kdkel = $_SESSION['ses_kodekel'];
            $rand5 = rand(1000, 9999); // Mengganti randpass5 jika fungsi tidak tersedia
            ?>
            <section class="content-header">
                <h1 class="text-center">Form Tambah Data Kepala Rumah Tangga</h1>
            </section>

            <div class="box box-info" style="margin-top: 20px;">
                <form class="form-horizontal" action="<?php echo $aksi; ?>?module=datakrt&act=input" method="POST" id="form-tambah">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No.KRT <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nokrt" value="<?php echo $kdkel . $rand5; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama KRT <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="namakrt" required>
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
                                        'kodekel' => 'Kode Kelurahan',
                                        'kelurahan' => 'Kelurahan',
                                        'kodekec' => 'Kode Kecamatan',
                                        'kecamatan' => 'Kecamatan',
                                        'nama_lingkungan' => 'Lingkungan'
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
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-8 col-md-offset-2">
                            <a href="?module=datakrt" class="btn btn-default"><i class="fa fa-remove"></i> Batal</a>
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
                                        <th>Kelurahan</th>
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
                                            <td><?php echo $data['kelurahan']; ?></td>
                                            <td><?php echo $data['lingkungan']; ?></td>
                                            <td>
                                                <button class="btn btn-xs btn-primary pilih-dasawisma" 
                                                    data-kode="<?php echo $data['kode']; ?>" 
                                                    data-nama="<?php echo $data['nama_dasawisma']; ?>"
                                                    data-kodekel="<?php echo $data['kodekel']; ?>"
                                                    data-kel="<?php echo $data['kelurahan']; ?>"
                                                    data-kodekec="<?php echo $data['kodekec']; ?>"
                                                    data-kec="<?php echo $data['kecamatan']; ?>"
                                                    data-lingk="<?php echo $data['lingkungan']; ?>">
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
                $('#kodekel').val($(this).data('kodekel'));
                $('#kelurahan').val($(this).data('kel'));
                $('#kodekec').val($(this).data('kodekec'));
                $('#kecamatan').val($(this).data('kec'));
                $('#nama_lingkungan').val($(this).data('lingk'));
                $('#myModal10').modal('hide');
            });
            </script>
            <?php
            break;
    }
}
?>