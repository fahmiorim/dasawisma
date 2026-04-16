<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
  include "../config/koneksi.php";
  
  // Tentukan query berdasarkan role
  if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
    $query = "SELECT * FROM bangunan ORDER BY id DESC";
    $title = "LAPORAN DATA BANGUNAN KABUPATEN BATU BARA";
  } elseif ($_SESSION['ses_level'] == 'admkec') {
    $query = "SELECT * FROM bangunan WHERE kodekec='$_SESSION[ses_kodekec]' ORDER BY id DESC";
    $title = "LAPORAN DATA BANGUNAN KECAMATAN " . $_SESSION['ses_namakec'];
  } else {
    $query = "SELECT * FROM bangunan WHERE kodekel='$_SESSION[ses_kodekel]' ORDER BY id DESC";
    $title = "LAPORAN DATA BANGUNAN DESA " . $_SESSION['ses_namakel'];
  }
  
  $result = pg_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cetak Laporan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      margin: 0;
      padding: 20px;
    }
    .header {
      text-align: center;
      margin-bottom: 20px;
    }
    .header h1 {
      font-size: 16px;
      margin: 0;
    }
    .header h2 {
      font-size: 14px;
      margin: 5px 0;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      border: 1px solid #000;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f0f0f0;
      font-weight: bold;
    }
    .footer {
      text-align: center;
      margin-top: 30px;
    }
    @media print {
      body {
        padding: 0;
      }
    }
  </style>
</head>
<body>
  <div class="header">
    <h1>PEMERINTAH KABUPATEN BATU BARA</h1>
    <h2><?php echo $title; ?></h2>
  </div>
  
  <table>
    <thead>
      <tr>
        <th width="50">No</th>
        <th width="100">Tgl.Entry</th>
        <th>Nama Bangunan</th>
        <th>Pengelola</th>
        <th width="80">Luas (m²)</th>
        <th width="80">Tahun Dibuat</th>
        <th>Kondisi</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      while ($row = pg_fetch_array($result)) {
      ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['tglentry']; ?></td>
          <td><?php echo $row['nama_bangunan']; ?></td>
          <td><?php echo $row['pengelola']; ?></td>
          <td><?php echo $row['luas']; ?></td>
          <td><?php echo $row['tahun_dibuat']; ?></td>
          <td><?php echo $row['kondisi']; ?></td>
          <td><?php echo $row['alamat']; ?></td>
        </tr>
      <?php
        $no++;
      }
      ?>
    </tbody>
  </table>
  
  <div class="footer">
    <p>Dicetak pada: <?php echo date('d/m/Y H:i'); ?></p>
  </div>
  
  <script>
    window.print();
    window.onafterprint = function() {
      window.close();
    };
  </script>
</body>
</html>
<?php
}
?>
