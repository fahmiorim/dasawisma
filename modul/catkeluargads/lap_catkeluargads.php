<style type="text/css">
  .font {
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 22px;
  }

  .style3 {
    font-size: 14px;
    font-weight: bold;
  }

  .style4 {
    font-size: 12px
  }

  .style5 {
    font-size: 10px
  }
</style>
<?php
error_reporting(0);
include "../../config/koneksi.php";
include "../../config/library.php";

$id = $_GET['id'];
$res = pg_query($koneksi, "select * from datawarga where nokrt='$_GET[nokrt]'");
$r = pg_fetch_array($res);
$dtkrt = $r['nokrt'];

$datakode = $_GET[kode];
$datanama_dasawisma = $_GET[nama_dasawisma];

?>

<?php
$datakrt = pg_query($koneksi, "select * from datakrt where nokrt='$dtkrt' ");
$nok = pg_fetch_array($datakrt);

?>
<table width="1768" border="0">
  <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />

  <tr>
    <td colspan="7" align="center">
      <div align="right" class="style3">Lampiran III - 15 </div>
    </td>
  </tr>
  <tr>
    <td colspan="7" align="center"><strong>CATATAN KELUARGA </strong></td>
  </tr>
  <tr>
    <td colspan="7" align="center"><strong>KELOMPOK DASAWISMA </strong></td>
  </tr>
  <tr>
    <td align="center">
      <div align="justify"><span class="style4">NO.KEPALA RUMAH TANGGA </span></div>
    </td>
    <td align="center">:</td>
    <td width="345" align="center">
      <div align="justify"><span class="style4"><?php echo "$_GET[nokrt]"; ?></span></div>
    </td>
    <td width="889" align="center">&nbsp;</td>
    <td align="center">
      <div align="justify"><span class="style5">KRITERIA RUMAH </span></div>
    </td>
    <td align="center"><span class="style4">:</span></td>
    <td align="center" class="style5">
      <div align="justify">Rumah Sehat / Kurang Sehat </div>
    </td>
  </tr>
  <tr>
    <td align="center">
      <div align="justify"><span class="style4">CATATAN KELUARGA DARI </span></div>
    </td>
    <td align="center"><span class="style4">:</span></td>
    <td align="center">
      <div align="justify" class="style4"><span class="style4"><?php echo " $nok[namakrt]"; ?></span></div>
    </td>
    <td align="center">&nbsp;</td>
    <td align="center">
      <div align="justify"><span class="style5">JAMBAN KELUARGA </span></div>
    </td>
    <td align="center">:</td>
    <td align="center">
      <div align="justify"><span class="style5">Ada / Tidak Jumlah : .... buah </span></div>
    </td>
  </tr>
  <tr>
    <td align="center">
      <div align="justify"><span class="style4">ANGGOTA KELOMPOK DASAWISMA </span></div>
    </td>
    <td align="center"><span class="style4">:</span></td>
    <td align="center">
      <div align="justify"><span class="style4"><?php echo " $nok[nama_dasawisma]"; ?></span></div>
    </td>
    <td align="center">&nbsp;</td>
    <td align="center">
      <div align="justify"><span class="style5">SUMBER AIR </span></div>
    </td>
    <td align="center">:</td>
    <td align="center">
      <div align="justify"><span class="style5">PDAM/ Sumur/ Lainnya</span></div>
    </td>
  </tr>
  <tr>
    <td width="227" align="center">
      <div align="justify" class="style4">TAHUN</div>
    </td>
    <td width="5" align="center"><span class="style4">:</span></td>
    <td align="center">
      <div align="justify"><span class="style4"><?php echo "$thn_sekarang"; ?></span></div>
    </td>
    <td align="center">&nbsp;</td>
    <td width="121" align="center">
      <div align="justify"><span class="style5">TEMPAT SAMPAH </span></div>
    </td>
    <td width="9" align="center">:</td>
    <td width="142" align="center">
      <div align="justify"><span class="style5">Ada/ Tidak </span></div>
    </td>
  </tr>
  <tr>
    <td colspan="7" align="center">&nbsp;</td>
  </tr>


  <tr>
    <td colspan="7">
      <table width="1762" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
        <tr>
          <td width="38" rowspan="2" align="center"><span class="style4">No</span></td>
          <td width="141" rowspan="2" align="center"><span class="style4">NAMA ANGGOTA KELUARGA </span></td>
          <td width="100" rowspan="2" align="center"><span class="style4">STATUS PERKAWINAN </span></td>
          <td width="64" rowspan="2" align="center"><span class="style4">L/P</span></td>
          <td width="102" rowspan="2" align="center"><span class="style4">TEMPAT LAHIR </span></td>
          <td width="94" rowspan="2" align="center"><span class="style4">TGL/BL/THN LAHIR </span></td>
          <td width="78" rowspan="2" align="center" class="style4"><span class="style4">AGAMA</span><span class="style4"></span></td>
          <td width="95" rowspan="2" align="center" class="style4"><span class="style4"></span><span class="style4">PENDIDIKAN</span></td>
          <td width="140" rowspan="2" align="center" class="style4">PEKERJAAN</td>
          <td width="103" rowspan="2" align="center" class="style4">BERKEBUTUHAN KHUSUS </td>
          <td colspan="8" align="center" class="style4"><span class="style4">KEGIATAN PKK YANG DIIKUTI</span></td>
          <td rowspan="2" align="center"><span class="style4">KET</span></td>
        </tr>
        <tr>
          <td width="103" align="center" class="style5">PENGHAYATAN DAN PENGAMALAN PANCASILA </td>
          <td align="center"><span class="style5">GOTONG ROYONG </span></td>
          <td align="center"><span class="style5">PENDIDIKAN DAN KETERAMPILAN </span></td>
          <td align="center"><span class="style5">PENGEMBANGAN KEHIDUPAN BERKOPERASI </span></td>
          <td align="center"><span class="style5">PANGAN</span></td>
          <td align="center" class="style5">SANDANG</td>
          <td align="center" class="style5">KESEHATAN</td>
          <td align="center" class="style5">PERENCANAAN SEHAT </td>
        </tr>
        <tr>
          <td width="38" align="center"><span class="style4">1</span></td>

          <td width="141" align="center"><span class="style4">2</span></td>
          <td width="100" align="center"><span class="style4">3</span></td>
          <td width="64" align="center"><span class="style4">4</span></td>
          <td width="102" align="center"><span class="style4">5</span></td>
          <td width="94" align="center"><span class="style4">6</span></td>
          <td width="78" align="center" class="style4"><span class="style4">7</span></td>
          <td width="95" align="center" class="style4"><span class="style4">8</span></td>
          <td width="140" align="center" class="style4">9</td>
          <td width="103" align="center" class="style4">10</td>
          <td width="103" align="center" class="style4">11</td>
          <td width="63" align="center"><span class="style4">12</span></td>
          <td width="97" align="center"><span class="style4">13</span></td>
          <td width="95" align="center"><span class="style4">14</span></td>
          <td width="73" align="center"><span class="style4">15</span></td>
          <td width="85" align="center" class="style4">16</td>
          <td width="83" align="center" class="style4">17</td>
          <td width="87" align="center" class="style4">18</td>
          <td width="81" align="center"><span class="style4">19</span></td>
        </tr>
        <?php


        $no = 1;
        $tim = pg_query($koneksi, "select * from datawarga where nokrt='$_GET[nokrt]' order by id ");
        while ($tm = pg_fetch_array($tim)) {
        ?>

          <tr>
            <td>
              <div align="center"><span class="style4"><?php echo " $no"; ?></span></div>
            </td>
            <td><span class="style4"><?php echo " $tm[nama]"; ?></span></td>
            <td><span class="style4"><?php echo " $tm[stskawin]"; ?></span></td>
            <td><span class="style4"><?php echo " $tm[jenkel]"; ?></span></td>
            <td><span class="style4"><?php echo " $tm[tempat]"; ?></span></td>
            <td><span class="style4"><?php echo " $tm[tgllahir]"; ?></span></td>
            <td class="style4"><span class="style4"><?php echo " $tm[agama]"; ?></span></td>
            <td class="style4"><span class="style4"><?php echo " $tm[pendidikan]"; ?></span></td>
            <td class="style4"><?php echo " $tm[pekerjaan]"; ?></td>
            <td class="style4">&nbsp;</td>
            <td class="style4">&nbsp;</td>
            <td class="style4">&nbsp;</td>
            <td class="style4">&nbsp;</td>
            <td class="style4">&nbsp;</td>
            <td class="style4">&nbsp;</td>
            <td class="style4">&nbsp;</td>
            <td class="style4">&nbsp;</td>
            <td class="style4">&nbsp;</td>
            <td class="style4">&nbsp;</td>
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