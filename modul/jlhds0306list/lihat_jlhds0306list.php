<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=jlhds0306list';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">LIHAT DATA DASAWISMA KELURAHAN DATARAN TINGGI KOTA BINJAI</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=jlhds0306list"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from dasawisma where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
						
					<div class="form-group">
					  <label for="kode" class="col-sm-4 control-label">Kode<span class="text-danger"> *</span></label>
                      <div class="col-sm-3">
                        <input type="text" class="validate[required,custom[number]] form-control" readonly name="kode" placeholder="Kode" value="<?php echo $r[kode];?>"  >
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="dasawisma" class="col-sm-4 control-label">Nama dasawisma<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_dasawisma" value="<?php echo $r[nama_dasawisma];?>" placeholder="Nama dasawisma" readonly>
                       </div>
					 </div>
					
					<div class="form-group">	
					  <label for="nama_lingkungan" class="col-sm-4 control-label">Lingkungan <span class="text-danger"> *</span></label>
					  <div class="col-sm-6">
                       <select class='validate[required] form-control' name='nama_lingkungan' readonly>
						<option><?php echo $r[lingkungan];?></option>
						<?php
									$lk = pg_query($koneksi, "SELECT * FROM lingkungan order by kode"); 
										while($p = pg_fetch_array($lk)){
													
											echo"
												<option value=\"$p[nama_lingkungan]\">$p[nama_lingkungan]</option>\n";
											}
										echo"";	
															  
															  
						?>									  								  
						</select>				
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="Keterangan" class="col-sm-4 control-label">Nama Ketua</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="keterangan" value="<?php echo $r[keterangan];?>" placeholder="Nama Ketua"readonly>
                       </div>
					 </div>
					
                  </div><!-- /.box-body -->
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