<style type="text/css">
  .font {
    font-family: Georgia, "Times New Roman", Times, serif;
    font-size: 22px;
  }

  .style4 {
    font-size: 16px;
    font-weight: bold;
  }

  .style5 {
    font-size: 12px
  }

  .style6 {
    font-size: 10
  }

  .style7 {
    font-size: 10px;
  }
</style>
<?php
error_reporting(0);
include "../../config/koneksi.php";
include "../../config/library.php";

$id = $_GET['id'];
$res = pg_query($koneksi, "select * from sipkunjungan where tahun='$_SESSION[thnaktif]'");
$r = pg_fetch_array($res);

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Rpt_SIPKunjunganTHN.xls");
header("Pragma: no-cache");
header("Expires: 0");

?>
<table width="1179" border="0">
  <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
  <tr>
    <td colspan="3" align="center"><span class="style4">JUMLAH PENGUNJUNG/JUMLAH PETUGAS POSYANDU/JUMLAH BAYI LAHIR/MENINGGAL </span></td>
  </tr>
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>

  <tr>
    <td align="center" class="style5">
      <div align="justify">POSYANDU</div>
    </td>
    <td align="center" class="style5">:</td>
    <td align="center">
      <div align="left"><span class="style5"><?php echo "$_GET[idposyandu]"; ?></span></div>
    </td>
  </tr>
  <tr>
    <td align="center">
      <div align="left" class="style5">DESA/KELURAHAN</div>
    </td>
    <td align="center">:</td>
    <td align="center">
      <div align="justify"><span class="style5"><?php echo "$r[kelurahan]"; ?></span></div>
    </td>
  </tr>
  <tr>
    <td align="center">
      <div align="justify"><span class="style5">KECAMATAN</span></div>
    </td>
    <td align="center">:</td>
    <td align="center">
      <div align="justify"><span class="style5"><?php echo "$r[kecamatan]"; ?></span></div>
    </td>
  </tr>
  <tr>
    <td width="102" align="center">
      <div align="justify" class="style5">TAHUN</div>
    </td>
    <td width="20" align="center">:</td>
    <td width="1442" align="center">
      <div align="justify"><span class="style5"><?php echo "$thn_sekarang"; ?></span></div>
    </td>
  </tr>
  <tr>
    <td colspan="3" align="center">
      <table width="430">
        <tr>

          <td align="center">&nbsp;</td>
          <br>
        </tr>
      </table>
    </td>
  </tr>

  <tr>
    <td colspan="3">
      <table width="1243" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
        <tr>
          <td rowspan="5" align="center" class="style5"><span class="style5">NO</span></td>
          <td rowspan="5" align="center" class="style5"><span class="style5">BULAN</span></td>
          <td colspan="16" align="center" class="style5">JUMLAH PENGUNJUNG </td>
          <td colspan="6" align="center" class="style5">JUMLAH PETUGAS YANG HADIR </td>
          <td colspan="4" align="center" class="style5">JUMLAH BAYI </td>
          <td rowspan="5" align="center" class="style5">KET</td>
        </tr>
        <tr>
          <td colspan="8" align="center" class="style5">BALITA</td>
          <td colspan="2" rowspan="2" align="center" class="style5">WUS</td>
          <td colspan="6" align="center" class="style5">IBU</td>
          <td colspan="2" rowspan="3" align="center" class="style5">KADER</td>
          <td colspan="2" rowspan="3" align="center" class="style5">PLKB</td>
          <td colspan="2" rowspan="3" align="center" class="style5">MEDIS DAN PARA MEDIS </td>
          <td colspan="2" rowspan="3" align="center" class="style5">YANG LAHIR </td>
          <td colspan="2" rowspan="3" align="center" class="style5">MENINGGAL</td>
        </tr>
        <tr>
          <td colspan="4" align="center" class="style5">0-12 BULAN </td>
          <td colspan="4" align="center" class="style5">1-5 TAHUN </td>
          <td colspan="2" align="center" class="style5">PUS</td>
          <td colspan="2" align="center" class="style5">HAMIL</td>
          <td colspan="2" align="center" class="style5">MENYUSUI</td>
        </tr>
        <tr>
          <td colspan="2" align="center" class="style5">BARU</td>
          <td colspan="2" align="center" class="style5">LAMA</td>
          <td colspan="2" align="center" class="style5">BARU</td>
          <td colspan="2" align="center" class="style5">LAMA</td>
          <td rowspan="2" align="center" class="style5">
            <p class="style6">Sasaran</p>
          </td>
          <td rowspan="2" align="center" class="style7">Yang Datang </td>
          <td rowspan="2" align="center" class="style5">
            <p class="style6">Sasaran</p>
          </td>
          <td rowspan="2" align="center" class="style7">Yang Datang </td>
          <td rowspan="2" align="center" class="style5">
            <p class="style6">Sasaran</p>
          </td>
          <td rowspan="2" align="center" class="style7">Yang Datang </td>
          <td rowspan="2" align="center" class="style5">
            <p class="style6">Sasaran</p>
          </td>
          <td rowspan="2" align="center" class="style7">Yang Datang </td>
        </tr>
        <tr>
          <td align="center" class="style5">L</td>
          <td align="center" class="style5">P</td>
          <td align="center" class="style5">L</td>
          <td align="center" class="style5">P</td>
          <td align="center" class="style5">L</td>
          <td align="center" class="style5">P</td>
          <td align="center" class="style5">L</td>
          <td align="center" class="style5">P</td>
          <td align="center" class="style5">L</td>
          <td align="center" class="style5">P</td>
          <td align="center" class="style5">L</td>
          <td align="center" class="style5">P</td>
          <td align="center" class="style5">L</td>
          <td align="center" class="style5">P</td>
          <td align="center" class="style5">L</td>
          <td align="center" class="style5">P</td>
          <td align="center" class="style5">L</td>
          <td align="center" class="style5">P</td>
        </tr>
        <tr>

          <td width="30" align="center" class="style5"><span class="style5">1</span></td>
          <td width="84" align="center" class="style5">2</td>
          <td width="39" align="center" class="style5">3</td>
          <td width="31" align="center" class="style5">4</td>
          <td width="31" align="center" class="style5"><span class="style5">5</span></td>
          <td width="32" align="center" class="style5"><span class="style5">6</span></td>
          <td width="34" align="center" class="style5"><span class="style5">7</span></td>
          <td width="36" align="center" class="style5">8</td>
          <td width="36" align="center" class="style5">9</td>
          <td width="36" align="center" class="style5">10</td>
          <td width="36" align="center" class="style5">11</td>
          <td width="36" align="center" class="style5">12</td>
          <td width="36" align="center" class="style5">13</td>
          <td width="36" align="center" class="style5">14</td>
          <td width="36" align="center" class="style5">15</td>
          <td width="36" align="center" class="style5">16</td>
          <td width="36" align="center" class="style5">17</td>
          <td width="36" align="center" class="style5">18</td>
          <td width="46" align="center" class="style5">19</td>
          <td width="46" align="center" class="style5">20</td>
          <td width="46" align="center" class="style5">21</td>
          <td width="46" align="center" class="style5">22</td>
          <td width="46" align="center" class="style5">23</td>
          <td width="46" align="center" class="style5">24</td>
          <td width="46" align="center" class="style5">25</td>
          <td width="46" align="center" class="style5">26</td>
          <td width="46" align="center" class="style5">27</td>
          <td width="46" align="center" class="style5">28</td>
          <td width="46" align="center" class="style5">29</td>
        </tr>
        <?php


        $no = 1;
        $tim = pg_query($koneksi, "select * from sipkunjungan where tahun='$thn_sekarang' and idposyandu='$_GET[idposyandu]'order by nobln");
        while ($tm = pg_fetch_array($tim)) {
        ?>
          <tr>
            <td class="style5"><?php echo " $no"; ?></td>
            <td class="style5"><?php echo " $tm[bulan]"; ?></td>
            <td class="style5">
              <div align="center"><?php echo " $tm[balitabarul12]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[balitabarup12]"; ?></div>
            </td>
            <td align="right" class="style5">
              <div align="center"><?php echo " $tm[balitalamal12]"; ?></div>
            <td class="style5">
              <div align="center"><?php echo " $tm[balitalamap12]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[balitabarul5]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[balitabarup5]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[balitalamal5]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[balitalamap5]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[wus]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[wusyd]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[pus]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[pusyd]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[hamil]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[hamilyd]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[menyusui]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[menyusuiyd]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[kaderl]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[kaderp]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[plkbl]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[plkbp]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[medisl]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[medisp]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[bayil]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[bayip]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[meninggalbayil]"; ?></div>
            </td>
            <td class="style5">
              <div align="center"><?php echo " $tm[meninggalbayip]"; ?></div>
            </td>
            <td class="style5">&nbsp;</td>
          </tr>
        <?php
          $no++;
        }
        ?>
      </table>
    </td>
  </tr>
</table>