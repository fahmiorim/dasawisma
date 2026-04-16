<?php
// 1. Pengecekan Session
if (empty($_SESSION['ses_user']) || empty($_SESSION['ses_password'])) {
    header('location:404.php');
    exit();
} else {
    include "../config/koneksi.php";
    $aksi = "module/keluarga/aksi_keluarga.php";
    $act = isset($_GET['act']) ? $_GET['act'] : '';

    switch ($act) {
        default:
            // --- LOGIKA PAGINATION & QUERY ---
            $batas = 10;
            $hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
            $posisi = ($hal - 1) * $batas;

            if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk' || $_SESSION['ses_level'] == 'admkec') {
                $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM keluarga WHERE namakk IS NOT NULL AND namakk != ''");
                $title = "DATA KELUARGA DASAWISMA PKK KABUPATEN BATU BARA";
                $query_data = "SELECT * FROM keluarga WHERE namakk IS NOT NULL AND namakk != '' ORDER BY kelurahan, lingkungan DESC LIMIT $batas OFFSET $posisi";
            } else {
                $kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
                $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM keluarga WHERE kodekel='$kodekel' AND namakk IS NOT NULL AND namakk != ''");
                $title = "DATA KELUARGA DASAWISMA PKK DESA " . $_SESSION['ses_namakel'];
                $query_data = "SELECT * FROM keluarga WHERE kodekel='$kodekel' AND namakk IS NOT NULL AND namakk != '' ORDER BY lingkungan DESC LIMIT $batas OFFSET $posisi";
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
                        <a class="btn bg-purple" href="?module=keluarga&act=tambahkeluarga"><i class="fa fa-plus"></i> Tambah</a>
                    </div>

                    <div class="table-responsive">
                        <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th width="50">No</th>
                                    <th>No.KK</th>
                                    <th>No.KRT</th>
                                    <th>Kepala Rumah Tangga</th>
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
                                            <td>{$lk['nokk']}</td>
                                            <td>{$lk['nokrt']}</td>
                                            <td>{$lk['namakk']}</td>
                                            <td>{$lk['dasawisma']}</td>
                                            <td>{$lk['lingkungan']}</td>
                                            <td>{$lk['kelurahan']}</td>
                                            <td>{$lk['kecamatan']}</td>
                                            <td>
                                                <a href='?module=lihatkeluarga&id={$lk['id']}' class='btn btn-xs btn-info'><i class='fa fa-eye'></i></a>
                                                <a href='?module=editkeluarga&id={$lk['id']}' class='btn btn-xs btn-warning'><i class='fa fa-edit'></i></a>
                                                <a href='?module=hapuskeluarga&id={$lk['id']}' class='btn btn-xs btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?')\"><i class='fa fa-trash'></i></a>
                                            </td>
                                        </tr>";
                                        $no++;
                                    }
                                } else {
                                    echo "<tr><td colspan='9' class='text-center'>Tidak ada data</td></tr>";
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
                            echo "<li><a href='?module=keluarga&hal=1'>&laquo;</a></li>";
                        }
                        for ($i = $start; $i <= $end; $i++) {
                            $aktif = ($i == $hal) ? "class='active'" : "";
                            echo "<li $aktif><a href='?module=keluarga&hal=$i'>$i</a></li>";
                        }
                        if ($hal < $jmlhalaman) {
                            echo "<li><a href='?module=keluarga&hal=$jmlhalaman'>&raquo;</a></li>";
                        }
                        ?>
                    </ul>
                </div>
            <?php
            break;

        case "tambahkeluarga":
            ?>
            <section class="content-header">
                <h1 class="text-center">Form Tambah Data Keluarga Dasawisma</h1>
            </section>

            <div class="box box-info" style="margin-top: 20px;">
                <form class="form-horizontal" action="<?php echo $aksi; ?>?module=keluarga&act=input" name="keluarga" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Tgl.Entry <span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tglentry" value="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No.ID <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="noreg" id="noreg" readonly required>
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#myModal9">
                                            <i class="fa fa-search"></i> Cari
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No.KRT<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nokrt" id="nokrt" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Kepala Rumah Tangga<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="namakk" id="nama" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No.KK<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nokk" id="nokk" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Lingkungan<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="lingkungan" id="lingkungan" readonly required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Dasawisma<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="dasawisma" id="dasawisma" readonly required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">I. Data Anggota Keluarga</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Laki-Laki<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="anggotakelpr" id="anggotakelpr" placeholder="Laki-Laki" required oninput="calcAnggota()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Perempuan<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="anggotakelw" id="anggotakelw" placeholder="Perempuan" required oninput="calcAnggota()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Total<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="anggotakel" id="anggotakel" placeholder="Total" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jumlah KK<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="jlhkk" id="jlhkk" placeholder="Jumlah KK" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-5 control-label">Jumlah Balita</label>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Laki-Laki<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="balitapr" id="balitapr" placeholder="Laki-Laki" required oninput="calcBalita()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Perempuan<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="balitaw" id="balitaw" placeholder="Perempuan" required oninput="calcBalita()">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jumlah Balita<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="balita" id="balita" placeholder="Jumlah Balita" readonly>
                                    </div>
                                </div>
                                
                                <?php
                                $fields = ['pus', 'wus', 'bumil', 'lansia', 'buta3', 'ibum', 'kbk'];
                                foreach ($fields as $field) {
                                    $label = strtoupper($field);
                                    echo "<div class='form-group'>
                                            <label class='col-sm-4 control-label'>$label<span class='text-danger'>*</span></label>
                                            <div class='col-sm-3'>
                                                <input type='number' class='form-control' name='$field' id='$field' placeholder='$label' required>
                                            </div>
                                          </div>";
                                }
                                ?>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Makanan Pokok<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="makanan" required>
                                            <option value="">Pilih</option>
                                            <option value="Beras">Beras</option>
                                            <option value="Non Beras">Non Beras</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Mempunyai Jamban<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="jamban" required>
                                            <option value="">Pilih</option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jumlah Jamban<span class="text-danger">*</span></label>
                                    <div class="col-sm-3">
                                        <input type="number" class="form-control" name="jlhjamban" id="jlhjamban" placeholder="Jumlah Jamban" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Sumber Air<span class="text-danger">*</span></label>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="sumberair" required>
                                            <option value="">Pilih</option>
                                            <option value="PDAM">PDAM</option>
                                            <option value="Sumur">Sumur</option>
                                            <option value="Sungai">Sungai</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <?php
                                $binary_fields = ['sampah' => 'Tempat Sampah', 'spal' => 'SPAL', 'p4k' => 'Stiker P4K', 'rumah' => 'Kriteria Rumah', 'up2k' => 'Aktifitas UP2K', 'kes_lingk' => 'Kesehatan Lingkungan', 'pekarangan' => 'Pemanfaatan Pekarangan', 'industri' => 'Industri Rumah Tangga', 'bakti' => 'Kerja Bakti'];
                                foreach ($binary_fields as $name => $label) {
                                    if ($name == 'rumah') {
                                        echo "<div class='form-group'>
                                                <label class='col-sm-4 control-label'>$label<span class='text-danger'>*</span></label>
                                                <div class='col-sm-4'>
                                                    <select class='form-control' name='$name' required>
                                                        <option value=''>Pilih</option>
                                                        <option value='Sehat'>Sehat</option>
                                                        <option value='Kurang Sehat'>Kurang Sehat</option>
                                                        <option value='Layak Huni'>Layak Huni</option>
                                                        <option value='Tidak Layak Huni'>Tidak Layak Huni</option>
                                                    </select>
                                                </div>
                                              </div>";
                                    } else {
                                        echo "<div class='form-group'>
                                                <label class='col-sm-4 control-label'>$label<span class='text-danger'>*</span></label>
                                                <div class='col-sm-4'>
                                                    <select class='form-control' name='$name' required>
                                                        <option value=''>Pilih</option>
                                                        <option value='Ya'>Ya</option>
                                                        <option value='Tidak'>Tidak</option>
                                                    </select>
                                                </div>
                                              </div>";
                                    }
                                }
                                ?>
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Jenis Usaha UP2K<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="jenis_usaha" required>
                                            <option value="">Pilih</option>
                                            <?php
                                            $lk = pg_query($koneksi, "SELECT * FROM mstkomoditi order by jenis_komoditi");
                                            while ($p = pg_fetch_array($lk)) {
                                                echo "<option value=\"{$p['nama_komoditi']}\">{$p['nama_komoditi']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Komoditi Pekarangan<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="komoditi_lahan" required>
                                            <option value="">Pilih</option>
                                            <?php
                                            $lk = pg_query($koneksi, "SELECT * FROM mstkategori order by id");
                                            while ($p = pg_fetch_array($lk)) {
                                                echo "<option value=\"{$p['kategori']}\">{$p['kategori']}</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Komoditi Industri<span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="komoditi_industri" required>
                                            <option value="">Pilih</option>
                                            <option value="Pangan">Pangan</option>
                                            <option value="Sandang">Sandang</option>
                                            <option value="Jasa">Jasa</option>
                                            <option value="Konveksi">Konveksi</option>
                                            <option value="Tidak Ada">Tidak Ada</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Nama Komoditi<span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="nama_komoditi" placeholder="Nama Komoditi" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">User Entry</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="userentry" value="<?php echo $_SESSION['ses_nama']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Level User Entry</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="level" value="<?php echo $_SESSION['ses_level']; ?>" readonly>
                                    </div>
                                </div>
                                
                                <input type="hidden" name="kodekel" value="<?php echo $_SESSION['ses_kodekel']; ?>">
                                <input type="hidden" name="namakel" value="<?php echo $_SESSION['ses_namakel']; ?>">
                                <input type="hidden" name="kodekec" value="<?php echo $_SESSION['ses_kodekec']; ?>">
                                <input type="hidden" name="namakec" value="<?php echo $_SESSION['ses_namakec']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="?module=keluarga" class="btn btn-default"><i class="fa fa-remove"></i> Batal</a>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan Data</button>
                    </div>
                </form>
            </div>

            <div class="modal fade" id="myModal9" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Pilih Data Kepala Rumah Tangga</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No.ID</th>
                                        <th>No.KRT</th>
                                        <th>No.KK</th>
                                        <th>Nama</th>
                                        <th>Lingkungan</th>
                                        <th>Dasawisma</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $kodekel_ses = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
                                    $qu = pg_query($koneksi, "SELECT * FROM datawarga WHERE kodekel='$kodekel_ses' AND stskel='Kepala Rumah Tangga' AND nama != '' ORDER BY nama");
                                    while ($data = pg_fetch_array($qu)) {
                                    ?>
                                        <tr>
                                            <td><?php echo $data['noreg']; ?></td>
                                            <td><?php echo $data['nokrt']; ?></td>
                                            <td><?php echo $data['nokk']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['lingkungan']; ?></td>
                                            <td><?php echo $data['dasawisma']; ?></td>
                                            <td>
                                                <button class="btn btn-xs btn-primary pilih-krt" 
                                                    data-noreg="<?php echo $data['noreg']; ?>" 
                                                    data-nokrt="<?php echo $data['nokrt']; ?>"
                                                    data-nama="<?php echo $data['nama']; ?>"
                                                    data-nokk="<?php echo $data['nokk']; ?>"
                                                    data-lingkungan="<?php echo $data['lingkungan']; ?>"
                                                    data-dasawisma="<?php echo $data['dasawisma']; ?>">
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
            function calcAnggota() {
                const pr = parseInt(document.getElementById('anggotakelpr').value) || 0;
                const w = parseInt(document.getElementById('anggotakelw').value) || 0;
                document.getElementById('anggotakel').value = pr + w;
            }
            function calcBalita() {
                const pr = parseInt(document.getElementById('balitapr').value) || 0;
                const w = parseInt(document.getElementById('balitaw').value) || 0;
                document.getElementById('balita').value = pr + w;
            }
            $(document).on('click', '.pilih-krt', function() {
                $('#noreg').val($(this).data('noreg'));
                $('#nokrt').val($(this).data('nokrt'));
                $('#nama').val($(this).data('nama'));
                $('#nokk').val($(this).data('nokk'));
                $('#lingkungan').val($(this).data('lingkungan'));
                $('#dasawisma').val($(this).data('dasawisma'));
                $('#myModal9').modal('hide');
            });
            </script>
            <?php
            break;
    }
}
?>
