<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../../404.php');
  
}
else{
	$aksi = "module/mstanggota/aksi_mstanggota.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(!isset($_GET['id']) || $_GET['id'] == "")
{
    ?>
    <script>
         alert('Data tidak ditemukan');
       window.location.href = 'appmaster.php?module=mstanggota';
    </script>
    <?php
}
$id = $_GET['id'];

?>
     <center><h3 class="box-title">Edit Data Status Anggota</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=mstanggota&act=update&id=<?php echo $id;?>" id="popup-validation">
	<?php
		$res=pg_query($koneksi, "select * from mstanggota where id=".$id);
		$r=pg_fetch_array($res);
	?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
						
						
					 <div class="form-group">
					  <label for="stsanggota" class="col-sm-4 control-label">Status Anggota<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="stsanggota" value="<?php echo $r['stsanggota'];?>" placeholder="Status Anggota">
                       </div>
					 </div>
					
					
                  </div><!-- /.box-body -->
				</div>	
		
		<div class="divider"></div>
        
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