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

					<td width="33" align="center"><span class="style5">No</span></td>
					<td width="104" align="center"><span class="style5">Nama Posyandu </span></td>
					<td width="149" align="center"><span class="style5">Alamat Posyandu </span></td>
					<td width="66" align="center"><span class="style5">No.SK Lurah </span></td>
					<td width="37" align="center"><span class="style5">Jlh Kader </span></td>
					<td width="61" align="center"><span class="style5">Strata Posyandu </span></td>
					<td width="96" align="center"><span class="style5">Nama Kader </span></td>
					<td width="85" align="center"><span class="style5">Dasawisma</span></td>
					<td width="76" align="center"><span class="style5">Lingkungan</span></td>
					<td width="42" align="center"><span class="style5">Balok SKDN </span></td>
					<td width="33" align="center"><span class="style5">Meja</span></td>
					<td width="32" align="center"><span class="style5">Kursi</span></td>
					<td width="56" align="center"><span class="style5">Timbangan Gantung </span></td>
					<td width="56" align="center"><span class="style5">Timbangan Berdiri </span></td>
					<td width="76" align="center"><span class="style5">Pengukur Lingkar Kepala </span></td>
					<td width="78" align="center"><span class="style5">Alat Permainan Edukasi (APE)</span></td>
					<td width="42" align="center"><span class="style5">Lemari</span></td>
					<td width="42" align="center"><span class="style5">Sound System</span></td>
					<td width="40" align="center"><span class="style5">Tikar</span></td>
					<td width="42" align="center"><span class="style5">Pojok ASI</span></td>
					<td width="41" align="center"><span class="style5">PMT</span></td>
					<td width="47" align="center"><span class="style5">Seragam Kader </span></td>
					<td width="63" align="center"><span class="style5">Pengukur Tinggi Badan </span></td>
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
						<td><span class="style5"><?php echo " $ds[balokskdn]"; ?></span></td>
						<td>
							<div align="center"><span class="style5"><?php echo " $ds[meja]"; ?></span></div>
						</td>
						<td>
							<div align="center"><span class="style5"><?php echo " $ds[kursi]"; ?></span></div>
						</td>
						<td><span class="style5"><?php echo " $ds[gantung]"; ?></span></td>
						<td><span class="style5"><?php echo " $ds[berdiri]"; ?></span></td>
						<td class="style5"><span class="style5"><?php echo " $ds[kepala]"; ?></span></td>
						<td class="style5"><?php echo " $ds[ape]"; ?></td>
						<td class="style5"><?php echo " $ds[lemari]"; ?></td>
						<td class="style5"><?php echo " $ds[sound]"; ?></td>
						<td class="style5"><?php echo " $ds[tikar]"; ?></td>
						<td class="style5"><?php echo " $ds[pojokasi]"; ?></td>
						<td class="style5"><?php echo " $ds[pmt]"; ?></td>
						<td class="style5"><?php echo " $ds[seragam]"; ?></td>
						<td class="style5"><?php echo " $ds[tinggibadan]"; ?></td>
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