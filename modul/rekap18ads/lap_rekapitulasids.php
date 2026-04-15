<?php
$namakel = $_SESSION['ses_namakel'];
?>
<style type="text/css">
  .font {
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 22px;
  }

  .style3 {
    font-size: 16px;
    font-weight: bold;
  }

  .style4 {
    font-size: 12px
  }

  .style4 {
    font-size: 10px
  }
</style>
<?php
error_reporting(0);
include "../../config/koneksi.php";
include "../../config/library.php";

$id = $_GET['id'];
$res = pg_query($koneksi, "select * from ibubayi where kode='$_GET[dsm]'");
$r = pg_fetch_array($res);
$dkode = $r['kode'];

$datakode = $_GET[kode];
$datanama_dasawisma = $_GET[nama_dasawisma];

?>

<?php
$dataibu = pg_query($koneksi, "select * from ibubayi where kode='$dkode' ");
$nok = pg_fetch_array($dataibu);
$datanamad = $nok['dasawisma'];
$datadusun = $nok['lingkungan'];

?>

<table width="1016" border="0">
  <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />

  <tr>
    <td colspan="4" align="center"><span class="style3">REKAPITULASI DATA</span></td>
  </tr>

  <tr>
    <td colspan="4" align="center"><strong>IBU HAMIL, MELAHIRKAN, NIFAS, IBU MENINGGAL*, KELAHIRAN BAYI, BAYI MENINGGAL DAN KEMATIAN BALITA</strong></td>
  </tr>

  <tr>
    <td width="45%" align="right">
      <span class="style4">BULAN</span>
    </td>
    <td width="2%"><span class="style4">:</span></td>
  </tr>

  <tr>
    <td width="137" align="right">
      <span class="style4">TAHUN</span>
    </td>
    <td width="2%"><span class="style4">:</span></td>
    <td width="739" align="center">
      <div align="left"></div>
    </td>
  </tr>

  <tr>
    <td colspan="4" align="center">&nbsp; </td>
  </tr>

  <td colspan="4">
    <table>
      <tr>
        <td>
          <span class="style4">KELOMPOK DASAWISMA</span><br>
        </td>
        <td>
          <span class="style4">:</span><br>
        </td>
        <td>
          <span class="style4"><?php echo $datanamad ?></span><br>
        </td>
      </tr>
      <tr>
        <td>
          <span class="style4">DUSUN/LINGKUNGAN</span><br>
        </td>
        <td>
          <span class="style4">:</span><br>
        </td>
        <td>
          <span class="style4"><?php echo $datadusun ?></span><br>
        </td>
      </tr>
      <tr>

        <td>
          <span class="style4">DESA/KELURAHAN</span><br>
        </td>

        <td>
          <span class="style4">:</span><br>
        </td>
        <td>
          <span class="style4"><?php echo $namakel ?></span><br>
        </td>
      </tr>
    </table>
  </td>

  <!--<style type="text/css">
    .tg {
      border-collapse: collapse;
      border-spacing: 0;
    }

    .tg td {
      border-color: black;
      border-style: solid;
      border-width: 1px;
      font-family: Arial, sans-serif;
      font-size: 14px;
      overflow: hidden;
      padding: 10px 5px;
      word-break: normal;
    }

    .tg th {
      border-color: black;
      border-style: solid;
      border-width: 1px;
      font-family: Arial, sans-serif;
      font-size: 14px;
      font-weight: normal;
      overflow: hidden;
      padding: 10px 5px;
      word-break: normal;
    }

    .tg .style4 {
      border-color: inherit;
      font-family: Arial, Helvetica, sans-serif !important;
      ;
      text-align: center;
      vertical-align: top
    }

    .tg .style4 {
      border-color: inherit;
      font-family: Arial, Helvetica, sans-serif !important;
      ;
      text-align: left;
      vertical-align: top
    }
-->
  <tr>
    <td colspan="4">
      <table table width="1304" border="1" cellpadding="1" cellspacing="0" class="table table-bordered table-striped">
        <tr>
          <td class="style4" align="center" rowspan="3">No</td>
          <td class="style4" align="center" rowspan="3">Nama Ibu<br></td>
          <td class="style4" align="center" rowspan="3">Nama Suami<br></td>
          <td class="style4" align="center" rowspan="3">Status<br>(Hamil/<br>Melahirkan/<br>Nifas)<br></td>
          <td class="style4" align="center" colspan="4">Catatan Kelahiran</td>
          <td class="style4" align="center" colspan="6">Catatan Kematian</td>
        </tr>
        <tr>
          <td class="style4" align="center" rowspan="2">Nama Bayi</td>
          <td class="style4" align="center" rowspan="2">Jenis<br>Kelamin<br></td>
          <td class="style4" align="center" rowspan="2">Tgl<br>Lahir<br></td>
          <td class="style4" align="center" rowspan="2">Akte<br>Kelahiran<br></td>
          <td class="style4" align="center" rowspan="2">Nama Ibu/<br>Balita/Bayi<br></td>
          <td class="style4" align="center" rowspan="2">Status (Ibu/<br>Balita/<br>Bayi<br></td>
          <td class="style4" align="center" rowspan="2">Jenis<br>Kelamin<br></td>
          <td class="style4" align="center" rowspan="2">Tgl Meninggal</td>
          <td class="style4" align="center" rowspan="2">Sebab Meninggal</td>
          <td class="style4" align="center" rowspan="2">Ket</td>
        </tr>
        <tr>
        </tr>
        <tr>
          <td align="center" class="style4">1</td>
          <td align="center" class="style4">2</td>
          <td align="center" class="style4">3</td>
          <td align="center" class="style4">4</td>
          <td align="center" class="style4">5<br></td>
          <td align="center" class="style4">6</td>
          <td align="center" class="style4">7</td>
          <td align="center" class="style4">8</td>
          <td align="center" class="style4">9</td>
          <td align="center" class="style4">10</td>
          <td align="center" class="style4">11</td>
          <td align="center" class="style4">12</td>
          <td align="center" class="style4">13</td>
          <td align="center" class="style4">14</td>
        </tr>
        <?php


        $no = 1;
        $dasa = pg_query($koneksi, "select * from ibubayi where kode='$_GET[dsm]' order by id");
        while ($ds = pg_fetch_array($dasa)) {
        ?>
          <tr>
            <td align="center" class="style4"><?php echo " $no"; ?></td>
            <td class="style4"><?php echo " $ds[namaibu]"; ?></td>
            <td class="style4"><?php echo " $ds[namasuami]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[statusibu]"; ?></td>
            <td align="center"><span class="style4"><?php echo " $ds[namabayi]"; ?></span></td>
            <td align="center" class="style4"><?php echo " $ds[jenkel]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[tglmelahirkan]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[akte]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[namabayik]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[statusibuk]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[jenkelk]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[tglmeninggal]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[sebabmeninggal]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[keterangan]"; ?></td>
          </tr>
        <?php
          $no++;
        }
        ?>

        <!--<?php
            $total = pg_query($koneksi, "select count(statusibu) as totaldata from ibubayi where kode='$_GET[dsm]'");
            $jlh = pg_fetch_array($total);
            $jumlah = $jlh[totaldata];
            ?>
        <?php
        $total = pg_query($koneksi, "select count(namasuami) as totaldata from ibubayi where kodekel='$_SESSION[ses_kodekel]'");
        $jlh = pg_fetch_array($total);
        $jumlah2 = $jlh[totaldata];
        ?>
        <?php
        $total = pg_query($koneksi, "select count(namabayi) as totaldata from ibubayi where kodekel='$_SESSION[ses_kodekel]'");
        $jlh = pg_fetch_array($total);
        $jumlah3 = $jlh[totaldata];
        ?>
        <?php
        $total4 = pg_query($koneksi, "select count(namabayik) as total from ibubayi where kodekel='$_SESSION[ses_kodekel]'");
        $jlh4 = pg_fetch_array($total4);
        $jumlah4 = $jlh4[total];
        ?>

        <tr>
          <td align="center" class="style4">Jumlah</td>
          <td class="style4"><?php echo $jumlah ?></td>
          <td class="style4"><?php echo $jumlah2 ?></td>
          <td class="style4"></td>
          <td class="style4"><?php echo $jumlah3 ?></td>
          <td class="style4"></td>
          <td class="style4"></td>
          <td class="style4"></td>
          <td class="style4"><?php echo $jumlah4 ?></td>
          <td class="style4"></td>
          <td class="style4"></td>
          <td class="style4"></td>
          <td class="style4"></td>
          <td class="style4"></td>
        </tr>-->

      </table>
    </td>
  </tr>
  <td colspan="4">
    <table>
      <tr>
        <td>
          <span class="style4">CATATAN</span><br>
        </td>
      </tr>
      <tr>
        <td>
          <span colspan="6" class="style4">Jumlah Ibu Hamil</span><br>
          <span class="style4">Jumlah Ibu Melahirkan</span><br>
          <span class="style4">Jumlah Ibu Nifas</span><br>
          <span class="style4">Jumlah Ibu Meninggal</span><br>
          <span class="style4">Jumlah Bayi Lahir</span><br>
          <span class="style4">Jumlah Bayi Meninggal</span><br>
          <span class="style4">Jumlah Balita Meninggal</span><br>
        </td>

        <td>
          <span class="style4">:</span><br>
          <span class="style4">:</span><br>
          <span class="style4">:</span><br>
          <span class="style4">:</span><br>
          <span class="style4">:</span><br>
          <span class="style4">:</span><br>
          <span class="style4">:</span><br>
        </td>
        <?php
        $total = pg_query($koneksi, "select count(statusibu) as totaldata from ibubayi where kode='$_GET[dsm]'");
        $jlh = pg_fetch_array($total);
        $jumlah = $jlh[totaldata];
        ?>
        <td>
          <span class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
          <span class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
          <span class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
          <span class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
          <span class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
          <span class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
          <span class="style4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
        </td>
        <td>
          <span class="style4">orang</span><br>
          <span class="style4">orang</span><br>
          <span class="style4">orang</span><br>
          <span class="style4">orang</span><br>
          <span class="style4">orang</span><br>
          <span class="style4">orang</span><br>
          <span class="style4">orang</span><br>
        </td>
      </tr>
    </table>
  </td>

  <!--
  <tr>
    <td colspan="4">
      <table width="1304" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">

        <tr>
          <td rowspan="3" align="center" class="style4">No.</td>
          <td rowspan="3" align="center" class="style4">Nama Kepala Rumah Tangga </td>
          <td rowspan="3" align="center" class="style4">JML KK </td>
          <td colspan="11" align="center" class="style4">JUMLAH ANGGOTA ibubayi </td>
          <td colspan="5" align="center" class="style4">KRITERIA RUMAH </td>
          <td rowspan="3" align="center" class="style4">SUMBER AIR ibubayi </td>
          <td rowspan="3" align="center" class="style4">MAKANAN POKOK </td>
          <td colspan="4" align="center" class="style4">MENGIKUTI KEGIATAN </td>
          <td rowspan="3" align="center" class="style4">KET</td>
        </tr>
        <tr>
          <td colspan="2" align="center" class="style4">TOTAL</td>
          <td colspan="2" align="center" class="style4">BALITA</td>
          <td rowspan="2" align="center" class="style4">PUS</td>
          <td rowspan="2" align="center" class="style4">WUS</td>
          <td rowspan="2" align="center" class="style4">IBU HAMIL </td>
          <td rowspan="2" align="center" class="style4">IBU MENYUSUI </td>
          <td rowspan="2" align="center" class="style4">LANSIA</td>
          <td rowspan="2" align="center" class="style4">3 BUTA </td>
          <td align="center" class="style4">BERKE</td>
          <td rowspan="2" align="center" class="style4">SEHAT / KURANG SEHAT </td>
          <td rowspan="2" align="center" class="style4">MEMILIKI TMP. SAMPAH </td>
          <td rowspan="2" align="center" class="style4">MEMILIKI SPAL </td>
          <td rowspan="2" align="center" class="style4">MEMILIKI JAMBAN </td>
          <td rowspan="2" align="center" class="style4">MENEMPEL STIKER P4K </td>
          <td rowspan="2" align="center" class="style4">UP2K</td>
          <td rowspan="2" align="center" class="style4">PEMANFAATAN TANAH PEKARANGAN </td>
          <td rowspan="2" align="center" class="style4">INDUSTRI RUMAH TANGGA </td>
          <td rowspan="2" align="center" class="style4">KESEHATAN LINGKUNGAN </td>
        </tr>
        <tr>
          <td align="center" class="style4">L</td>
          <td align="center" class="style4">P</td>
          <td align="center" class="style4">L</td>
          <td align="center" class="style4">P</td>
          <td align="center" class="style4">BUTUHAN KHUSUS </td>
        </tr>
        <tr>

          <td width="17" align="center" class="style4"><span class="style4">1</span></td>
          <td width="129" align="center" class="style4">2</td>
          <td width="33" align="center" class="style4">3</td>
          <td width="28" align="center" class="style4">4</td>
          <td width="32" align="center" class="style4">5</td>
          <td width="29" align="center" class="style4"><span class="style4">6</span></td>
          <td width="29" align="center" class="style4"><span class="style4">7</span></td>
          <td width="41" align="center" class="style4"><span class="style4">8</span></td>
          <td width="34" align="center" class="style4"><span class="style4">9</span></td>
          <td width="39" align="center" class="style4"><span class="style4">10</span></td>
          <td width="55" align="center" class="style4"><span class="style4">11</span></td>
          <td width="37" align="center" class="style4">12</td>
          <td width="42" align="center" class="style4">13</td>
          <td width="57" align="center" class="style4">14</td>
          <td width="45" align="center" class="style4">15</td>
          <td width="49" align="center" class="style4">16</td>
          <td width="49" align="center" class="style4">17</td>
          <td width="49" align="center" class="style4">18</td>
          <td width="58" align="center" class="style4">19</td>
          <td width="57" align="center" class="style4">20</td>
          <td width="54" align="center" class="style4">21</td>
          <td width="42" align="center" class="style4">22</td>
          <td width="79" align="center" class="style4">23</td>
          <td width="57" align="center" class="style4">24</td>
          <td width="48" align="center" class="style4">25</td>
          <td width="61" align="center" class="style4">26</td>
        </tr>
        <?php


        $no = 1;
        $dasa = pg_query($koneksi, "select * from ibubayi where kodekel='$_GET[kdkel]' order by lingkungan ");
        while ($ds = pg_fetch_array($dasa)) {
        ?>
          <tr>
            <td align="center" class="style4"><?php echo " $no"; ?></td>
            <td class="style4"><?php echo " $ds[namakk]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[jlhkk]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[anggotakelpr]"; ?></td>
            <td align="center"><span class="style4"><?php echo " $ds[anggotakelw]"; ?></span></td>
            <td align="center" class="style4"><?php echo " $ds[balitapr]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[balitapr]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[pus]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[wus]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[bumil]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[ibumenyusui]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[lansia]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[buta3]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[kbk]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[rumah]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[sampah]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[spal]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[jamban]"; ?></td>
            <td align="center" class="style4"><?php echo " $ds[p4k]"; ?></td>
            <td align="center" class="style4"><span class="style4"><?php echo " $ds[sumberair]"; ?></span></td>
            <td align="center" class="style4"><span class="style4"><?php echo " $ds[makanan]"; ?></span></td>
            <td align="center" class="style4"><span class="style4"><?php echo " $ds[up2k]"; ?></span></td>
            <td align="center" class="style4"><span class="style4"><?php echo " $ds[pekarangan]"; ?></span></td>
            <td align="center" class="style4"><span class="style4"><?php echo " $ds[industri]"; ?></span></td>
            <td align="center" class="style4"><span class="style4"><?php echo " $ds[kes_lingk]"; ?></span></td>
            <td class="style4">&nbsp;</td>
          </tr>
          <tr>
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
  </tr>-->
</table>
<script>
  window.load = print_d();

  function print_d() {
    window.print();

  }
</script>