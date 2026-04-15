<style type="text/css">
  .font {
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 22px;
  }

  .style4 {
    font-size: 14px;
    font-weight: bold;
  }
</style>
<?php
error_reporting(0);
include "../../config/koneksi.php";
include "../../config/library.php";

$id = $_GET['id'];
$res = pg_query($koneksi, "select * from koperasi");
$r = pg_fetch_array($res);

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Rpt_KoperasiKel.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<table width="983" border="0">
  <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
  <tr>
    <td align="center"><span class="style4">LAPORAN KOPERASI PKK PER DESA/KELURAHAN </span></td>
  </tr>

  <tr>
    <td align="center"><span class="style4">PKK KABUPATEN BATU BARA</span></td>
  </tr>


  <tr>
    <td width="1027" align="center">
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
      <table width="977" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
        <tr>

          <td width="42" align="center">No</td>
          <td width="141" align="center">Desa/Kelurahan</td>
          <td width="258" align="center">Nama Koperasi </td>
          <td width="196" align="center">Jenis Koperasi </td>
          <td width="143" align="center">Lingkungan</td>
          <td width="183" align="center">Dasawisma</td>
        </tr>
        <?php


        $no = 1;
        $tim = pg_query($koneksi, "select * from koperasi where kodekel='$_GET[kdkel]' order by lingkungan ");
        while ($tm = pg_fetch_array($tim)) {
        ?>
          <tr>
            <td><?php echo " $no"; ?></td>
            <td><?php echo " $tm[kelurahan]"; ?></td>
            <td><?php echo " $tm[namakoperasi]"; ?></td>
            <td><?php echo " $tm[jenis]"; ?></td>
            <td><?php echo " $tm[lingkungan]"; ?></td>
            <td><?php echo " $tm[dasawisma]"; ?></td>
          </tr>
        <?php
          $no++;
        }
        ?>
      </table>
    </td>
  </tr>
</table>