<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../../404.php');
  
}
else{
	$aksi = "module/akseptorkb/aksi_akseptorkb.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(!isset($_GET['id']) || $_GET['id'] == "")
{
    ?>
    <script>
         alert('Data tidak ditemukan');
       window.location.href = 'appmaster.php?module=akseptorkb';
    </script>
    <?php
}
$id = $_GET['id'];

?>
     <center><h3 class="box-title">Lihat Data Jenis Akseptor KB</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=akseptorkb"id="popup-validation">
	<?php
		$res=pg_query($koneksi, "select * from akseptorkb where id=".$id);
		$r=pg_fetch_array($res);
	?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
						
					 <div class="form-group">
					  <label for="jenisakseptorkb" class="col-sm-4 control-label">Jenis Akseptor KB<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="jenisakseptorkb" value="<?php echo $r['jenisakseptorkb'];?>" placeholder="Jenis Akseptor KB" readonly>
                       </div>
					 </div
					
					
                  </div><!-- /.box-body -->
				</div>	
	
		
        
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
		break;
  }
}
?>