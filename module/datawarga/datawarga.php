<?php
// 1. Pengecekan Session
if (empty($_SESSION['ses_user']) || empty($_SESSION['ses_password'])) {
    header('location:404.php');
    exit();
} else {
    include "../config/koneksi.php";
    $aksi = "module/datawarga/aksi_datawarga.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch ($act) {
        default:
            // --- LOGIKA PAGINATION & QUERY ---
            $batas = 10;
            $hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
            $posisi = ($hal - 1) * $batas;

            if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk') {
                $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM datawarga WHERE nama IS NOT NULL AND nama != ''");
                $title = "DATA WARGA KABUPATEN BATU BARA";
                $query_data = "SELECT * FROM datawarga WHERE nama IS NOT NULL AND nama != '' ORDER BY kelurahan, lingkungan DESC LIMIT $batas OFFSET $posisi";
            } else {
                $kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
                $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM datawarga WHERE kodekel='$kodekel' AND nama IS NOT NULL AND nama != ''");
                $title = "DATA WARGA DESA " . $_SESSION['ses_namakel'];
                $query_data = "SELECT * FROM datawarga WHERE kodekel='$kodekel' AND nama IS NOT NULL AND nama != '' ORDER BY lingkungan DESC LIMIT $batas OFFSET $posisi";
            }

            $count_result = pg_fetch_array($count_query);
            $jmldata = $count_result['total'];
            $jmlhalaman = ceil($jmldata / $batas);
            ?>

                <div class='box-header with-border'>
                    <h3 class='box-title'><?php echo $title; ?></h3>
                </div>
                
                <div class='box-body'>
                    <div style="text-align:right">
                        <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a>
                        <a  class="btn bg-blue margin" data-toggle="tooltip" data-placement="top" title="Print Laporan" href="?module=lapdatawarga" target="_blank"><i class="fa fa-print"></i> Print Laporan</a>
                        <?php if ($_SESSION['ses_level'] == 'admkel') { ?>
                            <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=datawarga&act=tambahdatawarga"><i class="fa fa-send"></i> Tambah</a>
                        <?php } ?>
                    </div>

                    <div class="table-responsive">
                        <table id='example1' class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>Tgl.Terdata</th>
                                    <th>No.ID</th>
                                    <th>No.KRT</th>
                                    <th>Nama KRT</th>
                                    <th>No.KK</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
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
                                            <td>{$lk['tgldaftar']}</td>
                                            <td>{$lk['noreg']}</td>
                                            <td>{$lk['nokrt']}</td>
                                            <td>{$lk['namakrt']}</td>
                                            <td>{$lk['nokk']}</td>
                                            <td>{$lk['nik']}</td>
                                            <td>{$lk['nama']}</td>
                                            <td>{$lk['jenkel']}</td>
                                            <td>{$lk['dasawisma']}</td>
                                            <td>{$lk['lingkungan']}</td>
                                            <td>{$lk['kelurahan']}</td>
                                            <td>{$lk['kecamatan']}</td>
                                            <td>
                                                <a href='?module=lihatdatawarga&id={$lk['id']}' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></a>
                                                <a href='?module=editdatawarga&id={$lk['id']}' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>
                                                <a href='?module=hapusdatawarga&id={$lk['id']}' class='btn btn-xs btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>
                                            </td>
                                        </tr>";
                                        $no++;
                                    }
                                } else {
                                    echo "<tr><td colspan='14' class='text-center'>Tidak ada data</td></tr>";
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
                            echo "<li><a href='?module=datawarga&hal=1'>&laquo;</a></li>";
                        }
                        for ($i = $start; $i <= $end; $i++) {
                            $aktif = ($i == $hal) ? "class='active'" : "";
                            echo "<li $aktif><a href='?module=datawarga&hal=$i'>$i</a></li>";
                        }
                        if ($hal < $jmlhalaman) {
                            echo "<li><a href='?module=datawarga&hal=$jmlhalaman'>&raquo;</a></li>";
                        }
                        ?>
                    </ul>
                </div>
      
            <?php
            break;

        case "tambahdatawarga":
            $kdkel = $_SESSION['ses_kodekel'];
            $rand4 = rand(1000, 9999);
            ?>
            <section class="content-header">
                <h1 class="text-center">Form Tambah Data Warga</h1>
            </section>

            <div class="box box-info" style="margin-top: 20px;">
                <form class="form-horizontal" action="<?php echo $aksi; ?>?module=datawarga&act=input" method="POST" id="form-tambah">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No.Reg <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="noreg" value="<?php echo $kdkel . $rand4; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Warga <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">NIK <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nik" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No.KK <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nokk" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jenis Kelamin <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" name="jenkel" required>
                                            <option value="">Pilih</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tempat Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="tempat">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tanggal Lahir</label>
                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" name="tgllahir">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kode KRT <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="nokrt" id="nokrt" readonly required>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal10">
                                            <i class="fa fa-search"></i> Cari
                                        </button>
                                    </div>
                                </div>
                                <?php 
                                    $fields = [
                                        'namakrt' => 'Nama KRT',
                                        'dasawisma' => 'Dasawisma',
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
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="col-md-8 col-md-offset-2">
                            <a href="?module=datawarga" class="btn btn-default"><i class="fa fa-remove"></i> Batal</a>
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
                            <h4 class="modal-title">Pilih Data KRT</h4>
                        </div>
                        <div class="modal-body">
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.KRT</th>
                                        <th>Nama KRT</th>
                                        <th>Dasawisma</th>
                                        <th>Lingkungan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $kodekel_ses = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
                                    $qu = pg_query($koneksi, "SELECT * FROM datakrt WHERE kodekel='$kodekel_ses' AND namakrt != '' ORDER BY nama_lingkungan DESC");
                                    while ($data = pg_fetch_array($qu)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $data['nokrt']; ?></td>
                                            <td><?php echo $data['namakrt']; ?></td>
                                            <td><?php echo $data['nama_dasawisma']; ?></td>
                                            <td><?php echo $data['nama_lingkungan']; ?></td>
                                            <td>
                                                <button class="btn btn-xs btn-primary pilih-krt" 
                                                    data-nokrt="<?php echo $data['nokrt']; ?>" 
                                                    data-namakrt="<?php echo $data['namakrt']; ?>"
                                                    data-dasawisma="<?php echo $data['nama_dasawisma']; ?>"
                                                    data-lingkungan="<?php echo $data['nama_lingkungan']; ?>"
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

            <script>
            $(document).on('click', '.pilih-krt', function() {
                $('#nokrt').val($(this).data('nokrt'));
                $('#namakrt').val($(this).data('namakrt'));
                $('#dasawisma').val($(this).data('dasawisma'));
                $('#lingkungan').val($(this).data('lingkungan'));
                $('#kelurahan').val($(this).data('kelurahan'));
                $('#kecamatan').val($(this).data('kecamatan'));
                $('#myModal10').modal('hide');
            });
            </script>
            <?php
            break;
    }
}
?>
