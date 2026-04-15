<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/mstpekarangan/aksi_mstpekarangan.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=mstpekarangan';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">Edit Data Pemanfaatan Pekarangan</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=mstpekarangan&act=update"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from mstpekarangan where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
						
						<div class="form-group">
					 <label for="jenis_komoditi" class="col-sm-4 control-label">Jenis Komoditi<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='jenis_komoditi'  >
							<option><?php echo $r[jenis_komoditi];?></option>
							<option value="Peternakan">Peternakan</option>							  
							<option value="Perikanan">Perikanan</option>
							<option value="Warung Hidup">Warung Hidup</option>
							<option value="Toga">Toga</option>
							<option value="Tanaman Keras">Tanaman Keras</option>
						</select>
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="nama_komoditi" class="col-sm-4 control-label">Nama Komoditi<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="nama_komoditi" value="<?php echo $r[nama_komoditi];?>" placeholder="Nama Komoditi">
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
                <button class="btn bg-purple btn-flat margin"  title="Edit" ><i class="fa fa-pencil"></i>
                   Edit
                </button>
				
				 <a class="btn btn-danger"  title="Batal"  onclick="self.history.back()"><i class="fa fa-remove"></i>
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