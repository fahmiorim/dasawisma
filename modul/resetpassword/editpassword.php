<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../index.php');
  
}
else{
	$aksi = "modul/resetpassword/aksi_reset.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi User Belum Di pilih');
       window.location.href = 'appmaster.php?module=resetpassword';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">Ganti Password</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=resetpassword&act=update">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from users where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id[]" value="<?php echo $r['id'];?>" />
        <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="username" class="col-sm-4 control-label">Username <span class="bs-label label-danger"> *</span></small></label>
                      <div class="col-sm-5">
                        <input type="text" class="validate[required] form-control" name="username[]" value="<?php echo "$r[username]"; ?>" placeholder="Username" readonly>
						</div>
					</div>
					<div class="form-group">
					 <label for="nama" class="col-sm-4 control-label">Nama Lengkap <span class="bs-label label-danger"> *</span></small></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_lengkap[]" value="<?php echo "$r[nama_lengkap]"; ?>" placeholder="Nama Lengkap" >
                      </div>
                    </div>
					<div class="form-group">
					 <label for="nik" class="col-sm-4 control-label">NIK <span class="bs-label label-danger"> *</span></small></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" value="<?php echo "$r[nik]"; ?>"  name="nik[]" placeholder="NIK" >
                      </div>
                    </div>
					
					<div class="form-group">
					 <label for="nohp" class="col-sm-4 control-label">No.HP/Telepon</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="nohp" placeholder="No.HP/Telepon" value="<?php echo "$r[nohp]"; ?>">
                      </div>
                    </div>
					
					<div class="form-group">
					 <label for="password" class="col-sm-4 control-label">Password <span class="bs-label label-danger"> *</span></small></label>
					  <div class="col-sm-7">
                        <input type="password" class="validate[required] form-control" name="password" placeholder="Password">
                      </div>
                    </div>
					
					
                  </div><!-- /.box-body -->
				</div>	
				<div class="col-md-3">
                <div class="box-body">
					
					
					<div class="form-group">
					 <label for="foto" class="col-sm-5 control-label">Foto User</label>
					  <div class="col-sm-10">
                     
					<div class="btn btn-default btn-file">
						<?php 
						$foto=$r['foto'];
						if ($foto==''){
						?>
						<input type="file"  name="fupload" onchange="readURL(this);" /> 
                        <img id="preview_gambar" style="width: 125px; height: 145px" src="images/foto_user/blank.png" >
						
						<?php } else { ?>
						<input type="file"  name="fupload" onchange="readURL5(this);" /> 
                        <img id="preview_gambar5" style="width: 125px; height: 145px" src="img/foto_user/<?php echo $r['foto'];?>" >
						<?php } ?>   
                         
                    </div>
                      </div>
					</div> 
					
					
                  </div><!-- /.box-body -->
			</div>	
		<?php
			
		}
		?>
        
        <div class="form-group">
            
            <div class="col-sm-offset-2 col-sm-5">
                <button class="btn bg-purple btn-flat margin"  title="Edit" ><i class="fa fa-pencil"></i>
                   Edit
                </button>
				
				 <a class="btn btn-danger"  title="Hapus"  onclick="self.history.back()"><i class="fa fa-remove"></i>
                    Batal
                </a>
            </div>
        </div>
		

    </form>
  </div>

	<?php
    }
}
?>