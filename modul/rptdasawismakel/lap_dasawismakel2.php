<?php
$namakel = $_SESSION[ses_namakel];
?>
<style type="text/css">
  .font {
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 22px;
  }

  .style1 {
    font-size: 24px;
    font-weight: bold;
  }

  .style2 {
    font-size: 24px
  }
</style>
<?php
error_reporting(0);
include "../../config/koneksi.php";
include "../../config/library.php";

$id = $_GET['id'];
$res = pg_query($koneksi, "select * from dasawisma");
$r = pg_fetch_array($res);

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Rpt_DasawismaKel.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<table width="1974" border="0">
  <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
  <tr>
    <td align="center"><span class="style1">LAPORAN DASAWISMA DESA/KELURAHAN <?php echo $namakel; ?></span></td>
  </tr>

  <tr>
    <td align="center"><span class="style1">PKK KABUPATEN BATU BARA </span></td>
  </tr>
  <tr>
    <td width="1968" align="center">
      <table width="430">
        <tr>

          <td align="center">&nbsp;</td>
          <br>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td>
      <table width="1968" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
        <tr>


          <td width="54" align="center">No</td>
          <td width="85" align="center">Kode</td>
          <td width="254" align="center">Nama Dasawisma</td>
          <td width="166" align="center">Lingkungan</td>
          <td width="192" align="center">Kelurahan/Desa</td>
          <td width="192" align="center">Kecamatan</td>
          <td width="217" align="center">Nama Ketua</td>
        </tr>
        <?php


        $no = 1;
        $tim = pg_query($koneksi, "select * from dasawisma where kodekel='$_GET[kdkel]' order by lingkungan ");
        while ($tm = pg_fetch_array($tim)) {
        ?>
          <tr>
            <td><?php echo " $no"; ?></td>
            <td><?php echo " $tm[kode]"; ?></td>
            <td><?php echo " $tm[nama_dasawisma]"; ?></td>
            <td><?php echo " $tm[lingkungan]"; ?></td>
            <td><?php echo " $tm[kelurahan]"; ?></td>
            <td><?php echo " $tm[kecamatan]"; ?></td>
            <td><?php echo " $tm[keterangan]"; ?></td>

          </tr>
        <?php
          $no++;
        }
        ?>
      </table>
    </td>
  </tr>
</table>