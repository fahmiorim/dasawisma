<?php

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
$res = pg_query($koneksi, "select * from pelatihan");
$r = pg_fetch_array($res);



?>
<table width="1020" border="0">
	<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
	<tr>
		<td align="center"><span class="style1">LAPORAN DATA PELATIHAN SE-KABUPATEN BATU BARA</span></td>
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

					<td width="39" align="center">No</td>
					<td width="75" align="center">No.Reg</td>
					<td width="108" align="center">NIK</td>
					<td width="130" align="center">Nama Warga</td>
					<td width="161" align="center">Nama Pelatihan</td>
					<td width="111" align="center">Kriteria</td>
					<td width="168" align="center">Penyelenggara</td>
					<td width="77" align="center">Tahun</td>
					<td width="101" align="center">Desa/Kelurahan</td>
					<td width="101" align="center">Lingkungan</td>
					<td width="118" align="center">Dasawisma</td>
					<td width="140" align="center">Keterangan</td>

				</tr>
				<?php


				$no = 1;
				$dasa = pg_query($koneksi, "select * from pelatihan order by lingkungan ");
				while ($ds = pg_fetch_array($dasa)) {
				?>
					<tr>
						<td><?php echo " $no"; ?></td>
						<td><?php echo " $ds[noreg]"; ?></td>
						<td><?php echo " $ds[nik]"; ?></td>
						<td><?php echo " $ds[nama]"; ?></td>
						<td><?php echo " $ds[namapelatihan]"; ?></td>
						<td><?php echo " $ds[kriteria]"; ?></td>
						<td><?php echo " $ds[penyelenggara]"; ?></td>
						<td><?php echo " $ds[tahun]"; ?></td>
						<td><?php echo " $ds[kelurahan]"; ?></td>
						<td><?php echo " $ds[lingkungan]"; ?></td>
						<td><?php echo " $ds[dasawisma]"; ?></td>
						<td><?php echo " $ds[keterangan]"; ?></td>
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