<style type="text/css">
	.font {
		font-family: Georgia, "Times New Roman", Times, serif;
		font-size: 22px;
	}

	.style4 {
		font-size: 14px;
		font-weight: bold;
	}

	.style5 {
		font-size: 12px
	}
</style>
<?php
error_reporting(0);
include "../../config/koneksi.php";
include "../../config/library.php";

$id = $_GET['id'];
$res = pg_query($koneksi, "select * from posyandu");
$r = pg_fetch_array($res);



?>
<table width="1257" border="0">
	<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
	<tr>
		<td align="center"><span class="style4">LAPORAN DATA PROFIL POSYANDU PER DESA/KELURAHAN </span></td>
	</tr>

	<tr>
		<td align="center"><span class="style4">PKK KABUPATEN BATU BARA</span></td>
	</tr>


	<tr>
		<td width="1251" align="center">
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
			<table width="1445" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
				<tr>
					<td width="46" rowspan="2" align="center"><span class="style5">No</span></td>
					<td width="179" rowspan="2" align="center"><span class="style5">Nama Posyandu </span></td>
					<td width="205" rowspan="2" align="center"><span class="style5">Alamat Posyandu </span></td>
					<td width="134" rowspan="2" align="center"><span class="style5">No.SK Lurah </span></td>
					<td width="37" rowspan="2" align="center"><span class="style5">Jlh Kader </span></td>
					<td width="115" rowspan="2" align="center"><span class="style5">Strata Posyandu </span></td>
					<td width="135" rowspan="2" align="center"><span class="style5">Nama Kader </span></td>
					<td width="125" rowspan="2" align="center"><span class="style5">Dasawisma</span></td>
					<td width="121" rowspan="2" align="center"><span class="style5">Lingkungan</span></td>
					<td height="22" colspan="6" align="center"><span class="style5">Terintegrasi Dengan </span></td>
				</tr>
				<tr>

					<td width="38" align="center"><span class="style5">PAUD </span></td>
					<td width="42" align="center"><span class="style5">BKB</span></td>
					<td width="58" align="center"><span class="style5">Sudut Baca</span></td>
					<td width="45" align="center"><span class="style5">Toga</span></td>
					<td width="67" align="center"><span class="style5">Posyandu Remaja</span></td>
					<td width="66" align="center"><span class="style5">Posyandu Lansia </span></td>
				</tr>
				<?php


				$no = 1;
				$dasa = pg_query($koneksi, "select * from posyandu where kodekel='$_GET[kdkel]' order by lingkungan ");
				while ($ds = pg_fetch_array($dasa)) {
				?>
					<tr>
						<td><span class="style5"><?php echo " $no"; ?></span></td>
						<td><span class="style5"><?php echo " $ds[namaposyandu]"; ?></span></td>
						<td><span class="style5"><?php echo " $ds[alamatposyandu]"; ?></span></td>
						<td><span class="style5"><?php echo " $ds[nosklurah]"; ?></span></td>
						<td>
							<div align="center"><span class="style5"><?php echo " $ds[jlhkader]"; ?></span></div>
						</td>
						<td><span class="style5"><?php echo " $ds[jenis]"; ?></span></td>
						<td><span class="style5"><?php echo " $ds[namakader]"; ?></span></td>
						<td><span class="style5"><?php echo " $ds[dasawisma]"; ?></span></td>
						<td><span class="style5"><?php echo " $ds[lingkungan]"; ?></span></td>
						<td>
							<div align="center"><span class="style5"><?php echo " $ds[stspaud]"; ?></span></div>
						</td>
						<td>
							<div align="center"><span class="style5"><?php echo " $ds[stskbkb]"; ?></span></div>
						</td>
						<td>
							<div align="center"><span class="style5"><?php echo " $ds[stsbaca]"; ?></span></div>
						</td>
						<td>
							<div align="center"><span class="style5"><?php echo " $ds[ststoga]"; ?></span></div>
						</td>
						<td>
							<div align="center"><span class="style5"><?php echo " $ds[stsremaja]"; ?></span></div>
						</td>
						<td class="style5">
							<div align="center"><span class="style5"><?php echo " $ds[stslansia]"; ?></span></div>
						</td>
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