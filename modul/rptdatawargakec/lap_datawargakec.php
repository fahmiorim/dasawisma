<?php
$namakec = $_SESSION[ses_namakec];
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
$res = pg_query($koneksi, "select * from datawarga");
$r = pg_fetch_array($res);



?>
<table width="1020" border="0">
	<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
	<tr>
		<td align="center"><span class="style1">LAPORAN DATA WARGA KECAMATAN <?php echo $namakec ?></span></td>
	</tr>

	<tr>
		<td align="center"><span class="style1">PKK KABUPATEN BATU BARA</span></td>
	</tr>


	<tr>
		<td width="1014" align="center">
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
			<table width="1358" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
				<tr>

					<td width="33" align="center">No</td>
					<td width="64" align="center">No.Reg</td>
					<td width="66" align="center">NIK</td>
					<td width="91" align="center">No.KK</td>
					<td width="136" align="center">Nama Warga</td>
					<td width="102" align="center">Tempat</td>
					<td width="87" align="center">Tgl.Lahir</td>
					<td width="73" align="center">L/P</td>
					<td width="164" align="center">Alamat</td>
					<td width="88" align="center">Desa/Kelurahan</td>
					<td width="86" align="center">Lingkungan</td>
					<td width="109" align="center">Dasawisma</td>
					<td width="104" align="center">Pekerjaan</td>
					<td width="125" align="center">Kriteria Kader</td>
				</tr>
				<?php


				$no = 1;
				$dasa = pg_query($koneksi, "select * from datawarga where kodekec='$_GET[kdkec]' order by nokk ");
				while ($ds = pg_fetch_array($dasa)) {
				?>
					<tr>
						<td align="center"><?php echo " $no"; ?></td>
						<td align="center"><?php echo " $ds[noreg]"; ?></td>
						<td align="center"><?php echo " $ds[nik]"; ?></td>
						<td align="center"><?php echo " $ds[nokk]"; ?></td>
						<td align="center"><?php echo " $ds[nama]"; ?></td>
						<td align="center"><?php echo " $ds[tempat]"; ?></td>
						<td align="center"><?php echo " $ds[tgllahir]"; ?></td>
						<td align="center"><?php echo " $ds[jenkel]"; ?></td>
						<td align="center"><?php echo " $ds[alamat]"; ?></td>
						<td align="center"><?php echo " $ds[kelurahan]"; ?></td>
						<td align="center"><?php echo " $ds[lingkungan]"; ?></td>
						<td align="center"><?php echo " $ds[dasawisma]"; ?></td>
						<td align="center"><?php echo " $ds[pekerjaan]"; ?></td>
						<td align="center"><?php echo " $ds[kriteria]"; ?></td>
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