<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
  include "../config/koneksi.php";
  
  // Tentukan query berdasarkan role
  if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
    $query = "SELECT * FROM posyandu ORDER BY id DESC";
    $title = "LAPORAN DATA POSYANDU KABUPATEN BATU BARA";
  } elseif ($_SESSION['ses_level'] == 'admkec') {
    $query = "SELECT * FROM posyandu WHERE kodekec='$_SESSION[ses_kodekec]' ORDER BY id DESC";
    $title = "LAPORAN DATA POSYANDU KECAMATAN " . $_SESSION['ses_namakec'];
  } else {
    $query = "SELECT * FROM posyandu WHERE kodekel='$_SESSION[ses_kodekel]' ORDER BY id DESC";
    $title = "LAPORAN DATA POSYANDU DESA " . $_SESSION['ses_namakel'];
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
        <th>ID Posyandu</th>
        <th>Nama Posyandu</th>
        <th>Alamat</th>
        <th width="80">Jml Bayi</th>
        <th width="80">Jml Balita</th>
        <th width="80">Jml Ibu Hamil</th>
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
          <td><?php echo $row['id_posyandu']; ?></td>
          <td><?php echo $row['nama_posyandu']; ?></td>
          <td><?php echo $row['alamat']; ?></td>
          <td><?php echo $row['jml_bayi']; ?></td>
          <td><?php echo $row['jml_balita']; ?></td>
          <td><?php echo $row['jml_ibu_hamil']; ?></td>
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
