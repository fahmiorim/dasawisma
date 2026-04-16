<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
  include "../config/koneksi.php";
  
  if(!isset($_GET['id']) || $_GET['id'] == ""){
    ?>
    <script>
         alert('Data tidak ditemukan');
       window.location.href = 'appmaster.php?module=sipkegiatan';
    </script>
    <?php
  }
  $id = $_GET['id'];

  // Fetch data with role-based filtering
  if ($_SESSION['ses_level'] == 'admin' || $_SESSION['ses_level'] == 'admpkk' || $_SESSION['ses_level'] == 'admkec') {
    $query = "SELECT * FROM sipkegiatan WHERE id=".$id;
  } else {
    $kodekel = pg_escape_string($koneksi, $_SESSION['ses_kodekel']);
    $query = "SELECT * FROM sipkegiatan WHERE id=".$id." AND kodekel='$kodekel'";
  }
  
  $res = pg_query($koneksi, $query);
  $r = pg_fetch_array($res);
  
  if (!$r) {
    ?>
    <script>
         alert('Data tidak ditemukan atau Anda tidak memiliki akses');
       window.location.href = 'appmaster.php?module=sipkegiatan';
    </script>
    <?php
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Laporan Hasil Kegiatan Posyandu</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 20px;
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .header h2 {
      margin: 0;
    }
    .info-section {
      margin-bottom: 20px;
    }
    .info-section table {
      width: 100%;
      border-collapse: collapse;
    }
    .info-section table td {
      padding: 5px;
      border: 1px solid #ddd;
    }
    .info-section table td:first-child {
      font-weight: bold;
      width: 30%;
      background-color: #f9f9f9;
    }
    .section-title {
      font-weight: bold;
      background-color: #e0e0e0;
      padding: 8px;
      margin-top: 15px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
    }
    .data-table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    .data-table th, .data-table td {
      border: 1px solid #ddd;
      padding: 5px;
      text-align: center;
    }
    .data-table th {
      background-color: #f0f0f0;
    }
    .data-table td:first-child {
      text-align: left;
      background-color: #f9f9f9;
      font-weight: bold;
    }
    .footer {
      margin-top: 30px;
      text-align: right;
    }
    @media print {
      body {
        margin: 0;
      }
      .no-print {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>LAPORAN HASIL KEGIATAN POSYANDU</h2>
    <p><?php echo date('d/m/Y H:i'); ?></p>
  </div>

  <div class="info-section">
    <table>
      <tr>
        <td>Tgl.Entry</td>
        <td><?php echo $r['tglentry']; ?></td>
      </tr>
      <tr>
        <td>Tahun</td>
        <td><?php echo $r['tahun']; ?></td>
      </tr>
      <tr>
        <td>No.Bulan</td>
        <td><?php echo $r['nobln']; ?></td>
      </tr>
      <tr>
        <td>Nama Bulan</td>
        <td><?php echo $r['bulan']; ?></td>
      </tr>
      <tr>
        <td>Nama Posyandu</td>
        <td><?php echo $r['namaposyandu']; ?></td>
      </tr>
      <tr>
        <td>Dasawisma</td>
        <td><?php echo $r['dasawisma']; ?></td>
      </tr>
      <tr>
        <td>Lingkungan</td>
        <td><?php echo $r['lingkungan']; ?></td>
      </tr>
      <tr>
        <td>Kelurahan</td>
        <td><?php echo $r['kelurahan']; ?></td>
      </tr>
      <tr>
        <td>Kecamatan</td>
        <td><?php echo $r['kecamatan']; ?></td>
      </tr>
    </table>
  </div>

  <div class="section-title">DATA IBU DAN KB</div>
  <table class="data-table">
    <tr>
      <td>Jlh Ibu Hamil</td>
      <td><?php echo $r['bumil']; ?></td>
    </tr>
    <tr>
      <td>Bumil diperiksa</td>
      <td><?php echo $r['diperiksa']; ?></td>
    </tr>
    <tr>
      <td>Fe Tab</td>
      <td><?php echo $r['fetab']; ?></td>
    </tr>
    <tr>
      <td>Ibu Menyusui</td>
      <td><?php echo $r['menyusui']; ?></td>
    </tr>
  </table>

  <div class="section-title">JUMLAH AKSEPTOR KB</div>
  <table class="data-table">
    <tr>
      <td></td>
      <td>Peserta Baru (PB)</td>
      <td>Peserta Aktif (PA)</td>
    </tr>
    <tr>
      <td>Kondom</td>
      <td><?php echo $r['kondompb']; ?></td>
      <td><?php echo $r['kondom']; ?></td>
    </tr>
    <tr>
      <td>Pil</td>
      <td><?php echo $r['pilpb']; ?></td>
      <td><?php echo $r['pil']; ?></td>
    </tr>
    <tr>
      <td>Implant</td>
      <td><?php echo $r['implantpb']; ?></td>
      <td><?php echo $r['implant']; ?></td>
    </tr>
    <tr>
      <td>MOP</td>
      <td><?php echo $r['moppb']; ?></td>
      <td><?php echo $r['mop']; ?></td>
    </tr>
    <tr>
      <td>MOW</td>
      <td><?php echo $r['mowpb']; ?></td>
      <td><?php echo $r['mow']; ?></td>
    </tr>
    <tr>
      <td>IUD</td>
      <td><?php echo $r['iudpb']; ?></td>
      <td><?php echo $r['iud']; ?></td>
    </tr>
    <tr>
      <td>Suntik</td>
      <td><?php echo $r['suntikpb']; ?></td>
      <td><?php echo $r['suntik']; ?></td>
    </tr>
    <tr>
      <td>Lain-Lain</td>
      <td><?php echo $r['lainpb']; ?></td>
      <td><?php echo $r['lain']; ?></td>
    </tr>
  </table>

  <div class="section-title">PENIMBANGAN BALITA</div>
  <table class="data-table">
    <tr>
      <td></td>
      <td>L</td>
      <td>P</td>
    </tr>
    <tr>
      <td>Jlh. Balita (S)</td>
      <td><?php echo $r['balitasl']; ?></td>
      <td><?php echo $r['balitasp']; ?></td>
    </tr>
    <tr>
      <td>Jlh. Balita KMS(K)</td>
      <td><?php echo $r['balitakmsl']; ?></td>
      <td><?php echo $r['balitakmsp']; ?></td>
    </tr>
    <tr>
      <td>Jlh. Balita Ditimbang(D)</td>
      <td><?php echo $r['balitadl']; ?></td>
      <td><?php echo $r['balitadp']; ?></td>
    </tr>
    <tr>
      <td>Jlh. Balita Yang Naik(N)</td>
      <td><?php echo $r['balitanl']; ?></td>
      <td><?php echo $r['balitanp']; ?></td>
    </tr>
    <tr>
      <td>Jlh. Balita Mendapat Vit.A</td>
      <td><?php echo $r['balitavital']; ?></td>
      <td><?php echo $r['balitavitap']; ?></td>
    </tr>
    <tr>
      <td>Jlh. Balita Mendapat PMT</td>
      <td><?php echo $r['pmtl']; ?></td>
      <td><?php echo $r['pmtp']; ?></td>
    </tr>
  </table>

  <div class="section-title">IMUNISASI TT IBU HAMIL</div>
  <table class="data-table">
    <tr>
      <td>I</td>
      <td><?php echo $r['bumiltt1']; ?></td>
    </tr>
    <tr>
      <td>II</td>
      <td><?php echo $r['bumiltt2']; ?></td>
    </tr>
  </table>

  <div class="section-title">IMUNISASI BALITA</div>
  <table class="data-table">
    <tr>
      <td></td>
      <td>L</td>
      <td>P</td>
    </tr>
    <tr>
      <td>BCG</td>
      <td><?php echo $r['bcgl']; ?></td>
      <td><?php echo $r['bcgp']; ?></td>
    </tr>
    <tr>
      <td>DPT I</td>
      <td><?php echo $r['dpt1l']; ?></td>
      <td><?php echo $r['dpt1p']; ?></td>
    </tr>
    <tr>
      <td>DPT II</td>
      <td><?php echo $r['dpt2l']; ?></td>
      <td><?php echo $r['dpt2p']; ?></td>
    </tr>
    <tr>
      <td>DPT III</td>
      <td><?php echo $r['dpt3l']; ?></td>
      <td><?php echo $r['dpt3p']; ?></td>
    </tr>
    <tr>
      <td>POLIO I</td>
      <td><?php echo $r['polio1l']; ?></td>
      <td><?php echo $r['polio1p']; ?></td>
    </tr>
    <tr>
      <td>POLIO II</td>
      <td><?php echo $r['polio2l']; ?></td>
      <td><?php echo $r['polio2p']; ?></td>
    </tr>
    <tr>
      <td>POLIO III</td>
      <td><?php echo $r['polio3l']; ?></td>
      <td><?php echo $r['polio3p']; ?></td>
    </tr>
    <tr>
      <td>POLIO IV</td>
      <td><?php echo $r['polio4l']; ?></td>
      <td><?php echo $r['polio4p']; ?></td>
    </tr>
    <tr>
      <td>CAMPAK</td>
      <td><?php echo $r['campakl']; ?></td>
      <td><?php echo $r['campakp']; ?></td>
    </tr>
    <tr>
      <td>HEPATITIS B I</td>
      <td><?php echo $r['hepatitisbl1']; ?></td>
      <td><?php echo $r['hepatitisbp1']; ?></td>
    </tr>
    <tr>
      <td>HEPATITIS B II</td>
      <td><?php echo $r['hepatitisbl2']; ?></td>
      <td><?php echo $r['hepatitisbp2']; ?></td>
    </tr>
    <tr>
      <td>HEPATITIS B III</td>
      <td><?php echo $r['hepatitisbl3']; ?></td>
      <td><?php echo $r['hepatitisbp3']; ?></td>
    </tr>
  </table>

  <div class="section-title">BALITA MENDERITA DIARE</div>
  <table class="data-table">
    <tr>
      <td>L</td>
      <td><?php echo $r['diarel']; ?></td>
    </tr>
    <tr>
      <td>P</td>
      <td><?php echo $r['diarep']; ?></td>
    </tr>
  </table>

  <div class="section-title">BALITA MENDAPAT ORALIT</div>
  <table class="data-table">
    <tr>
      <td>L</td>
      <td><?php echo $r['oralitl']; ?></td>
    </tr>
    <tr>
      <td>P</td>
      <td><?php echo $r['oralitp']; ?></td>
    </tr>
  </table>

  <div class="footer">
    <p>Dicetak oleh: <?php echo $_SESSION['ses_user']; ?></p>
    <p>Waktu: <?php echo date('d/m/Y H:i:s'); ?></p>
  </div>

  <div class="no-print" style="margin-top: 20px; text-align: center;">
    <button onclick="window.print()" class="btn btn-primary">Cetak</button>
    <button onclick="window.close()" class="btn btn-danger">Tutup</button>
  </div>
</body>
</html>
<?php
}
?>
