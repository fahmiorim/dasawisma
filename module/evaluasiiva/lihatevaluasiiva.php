<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/evaluasiiva/aksi_evaluasiiva.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=evaluasiiva';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">LIHAT DATA EVALUASI PELAKSANAAN GERAKAN PENCEGAHAN DAN DETEKSI DINI KANKER</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=evaluasiiva"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from evaluasiiva where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
					
					 <div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo $r[tglentry];?>" readonly >
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="tahun" class="col-sm-4 control-label">Tahun <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[number]] form-control" name="tahun" placeholder="YYYY" value="<?php echo $r[tahun];?>"readonly>
                      </div>
					</div>
			
					<div class="form-group">
					<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <input type="text" class="form-control" name="kodekec" id="kodekec" value="<?php echo $r[kodekec];?>"placeholder="Kode Kecamatan" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="namakec" class="col-sm-4 control-label">Nama Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakec" id="nama_kec" value="<?php echo $r[namakec];?>"placeholder="Nama Kecamatan" readonly>
                       </div>
					</div>
					 
					 <div class="form-group">
					<label for="jlhyankes" class="col-sm-4 control-label">Jumlah Yankes<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhyankes" value="<?php echo $r[jlhyankes];?>"placeholder="Jumlah Yankes"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
                     <label for="jlhtenagaiva" class="col-sm-4 control-label">Jlh.Tenaga Yang Menangani IVA</label>
				    </div>
					 
					  <div class="form-group">
					<label for="jlhdokter" class="col-sm-4 control-label">Dokter<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhdokter" value="<?php echo $r[jlhdokter];?>"placeholder="Dokter"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="jlhbidan" class="col-sm-4 control-label">Bidan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhbidan" value="<?php echo $r[jlhbidan];?>"placeholder="Bidan"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
                     <label for="jlhmenikah" class="col-sm-4 control-label">Jlh.Wanita Yang Sudah Menikah</label>
				    </div>
					 
					  <div class="form-group">
					<label for="jlhmenikah" class="col-sm-4 control-label">Jlh Sudah Menikah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhmenikah" value="<?php echo $r[jlhmenikah];?>"placeholder="Jlh Sudah Menikah"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhreguler" class="col-sm-4 control-label">Anggota BPJS Reguler<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhreguler" value="<?php echo $r[jlhreguler];?>"placeholder="Anggota BPJS Reguler"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="jlhpbi" class="col-sm-4 control-label">Anggota BPJS PBI<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhpbi" value="<?php echo $r[jlhpbi];?>"placeholder="Anggota BPJS PBI"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhjamkesda" class="col-sm-4 control-label">Anggota Jamkesda<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhjamkesda" value="<?php echo $r[jlhjamkesda];?>"placeholder="Anggota Jamkesda"readonly>
                     </div>
					 </div>
					 
					   <div class="form-group">
					<label for="sblmlounching" class="col-sm-4 control-label">Sebelum Lounching<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="sblmlounching" value="<?php echo $r[sblmlounching];?>"placeholder="Sebelum Lounching"readonly>
                     </div>
					 </div>
				
                  </div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-6">
					<div class="box-body">
					
					 <div class="form-group">
                     <label for="periksaiva" class="col-sm-4 control-label">Pemeriksaan IVA</label>
				    </div>
				
				 <div class="form-group">
                     <label for="jumlahtw1" class="col-sm-4 control-label">Triwulan I</label>
				    </div>
				
					 <div class="form-group">
					<label for="jlhtw1" class="col-sm-4 control-label">Jumlah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhtw1" value="<?php echo $r[jlhtw1];?>"placeholder="Jumlah"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhivatw1" class="col-sm-4 control-label">IVA +<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhivatw1" value="<?php echo $r[jlhivatw1];?>"placeholder="IVA +"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
                     <label for="jumlahtw2" class="col-sm-4 control-label">Triwulan II</label>
				    </div>
				
					 <div class="form-group">
					<label for="jlhtw2" class="col-sm-4 control-label">Jumlah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhtw2" value="<?php echo $r[jlhtw2];?>"placeholder="Jumlah"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhivatw2" class="col-sm-4 control-label">IVA +<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhivatw2" value="<?php echo $r[jlhivatw2];?>" placeholder="IVA +"readonly>
                     </div>
					 </div>

					 <div class="form-group">
                     <label for="jumlahtw3" class="col-sm-4 control-label">Triwulan III</label>
				    </div>
				
					 <div class="form-group">
					<label for="jlhtw2" class="col-sm-4 control-label">Jumlah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhtw3" value="<?php echo $r[jlhtw3];?>"placeholder="Jumlah"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhivatw3" class="col-sm-4 control-label">IVA +<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhivatw3" value="<?php echo $r[jlhivatw3];?>"placeholder="IVA +"readonly>
                     </div>
					 </div>
					
					 <div class="form-group">
                     <label for="jumlahtw4" class="col-sm-4 control-label">Triwulan IV</label>
				    </div>
				
					 <div class="form-group">
					<label for="jlhtw4" class="col-sm-4 control-label">Jumlah<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhtw4" value="<?php echo $r[jlhtw4];?>"placeholder="Jumlah"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="jlhivatw4" class="col-sm-4 control-label">IVA +<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhivatw4" value="<?php echo $r[jlhivatw4];?>" placeholder="IVA +"readonly>
                     </div>
					 </div>
					
					  <div class="form-group">
					<label for="jlhrujukrs" class="col-sm-4 control-label">Jlh Yang dirujuk ke RS<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="jlhrujukrs" value="<?php echo $r[jlhrujukrs];?>"placeholder="Jlh Yang dirujuk ke RS"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="userentry" class="col-sm-4 control-label">User Entry</label>
					  <div class="col-sm-7">
					    <input type="text" class="form-control" name="userentry" id="userentry"value="<?php echo $r[userentry];?>"readonly>
                       </div>
					  </div>
					
					<div class="form-group">
					<label for="userentry" class="col-sm-4 control-label">Waktu Entry</label>
                      <div class="col-sm-4">
					   <input type="text" class="form-control" name="waktuentry" placeholder="hh:mm:ss" value="<?php echo $r[waktuentry];?>"readonly>
                      </div>
					</div>
					
					<div class="form-group">
					<label for="level" class="col-sm-4 control-label">Level User</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="level" id="level" value="<?php echo $r[level];?>"readonly>
                       </div>
					</div>
					
					</div><!-- /.box-body -->
				</div>	
				
					<div class="form-group">
					  <div class="col-sm-10">
                        <label for="nb" class="col-sm-8 control-label">NB: Tanda (*) Wajib Diisikan, Jika tidak ada data isikan angka 0</label>
                       </div>
					</div>
		
		<div class="divider"></div>
		<?php
			
		}
		?>
        
		
        <div class="form-group">
               <div class="col-sm-offset-2 col-sm-5">
				
				 <a class="btn btn-danger"  title="Kembali"  onclick="self.history.back()"><i class="fa fa-remove"></i>
                    Kembali
                </a>
            </div>
        </div>
		

    </form>
  </div>

	<?php
    }
}
?>