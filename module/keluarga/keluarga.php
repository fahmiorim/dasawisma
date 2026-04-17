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
            // Filter parameters
            $filter_kecamatan = isset($_GET['filter_kecamatan']) ? $_GET['filter_kecamatan'] : '';
            $filter_kelurahan = isset($_GET['filter_kelurahan']) ? $_GET['filter_kelurahan'] : '';
            $filter_lingkungan = isset($_GET['filter_lingkungan']) ? $_GET['filter_lingkungan'] : '';
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            
            // Build WHERE clause
            $where_conditions = [];
            $where_conditions[] = "namakk IS NOT NULL AND namakk != ''";
            
            if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk' || $_SESSION['ses_level'] == 'admkec') {
                if (!empty($filter_kecamatan)) {
                    $where_conditions[] = "kecamatan = '" . pg_escape_string($koneksi, $filter_kecamatan) . "'";
                }
                if (!empty($filter_kelurahan)) {
                    $where_conditions[] = "kelurahan = '" . pg_escape_string($koneksi, $filter_kelurahan) . "'";
                }
                if (!empty($filter_lingkungan)) {
                    $where_conditions[] = "lingkungan = '" . pg_escape_string($koneksi, $filter_lingkungan) . "'";
                }
                if (!empty($search)) {
                    $where_conditions[] = "(namakk ILIKE '%" . pg_escape_string($koneksi, $search) . "%' OR nokk ILIKE '%" . pg_escape_string($koneksi, $search) . "%' OR dasawisma ILIKE '%" . pg_escape_string($koneksi, $search) . "%')";
                }
                $title = "DATA KELUARGA DASAWISMA PKK KABUPATEN BATU BARA";
            } else {
                $kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
                $where_conditions[] = "kodekel='$kodekel'";
                if (!empty($filter_lingkungan)) {
                    $where_conditions[] = "lingkungan = '" . pg_escape_string($koneksi, $filter_lingkungan) . "'";
                }
                if (!empty($search)) {
                    $where_conditions[] = "(namakk ILIKE '%" . pg_escape_string($koneksi, $search) . "%' OR nokk ILIKE '%" . pg_escape_string($koneksi, $search) . "%' OR dasawisma ILIKE '%" . pg_escape_string($koneksi, $search) . "%')";
                }
                $title = "DATA KELUARGA DASAWISMA PKK DESA " . $_SESSION['ses_namakel'];
            }
            
            $where_clause = implode(' AND ', $where_conditions);
            
            // --- LOGIKA PAGINATION & QUERY ---
            $batas = 10;
            $hal = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
            $posisi = ($hal - 1) * $batas;

            $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM keluarga WHERE $where_clause");
            $query_data = "SELECT * FROM keluarga WHERE $where_clause ORDER BY kelurahan, lingkungan DESC LIMIT $batas OFFSET $posisi";

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
                        <a  class="btn bg-blue margin" data-toggle="tooltip" data-placement="top" title="Print Laporan" href="?module=lapkeluarga" target="_blank"><i class="fa fa-print"></i> Print Laporan</a>
                        <?php if ($_SESSION['ses_level'] == 'admkel') { ?>
                        <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=keluarga&act=tambahkeluarga"><i class="fa fa-send"></i> Tambah</a>
                        <?php } ?>
                        <a  class="btn bg-orange margin" data-toggle="tooltip" data-placement="top" title="Reset Filter" href="?module=keluarga"><i class="fa fa-refresh"></i> Reset</a>
                    </div>
                    
                    <!-- Filter Section -->
                    <div class="row" style="margin-bottom: 15px; padding: 15px; background: #f9f9f9; border-radius: 5px;">
                      <?php if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk' || $_SESSION['ses_level'] == 'admkec') { ?>
                      <div class="col-md-3">
                        <label>Filter Kecamatan:</label>
                        <select name="filter_kecamatan" class="form-control" onchange="this.form.submit()">
                          <option value="">Semua Kecamatan</option>
                          <?php
                          $kec_query = pg_query($koneksi, "SELECT DISTINCT kecamatan FROM keluarga WHERE kecamatan IS NOT NULL ORDER BY kecamatan");
                          while ($kec = pg_fetch_array($kec_query)) {
                            $selected = ($filter_kecamatan == $kec['kecamatan']) ? 'selected' : '';
                            echo "<option value='{$kec['kecamatan']}' $selected>{$kec['kecamatan']}</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <?php } ?>
                      <?php if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk' || $_SESSION['ses_level'] == 'admkec') { ?>
                      <div class="col-md-3">
                        <label>Filter Kelurahan:</label>
                        <select name="filter_kelurahan" class="form-control" id="filter_kelurahan" onchange="this.form.submit()">
                          <option value="">Semua Kelurahan</option>
                          <?php
                          $kel_query = pg_query($koneksi, "SELECT DISTINCT kelurahan, kecamatan FROM keluarga WHERE kelurahan IS NOT NULL ORDER BY kelurahan");
                          while ($kel = pg_fetch_array($kel_query)) {
                            $selected = ($filter_kelurahan == $kel['kelurahan']) ? 'selected' : '';
                            echo "<option value='{$kel['kelurahan']}' data-kecamatan='{$kel['kecamatan']}' $selected>{$kel['kelurahan']}</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <?php } ?>
                      <div class="col-md-3">
                        <label>Filter Lingkungan:</label>
                        <select name="filter_lingkungan" class="form-control" onchange="this.form.submit()">
                          <option value="">Semua Lingkungan</option>
                          <?php
                          $lingkungan_query = pg_query($koneksi, "SELECT DISTINCT lingkungan FROM keluarga WHERE lingkungan IS NOT NULL ORDER BY lingkungan");
                          while ($ling = pg_fetch_array($lingkungan_query)) {
                            $selected = ($filter_lingkungan == $ling['lingkungan']) ? 'selected' : '';
                            echo "<option value='{$ling['lingkungan']}' $selected>{$ling['lingkungan']}</option>";
                          }
                          ?>
                        </select>
                      </div>
                      <div class="col-md-3">
                        <label>Cari:</label>
                        <input type="text" name="search" class="form-control" placeholder="Cari nama KK, no KK, atau dasawisma..." value="<?php echo htmlspecialchars($search); ?>">
                        <button type="submit" class="btn btn-primary btn-sm" style="margin-top: 5px;"><i class="fa fa-search"></i> Cari</button>
                      </div>
                    </div>
                    <input type="hidden" name="module" value="keluarga">
                    
                    <script>
                    // Cascading filter: Kelurahan based on Kecamatan
                    document.addEventListener('DOMContentLoaded', function() {
                        var kecamatanSelect = document.querySelector('select[name="filter_kecamatan"]');
                        var kelurahanSelect = document.querySelector('select[name="filter_kelurahan"]');
                        
                        if (kecamatanSelect && kelurahanSelect) {
                            // Store all kelurahan options
                            var allKelurahanOptions = Array.from(kelurahanSelect.options).slice(1); // Skip first "Semua Kelurahan" option
                            
                            function filterKelurahan() {
                                var selectedKecamatan = kecamatanSelect.value;
                                
                                // Clear kelurahan options except first
                                kelurahanSelect.innerHTML = '<option value="">Semua Kelurahan</option>';
                                
                                if (selectedKecamatan) {
                                    // Filter kelurahan options based on selected kecamatan
                                    allKelurahanOptions.forEach(function(option) {
                                        if (option.getAttribute('data-kecamatan') === selectedKecamatan) {
                                            kelurahanSelect.appendChild(option.cloneNode(true));
                                        }
                                    });
                                } else {
                                    // Restore all kelurahan options
                                    allKelurahanOptions.forEach(function(option) {
                                        kelurahanSelect.appendChild(option.cloneNode(true));
                                    });
                                }
                            }
                            
                            kecamatanSelect.addEventListener('change', function() {
                                filterKelurahan();
                                // Clear kelurahan selection when kecamatan changes
                                kelurahanSelect.value = '';
                            });
                            
                            // Initial filtering based on selected kecamatan
                            filterKelurahan();
                        }
                    });
                    </script>

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
                            $prev = $hal - 1;
                            echo "<li><a href=\"?module=keluarga&hal=1&filter_kecamatan=$filter_kecamatan&filter_kelurahan=$filter_kelurahan&filter_lingkungan=$filter_lingkungan&search=$search\">&laquo;</a></li>";
                            echo "<li><a href=\"?module=keluarga&hal=$prev&filter_kecamatan=$filter_kecamatan&filter_kelurahan=$filter_kelurahan&filter_lingkungan=$filter_lingkungan&search=$search\">&lsaquo;</a></li>";
                        }
                        for ($i = $start; $i <= $end; $i++) {
                            $aktif = ($i == $hal) ? "class=\"active\"" : "";
                            echo "<li $aktif><a href=\"?module=keluarga&hal=$i&filter_kecamatan=$filter_kecamatan&filter_kelurahan=$filter_kelurahan&filter_lingkungan=$filter_lingkungan&search=$search\">$i</a></li>";
                        }
                        if ($hal < $jmlhalaman) {
                            $next = $hal + 1;
                            echo "<li><a href=\"?module=keluarga&hal=$next&filter_kecamatan=$filter_kecamatan&filter_kelurahan=$filter_kelurahan&filter_lingkungan=$filter_lingkungan&search=$search\">&rsaquo;</a></li>";
                            echo "<li><a href=\"?module=keluarga&hal=$jmlhalaman&filter_kecamatan=$filter_kecamatan&filter_kelurahan=$filter_kelurahan&filter_lingkungan=$filter_lingkungan&search=$search\">&raquo;</a></li>";
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
