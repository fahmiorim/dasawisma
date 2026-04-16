<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
	header('location:../../404.php');
} else {
	$aksi = "module/bantuan/aksi_bantuan.php";
	$act = isset($_GET['act']) ? $_GET['act'] : '';


	switch ($_GET['act']) {
			// Tampil List View
		default:
			if (!isset($_GET['id']) || $_GET['id'] == "") {
?>
				<script>
					alert('Data tidak ditemukan');
					window.location.href = 'appmaster.php?module=bantuan';
				</script>
			<?php
			}
			$id = $_GET['id'];

			?>
			<center>
				<h3 class="box-title">LIHAT DATA BANTUAN KELUARGA</h3>
			</center>

			<div class="box box-info">

				<div class="box-header with-border">

				</div><!-- /.box-header -->

				<form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi; ?>?module=bantuan" id="popup-validation">
					<?php
					$res = pg_query($koneksi, "select * from bantuan where id=" . $id);
					$r = pg_fetch_array($res);
					?>
						 <input type="hidden" name="id" value="<?php echo $r['id']; ?>" />
                        <div class="col-md-6">
                            <div class="box-body">
                            <div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo $r[tglentry];?>" readonly>
                      </div>
					</div>
                    <div class="form-group">
					<label for="nokk" class="col-sm-4 control-label">No.KK<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					    <input type="text" class="validate[required,custom[number]] form-control" name="nokk" placeholder="No.KK" value="<?php echo $r[nokk];?>" readonly>
                     </div>
					 </div>

                    <div class="form-group">
					<label for="nik" class="col-sm-4 control-label">NIK<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
					   <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nik" placeholder="NIK" value="<?php echo $r[nik];?>" readonly>
                     </div>
					 </div>
                                <div class="form-group">
                                    <label for="nama" class="col-sm-4 control-label">Nama<span class="text-danger"> *</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" class="validate[required] form-control" name="nama" value="<?php echo $r[nama]; ?>" placeholder="Nama" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="kode" class="col-sm-4 control-label">Kode Dasawisma <span class="text-danger"> *</span></label>
                                    <div class="col-sm-5">
                                        <input type="hidden" id="id" class="form-control" />
                                        <input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="kode" value="<?php echo $r[kode]; ?>" readonly>
									</div>
								</div>

                                <div class="form-group">
                                    <label for="nama_dasawisma" class="col-sm-4 control-label">Nama Dasawisma</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="validate[required] form-control" name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma" value="<?php echo $r[nama_dasawisma]; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="validate[required] form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" value="<?php echo $r[kodekel]; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kelurahan" class="col-sm-4 control-label">Kelurahan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="validate[required] form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $r[kelurahan]; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="validate[required] form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" value="<?php echo $r[kodekec]; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="validate[required] form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $r[kecamatan]; ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lingkungan" class="col-sm-4 control-label">Lingkungan</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" name="lingkungan" id="lingkungan" value="<?php echo $r[lingkungan]; ?>" placeholder="Lingkungan" readonly>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="penerima_bantuan" class="col-sm-4 control-label">Penerima Bantuan<span class="text-danger"> *</span></label>
                                    <div class="col-sm-5">
                                        <select class="validate[required] form-control" name='penerima_bantuan' id='penerima_bantuan' readonly>
                                            <option><?php echo $r[penerima_bantuan]; ?></option>
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </div>
                                </div>
                       </div><!-- /.box-body -->
					</div>

                                <div class="col-md-6">
                  <div class="box-body">

					 <div class="form-group">
                     <label for="jenis_bantuan" class="col-sm-6 control-label">Jenis Bantuan</label>
				    </div>


					 <?php if ($r['dtks']=='DTKS'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">DTKS</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek1" class="chk-box" value="DTKS" checked >
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">DTKS</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek1" class="chk-box" value="DTKS">
                       </div>
					 </div>
					 <?php } ?>

                     <?php if ($r['nondtks']=='Non-DTKS'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">Non-DTKS</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek2" class="chk-box" value="Non-DTKS" checked>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">Non-DTKS</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek2" class="chk-box" value="Non-DTKS">
                       </div>
					 </div>
					 <?php } ?>


                     <?php if ($r['pbnt']=='PBNT'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PBNT</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek3" class="chk-box" value="PBNT" checked>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PBNT</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek3" class="chk-box" value="PBNT">
                       </div>
					 </div>
					 <?php } ?>

                     <?php if ($r['jps_provinsi']=='JPS-Provinsi'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">JPS-Provinsi</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek4" class="chk-box" value="JPS-Provinsi" checked>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">JPS-Provinsi</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek4" class="chk-box" value="JPS-Provinsi">
                       </div>
					 </div>
					 <?php } ?>
                     <?php if ($r['blt_dd']=='BLT-DD'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">BLT-DD</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek5" class="chk-box" value="BLT-DD" checked>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">BLT-DD</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek5" class="chk-box" value="BLT-DD">
                       </div>
					 </div>
					 <?php } ?>
                     <?php if ($r['pkh']=='PKH'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PKH</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek6" class="chk-box" value="PKH" checked>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PKH</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek6" class="chk-box" value="PKH">
                       </div>
					 </div>
					 <?php } ?>
                     <?php if ($r['bst']=='BST'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">BST</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek7" class="chk-box" value="BST" checked>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">BST</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek7" class="chk-box" value="BST">
                       </div>
					 </div>
					 <?php } ?>
                     <?php if ($r['pmks']=='PMKS'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PMKS</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek8" class="chk-box" value="PMKS" checked>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PMKS</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek8" class="chk-box" value="PMKS">
                       </div>
					 </div>
					 <?php } ?>
                     <?php if ($r['pbi']=='PBI'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PBI</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek9" class="chk-box" value="PBI" checked>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">PBI</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek9" class="chk-box" value="PBI">
                       </div>
					 </div>
					 <?php } ?>
                     <?php if ($r['lainnya']=='Lainnya'){ ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">Lainnya</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek10" class="chk-box" value="Lainnya" checked>
                       </div>
					 </div>
					 <?php } else {  ?>
					 <div class="form-group">
					  <label for="" class="col-sm-5 control-label">Lainnya</label>
					  <div class="col-sm-7">
                        <input type="checkbox" name="cek10" class="chk-box" value="Lainnya">
                       </div>
					 </div>
					 <?php } ?>



		</div>
		</div>


						<div class="divider"></div>
					<?php

					?>

					<div class="form-group">

						<div class="col-sm-offset-2 col-sm-5">

							<a class="btn btn-danger" title="Kembali" onclick="self.history.back()"><i class="fa fa-remove"></i>
								Kembali
							</a>
						</div>
					</div>
					</br>


				</form>
			</div>

<?php
	}
}
?>