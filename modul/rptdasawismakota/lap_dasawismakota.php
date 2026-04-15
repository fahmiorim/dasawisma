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



?>
<table width="983" border="0">
  <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
  <tr>
    <td align="center"><span class="style1">LAPORAN DASAWISMA</span></td>
  </tr>

  <tr>
    <td align="center"><span class="style1">PKK SE-KABUPATEN BATU BARA</span></td>
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

          <td width="49" align="center">No</td>
          <td width="85" align="center">Kode</td>
          <td width="192" align="center">Desa/Kelurahan</td>
          <td width="166" align="center">Lingkungan</td>
          <td width="254" align="center">Nama Dasawisma</td>
          <td width="217" align="center">Nama Ketua</td>
        </tr>
        <?php


        $no = 1;
        $tim = pg_query($koneksi, "select * from dasawisma");
        while ($tm = pg_fetch_array($tim)) {
        ?>
          <tr>
            <td><?php echo " $no"; ?></td>
            <td><?php echo " $tm[kode]"; ?></td>
            <td><?php echo " $tm[kelurahan]"; ?></td>
            <td><?php echo " $tm[lingkungan]"; ?></td>
            <td><?php echo " $tm[nama_dasawisma]"; ?></td>
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
<script>
  window.load = print_d();

  function print_d() {
    window.print();

  }
</script>