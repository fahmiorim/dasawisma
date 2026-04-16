<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/rekapiva/aksi_rekapiva.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=rekapiva';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">LIHAT DATA DETEKSI DINI KANKER LEHER RAHIM DAN KANKER PAYUDARA</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=rekapiva"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from rekapiva where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
					
					<div class="form-group">
					  <label for="tglentry" class="col-sm-4 control-label">Tgl.Entry <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[date]] form-control" id="tglentry" name="tglentry" placeholder="YYYY-MM-DD" value="<?php echo $r[tglentry];?>"readonly >
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="tahun" class="col-sm-4 control-label">Tahun <span class="text-danger"> *</span></label>
                      <div class="col-sm-4">
                        <input type="text" class="validate[required,custom[number]] form-control" name="tahun" placeholder="YYYY" value="<?php echo $r[tahun];?>"readonly>
                      </div>
					</div>
				  
				  <div class="form-group">
					<label for="nobln" class="col-sm-4 control-label">No.Bulan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					  <input type="hidden"  id="id2" class="form-control" />
                        <input type="text" class="validate[required] form-control" name="nobln" id="nobln" placeholder="No.Bulan" value="<?php echo $r[nobln];?>" readonly>
                      </div>
					 </div>
				  
				  <div class="form-group">
					<label for="bulan" class="col-sm-4 control-label">Nama Bulan<span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
					    <input type="text" class="validate[required] form-control" name="bulan" id="bulan" placeholder="Bulan"value="<?php echo $r[bulan];?>" readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <input type="text" class="form-control" name="kodekec" id="kodekec" value="<?php echo $r[kodekec];?>" placeholder="Kode Kecamatan" readonly>
                       </div>
					</div>
					
					<div class="form-group">
					<label for="namakec" class="col-sm-4 control-label">Nama Kecamatan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namakec" id="nama_kec" value="<?php echo $r[namakec];?>" placeholder="Nama Kecamatan" readonly>
                       </div>
					</div>
					 
					 <div class="form-group">
					 <label for="kelumur" class="col-sm-4 control-label">Kelompok Umur<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='kelumur' id='kelumur' disabled>
							<option><?php echo $r[kelumur];?></option>
							<option value="Usia < 30 Tahun">Usia < 30 Tahun</option>
							<option value="Usia 30-39 Tahun">Usia 30-39 Tahun</option>
							<option value="Usia 40-50 Tahun">Usia 40-50 Tahun</option>
							<option value="Usia > 50 Tahun">Usia > 50 Tahun</option>
						</select>
                      </div>
					</div>
					 
					 <div class="form-group">
					<label for="diperiksa" class="col-sm-4 control-label">Diperiksa<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="diperiksa" value="<?php echo $r[diperiksa];?>"placeholder="Diperiksa"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="normal" class="col-sm-4 control-label">Normal<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="normal" value="<?php echo $r[normal];?>" placeholder="Normal"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="tumor" class="col-sm-4 control-label">Tumor/Benjolan<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="tumor" value="<?php echo $r[tumor];?>" placeholder="Tumor/Benjolan"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="curigapayudara" class="col-sm-4 control-label">Curiga Kanker Payudara<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="curigapayudara" value="<?php echo $r[curigapayudara];?>" placeholder="Curiga Kanker Payudara"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="payudara" class="col-sm-4 control-label">Kanker Payudara<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="payudara" value="<?php echo $r[payudara];?>"placeholder="Kanker Payudara"readonly>
                     </div>
					 </div>
					
					
					
                  </div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-6">
					<div class="box-body">
					
					 <div class="form-group">
					<label for="ivanegatif" class="col-sm-4 control-label">IVA Negatif<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="ivanegatif" value="<?php echo $r[ivanegatif];?>" placeholder="IVA Negatif"readonly>
                     </div>
					 </div>
					 
					  <div class="form-group">
					<label for="ivapositif" class="col-sm-4 control-label">IVA Positif<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="ivapositif" value="<?php echo $r[ivapositif];?>" placeholder="IVA Positif"readonly>
                     </div>
					 </div>
					 
					   <div class="form-group">
					<label for="curigaiva" class="col-sm-4 control-label">Curiga Kanker IVA<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="curigaiva" value="<?php echo $r[curigaiva];?>" placeholder="Curiga Kanker IVA"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="kelainan" class="col-sm-4 control-label">Kelainan Lainnya<span class="text-danger"> *</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kelainan" value="<?php echo $r[kelainan];?>" placeholder="Kelainan Lainnya"readonly>
                     </div>
					 </div>
					
					<div class="form-group">
					<label for="rahim" class="col-sm-4 control-label">Kanker Leher Rahim<span class="text-danger">*</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="rahim" value="<?php echo $r[rahim];?>" placeholder="Kanker Leher Rahim"readonly>
                     </div>
					 </div>

					<div class="form-group">
                     <label for="krioterapi" class="col-sm-3 control-label">Kriotrerapi</label>
				    </div>
					
					<div class="form-group">
					<label for="kriosama" class="col-sm-4 control-label">Hari yang sama<span class="text-danger">*</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kriosama" value="<?php echo $r[kriosama];?>" placeholder="Hari yang sama"readonly>
                     </div>
					 </div>
					 
					 <div class="form-group">
					<label for="kriobeda" class="col-sm-4 control-label">Hari yang berbeda<span class="text-danger">*</span></label>
					  <div class="col-sm-3">
					    <input type="text" class="validate[required,custom[number]] form-control" name="kriobeda" value="<?php echo $r[kriobeda];?>" placeholder="Hari yang berbeda"readonly>
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