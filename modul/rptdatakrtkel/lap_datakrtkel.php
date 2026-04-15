<?php
$namakel = $_SESSION[ses_namakel];
?>

<style type="text/css">
	.font {
		font-family: Georgia, "Times New Roman", Times, serif;
		font-size: 22px;
	}

	.style4 {
		font-size: 24px;
		font-weight: bold;
	}
</style>
<?php
error_reporting(0);
include "../../config/koneksi.php";
include "../../config/library.php";

$id = $_GET['id'];
$res = pg_query($koneksi, "select * from datakrt");
$r = pg_fetch_array($res);



?>
<table width="1020" border="0">
	<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
	<tr>
		<td align="center"><span class="style4">LAPORAN DATA KEPALA RUMAH TANGGA KELURAHAN/DESA <?php echo $namakel ?></span></td>
	</tr>

	<tr>
		<td align="center"><span class="style4">PKK KABUPATEN BATU BARA</span></td>
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
			<table width="1121" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
				<tr>

					<td width="66" align="center">No</td>
					<td width="102" align="center">No.KRT</td>
					<td width="219" align="center">Nama Kepala Rumah Tangga</td>
					<td width="177" align="center">Dasawisma</td>
					<td width="165" align="center">Lingkungan</td>
					<td width="222" align="center">Kelurahan/Desa</td>
					<td width="154" align="center">Kecamatan</td>
				</tr>
				<?php


				$no = 1;
				$dasa = pg_query($koneksi, "select * from datakrt where kodekel='$_GET[kdkel]' order by nokrt ");
				while ($ds = pg_fetch_array($dasa)) {
				?>
					<tr>
						<td><?php echo " $no"; ?></td>
						<td><?php echo " $ds[nokrt]"; ?></td>
						<td><?php echo " $ds[namakrt]"; ?></td>
						<td><?php echo " $ds[nama_dasawisma]"; ?></td>
						<td><?php echo " $ds[nama_lingkungan]"; ?></td>
						<td><?php echo " $ds[kelurahan]"; ?></td>
						<td><?php echo " $ds[kecamatan]"; ?></td>
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