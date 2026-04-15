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
$res = pg_query($koneksi, "select * from posyandu");
$r = pg_fetch_array($res);



?>
<table width="983" border="0">
	<input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
	<tr>
		<td align="center"><span class="style1">LAPORAN POSYANDU KECAMATAN <?php echo $namakec; ?></span></td>
	</tr>

	<tr>
		<td align="center"><span class="style1">PKK KABUPATEN BATU BARA</span></td>
	</tr>


	<tr>
		<td width="1027" align="center">
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
			<table width="977" border="1" cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
				<tr>

					<td width="49" align="center">No</td>
					<td width="80" align="center">Id.Posyandu</td>
					<td width="120" align="center">Nama Posyandu</td>
					<td width="148" align="center">Alamat</td>
					<td width="65" align="center">Jlh.Kader</td>
					<td width="85" align="center">Jenis</td>
					<td width="106" align="center">Dasawisma</td>
					<td width="106" align="center">Lingkungan</td>
					<td width="102" align="center">Desa/Kelurahan</td>
					<td width="110" align="center">Kecamatan</td>
				</tr>
				<?php


				$no = 1;
				$tim = pg_query($koneksi, "select * from posyandu where kodekec='$_GET[kdkec]' order by lingkungan ");
				while ($tm = pg_fetch_array($tim)) {
				?>
					<tr>
						<td><?php echo " $no"; ?></td>
						<td><?php echo " $tm[idposyandu]"; ?></td>
						<td><?php echo " $tm[namaposyandu]"; ?></td>
						<td><?php echo " $tm[alamatposyandu]"; ?></td>
						<td>
							<div align="center"><?php echo " $tm[jlhkader]"; ?></div>
						</td>
						<td><?php echo " $tm[jenis]"; ?></td>
						<td><?php echo " $tm[dasawisma]"; ?></td>
						<td><?php echo " $tm[lingkungan]"; ?></td>
						<td><?php echo " $tm[kelurahan]"; ?></td>
						<td><?php echo " $tm[kecamatan]"; ?></td>
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