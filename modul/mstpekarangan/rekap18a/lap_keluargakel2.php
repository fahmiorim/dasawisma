<style type="text/css">
.font {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 22px;
}
.style3 {font-size: 16px; font-weight: bold; }
.style4 {font-size: 12px}
.style5 {font-size: 10px}
</style>
<?php
error_reporting(0);
include "../../config/koneksi.php";
include "../../config/library.php";

						$id = $_GET['id'];
						$res=pg_query($koneksi, "select * from keluarga where kodekel='$_GET[kdkel]'");
						$r=pg_fetch_array($res);
						
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Rpt_CatatanKeluargaKel.xls");
header("Pragma: no-cache");
header("Expires: 0");
					
?>
<table width="1016" border="0">
<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
  <tr>
    <td colspan="4" align="center"><strong>REKAPITULASI</strong></td>
  </tr>
  <tr>
    <td colspan="4" align="center"><span class="style3">CATATAN DATA DAN KEGIATAN WARGA  </span></td>
  </tr>
 
  <tr>
    <td colspan="4" align="center"><strong>PER KELURAHAN </strong></td>
  </tr>
  
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"><div align="left"><span class="style5">DASA WISMA </span></div></td>
    <td align="center"><span class="style5">:</span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"><div align="left"><span class="style5">LINGKUNGAN</span></div></td>
    <td align="center"><span class="style5">:</span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center"><div align="left"><span class="style5">KELURAHAN</span></div></td>
    <td align="center"><span class="style5">:</span></td>
    <td align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="447" align="center">&nbsp;</td>
    <td width="137" align="center"><div align="left"><span class="style5">TAHUN</span></div></td>
    <td width="9" align="center"><span class="style4">:</span></td>
    <td width="739" align="center"><div align="left"></div></td>
  </tr>
  
   
  <tr>
    <td colspan="4" align="center">&nbsp;	</td>
  </tr>
 
  <tr>
    <td colspan="4"><table width="1304" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
      
      <tr>
        <td rowspan="3"  align="center" class="style5">No.</td>
        <td rowspan="3"  align="center" class="style5">Nama Kepala Rumah Tangga </td>
        <td rowspan="3"  align="center" class="style5">JML KK </td>
        <td colspan="11"  align="center" class="style5">JUMLAH ANGGOTA KELUARGA </td>
        <td colspan="5"  align="center" class="style5">KRITERIA RUMAH </td>
        <td rowspan="3"  align="center" class="style5">SUMBER AIR KELUARGA </td>
        <td rowspan="3"  align="center" class="style5">MAKANAN POKOK </td>
        <td colspan="4"  align="center" class="style5">WARGA MENGIKUTI KEGIATAN </td>
        <td rowspan="3"  align="center" class="style5">KET</td>
        </tr>
      <tr>
        <td colspan="2"  align="center" class="style5">TOTAL</td>
        <td colspan="2"  align="center" class="style5">BALITA</td>
        <td rowspan="2"  align="center" class="style5">PUS</td>
        <td rowspan="2"  align="center" class="style5">WUS</td>
        <td rowspan="2"  align="center" class="style5">IBU HAMIL </td>
        <td rowspan="2"  align="center" class="style5">IBU MENYUSUI </td>
        <td rowspan="2"  align="center" class="style5">LANSIA</td>
        <td rowspan="2"  align="center" class="style5">3 BUTA </td>
        <td  align="center" class="style5">BERKE</td>
        <td rowspan="2"  align="center" class="style5">SEHAT / KURANG SEHAT </td>
        <td rowspan="2"  align="center" class="style5">MEMILIKI TMP. SAMPAH </td>
        <td rowspan="2"  align="center" class="style5">MEMILIKI SPAL </td>
        <td rowspan="2"  align="center" class="style5">MEMILIKI JAMBAN </td>
        <td rowspan="2"  align="center" class="style5">MENEMPEL STIKER P4K </td>
        <td rowspan="2"  align="center" class="style5">UP2K</td>
        <td rowspan="2"  align="center" class="style5">PEMANFAATAN TANAH PEKARANGAN </td>
        <td rowspan="2"  align="center" class="style5">INDUSTRI RUMAH TANGGA </td>
        <td rowspan="2"  align="center" class="style5">KERJA BAKTI </td>
        </tr>
      <tr>
        <td  align="center" class="style5">L</td>
        <td  align="center" class="style5">P</td>
        <td  align="center" class="style5">L</td>
        <td  align="center" class="style5">P</td>
        <td  align="center" class="style5">BUTUHAN KHUSUS </td>
        </tr>
      <tr>
	  					
					<td width="17"  align="center" class="style4"><span class="style5">1</span></td>
					<td width="129"  align="center" class="style5">2</td>
					<td width="33"  align="center" class="style5">3</td>
					<td width="28"  align="center" class="style5">4</td>
					<td width="32"  align="center" class="style5">5</td>
					<td width="29"  align="center" class="style4"><span class="style5">6</span></td>
					<td width="29"  align="center" class="style4"><span class="style5">7</span></td>
					<td width="41"  align="center" class="style4"><span class="style5">8</span></td>
					<td width="34"  align="center" class="style4"><span class="style5">9</span></td>
					<td width="39"  align="center" class="style4"><span class="style5">10</span></td>
					<td width="55"  align="center" class="style4"><span class="style5">11</span></td>
					<td width="37"  align="center" class="style5">12</td>
					<td width="42"  align="center" class="style5">13</td>
					<td width="57"  align="center" class="style5">14</td>
					<td width="45"  align="center" class="style5">15</td>
					<td width="49"  align="center" class="style5">16</td>
					<td width="49"  align="center" class="style5">17</td>
					<td width="49"  align="center" class="style5">18</td>
					<td width="58"  align="center" class="style5">19</td>
					<td width="57"  align="center" class="style5">20</td>
					<td width="54"  align="center" class="style5">21</td>
					<td width="42"  align="center" class="style5">22</td>
					<td width="79"  align="center" class="style5">23</td>
					<td width="57"  align="center" class="style5">24</td>
					<td width="48"  align="center" class="style5">25</td>
					<td width="61"  align="center" class="style5">26</td>
		</tr>
	  <?php
	  
	 
					$no = 1;
					$dasa =pg_query($koneksi, "select * from keluarga where kodekel='$_GET[kdkel]' order by lingkungan ");
					while ($ds=pg_fetch_array($dasa)){       
	  ?>
      <tr>
        <td align="center" class="style4"><?php echo" $no"; ?></td>
        <td class="style4"><?php echo" $ds[namakk]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[jlhkk]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[anggotakelpr]"; ?></td>
        <td align="center"><span class="style4"><?php echo" $ds[anggotakelw]"; ?></span></td>
        <td align="center" class="style4"><?php echo" $ds[balitapr]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[balitapr]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[pus]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[wus]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[bumil]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[ibumenyusui]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[lansia]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[buta3]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[kbk]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[rumah]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[sampah]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[spal]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[jamban]"; ?></td>
        <td align="center" class="style4"><?php echo" $ds[p4k]"; ?></td>
        <td align="center" class="style5"><span class="style4"><?php echo" $ds[sumberair]"; ?></span></td>
        <td align="center" class="style5"><span class="style4"><?php echo" $ds[jenis_makanan]"; ?></span></td>
        <td align="center" class="style5"><span class="style4"><?php echo" $ds[up2k]"; ?></span></td>
        <td align="center" class="style5"><span class="style4"><?php echo" $ds[pekarangan]"; ?></span></td>
        <td align="center" class="style5"><span class="style4"><?php echo" $ds[industri]"; ?></span></td>
        <td align="center" class="style5"><span class="style4"><?php echo" $ds[bakti]"; ?></span></td>
        <td class="style5">&nbsp;</td>
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
						<td class="style5">&nbsp;</td>
						<td class="style5">&nbsp;</td>
						<td class="style5">&nbsp;</td>
						<td class="style5">&nbsp;</td>
						<td class="style5">&nbsp;</td>
						<td class="style5">&nbsp;</td>
						<td class="style5">&nbsp;</td>
      </tr>
	  <?php
                $no++;
              }
      ?> 
    </table></td>
  </tr>
</table>
