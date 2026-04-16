<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
  include "../config/koneksi.php";
  
  // Tentukan query berdasarkan role
  if ($_SESSION['ses_level'] == 'admin' or $_SESSION['ses_level'] == 'admpkk') {
    $query = "SELECT id, kode, nama_dasawisma, lingkungan, kelurahan, kecamatan, keterangan FROM dasawisma WHERE nama_dasawisma IS NOT NULL AND nama_dasawisma != '' ORDER BY kelurahan, lingkungan DESC";
    $title = "LAPORAN DATA DASAWISMA KABUPATEN BATU BARA";
  } elseif ($_SESSION['ses_level'] == 'admkec') {
    $query = "SELECT id, kode, nama_dasawisma, lingkungan, kelurahan, kecamatan, keterangan FROM dasawisma WHERE kodekec='$_SESSION[ses_kodekec]' AND nama_dasawisma IS NOT NULL AND nama_dasawisma != '' ORDER BY lingkungan DESC";
    $title = "LAPORAN DATA DASAWISMA KECAMATAN " . $_SESSION['ses_namakec'];
  } else {
    $query = "SELECT id, kode, nama_dasawisma, lingkungan, kelurahan, kecamatan, keterangan FROM dasawisma WHERE kodekel='$_SESSION[ses_kodekel]' AND nama_dasawisma IS NOT NULL AND nama_dasawisma != '' ORDER BY lingkungan DESC";
    $title = "LAPORAN DATA DASAWISMA DESA " . $_SESSION['ses_namakel'];
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
        <th>Kode</th>
        <th>Dasawisma</th>
        <th>Lingkungan</th>
        <th>Desa/Kelurahan</th>
        <th>Kecamatan</th>
        <th>Nama Ketua</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      while ($row = pg_fetch_array($result)) {
      ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['kode']; ?></td>
          <td><?php echo $row['nama_dasawisma']; ?></td>
          <td><?php echo $row['lingkungan']; ?></td>
          <td><?php echo $row['kelurahan']; ?></td>
          <td><?php echo $row['kecamatan']; ?></td>
          <td><?php echo $row['keterangan']; ?></td>
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
