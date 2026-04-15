<?php 
$namakec=$_SESSION[ses_namakec];
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
.style2 {font-size: 24px}
</style>
<?php
error_reporting(0);
include "../../config/koneksi.php";
include "../../config/library.php";

						$id = $_GET['id'];
						$res=pg_query($koneksi, "select * from pelatihan");
						$r=pg_fetch_array($res);
						
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Rpt_PelatihanKec.xls");
header("Pragma: no-cache");
header("Expires: 0");		
					
?>
<table width="1974" border="0">
<input type="hidden" name="id" value="<?php echo $r['id'];?>" />
  <tr>
    <td align="center"><span class="style1">LAPORAN DATA PELATIHAN KECAMATAN <?php echo $namakec; ?></span></td>
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
  </table>	</td>
  </tr>
 
  <tr>
    <td><table width="1968" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
      <tr>
	  
					
					<td width="33"  align="center">No</td>
					<td width="64"  align="center">No.Reg</td>
					<td width="66"  align="center">NIK</td>
					<td width="136"  align="center">Nama Warga</td>
					<td width="102"  align="center">Nama Pelatihan</td>
					<td width="87"  align="center">Kriteria</td>
					<td width="73"  align="center">Penyelenggara</td>
					<td width="164"  align="center">Tahun</td>
					<td width="86"  align="center">Kelurahan</td>
					<td width="86"  align="center">Lingkungan</td>
					<td width="109"  align="center">Dasawisma</td>
					<td width="104"  align="center">Keterangan</td>
      </tr>
	  <?php
	  
	 
					$no = 1;
					$tim =pg_query($koneksi, "select * from pelatihan where kodekec='$_GET[kdkec]' order by lingkungan ");
					while ($ds=pg_fetch_array($tim)){       
	  ?>
      <tr>
						<td><?php echo" $no"; ?></td>
                       <td><?php echo" $ds[noreg]"; ?></td>
                        <td><?php echo" $ds[nik]"; ?></td>
						<td><?php echo" $ds[nama]"; ?></td>
						<td><?php echo" $ds[namapelatihan]"; ?></td>
						<td><?php echo" $ds[kriteria]"; ?></td>
						<td><?php echo" $ds[penyelenggara]"; ?></td>
						<td><?php echo" $ds[tahun]"; ?></td>
						<td><?php echo" $ds[kelurahan]"; ?></td>
						<td><?php echo" $ds[lingkungan]"; ?></td>
						<td><?php echo" $ds[dasawisma]"; ?></td>
						<td><?php echo" $ds[keterangan]"; ?></td>
						
						
      </tr>
	  <?php
                $no++;
              }
      ?> 
    </table></td>
  </tr>
</table>
