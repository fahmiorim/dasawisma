<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
  include "../config/koneksi.php";
  
  // Tentukan query berdasarkan role
  if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
    $query = "SELECT * FROM keluarga ORDER BY id DESC";
    $title = "LAPORAN DATA KELUARGA KABUPATEN BATU BARA";
  } elseif ($_SESSION['ses_level'] == 'admkec') {
    $query = "SELECT * FROM keluarga WHERE kodekec='$_SESSION[ses_kodekec]' ORDER BY id DESC";
    $title = "LAPORAN DATA KELUARGA KECAMATAN " . $_SESSION['ses_namakec'];
  } else {
    $query = "SELECT * FROM keluarga WHERE kodekel='$_SESSION[ses_kodekel]' ORDER BY id DESC";
    $title = "LAPORAN DATA KELUARGA DESA " . $_SESSION['ses_namakel'];
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
      font-size: 10px;
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
        <th width="30">No</th>
        <th width="70">No.KK</th>
        <th width="70">No.KRT</th>
        <th>Kepala Rumah Tangga</th>
        <th width="60">Jml Anggota</th>
        <th>Dasawisma</th>
        <th>Lingkungan</th>
        <th>Kelurahan</th>
        <th>Kecamatan</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      while ($row = pg_fetch_array($result)) {
      ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['nokk']; ?></td>
          <td><?php echo $row['nokrt']; ?></td>
          <td><?php echo $row['namakrt']; ?></td>
          <td><?php echo $row['jmlanggota']; ?></td>
          <td><?php echo $row['dasawisma']; ?></td>
          <td><?php echo $row['lingkungan']; ?></td>
          <td><?php echo $row['kelurahan']; ?></td>
          <td><?php echo $row['kecamatan']; ?></td>
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
