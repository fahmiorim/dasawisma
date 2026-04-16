<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../../404.php');
  
}
else{
	$aksi = "module/mstkomoditi/aksi_mstkomoditi.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(!isset($_GET['id']) || $_GET['id'] == "")
{
    ?>
    <script>
         alert('Data tidak ditemukan');
       window.location.href = 'appmaster.php?module=mstkomoditi';
    </script>
    <?php
}
$id = $_GET['id'];

?>
     <center><h3 class="box-title">Lihat Data Komoditi</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=mstkomoditi&id=<?php echo $id;?>" id="popup-validation">
	<?php
		$res=pg_query($koneksi, "select * from mstkomoditi where id=".$id);
		$r=pg_fetch_array($res);
	?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
						
						<div class="form-group">
					 <label for="jenis_komoditi" class="col-sm-4 control-label">Jenis Komoditi<span class="text-danger"> *</span></label>
					  <div class="col-sm-4">
                        <select class=" validate[required] form-control" name='jenis_komoditi'  disabled>
							<option><?php echo $r['jenis_komoditi'];?></option>
							<option value="Pangan">Pangan</option>							  
							<option value="Sandang">Sandang</option>
							<option value="Jasa">Jasa</option>
							<option value="Konveksi">Konveksi</option>
						</select>
                      </div>
					</div>
					
					 <div class="form-group">
					  <label for="nama_komoditi" class="col-sm-4 control-label">Nama Komoditi<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="nama_komoditi" value="<?php echo $r['nama_komoditi'];?>" placeholder="Nama Komoditi" readonly>
                       </div>
					 </div>
						
					
                  </div><!-- /.box-body -->
				</div>	
		
		<div class="divider"></div>
        
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