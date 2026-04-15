<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/datarw/aksi_datarw.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=datarw';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">Lihat Data RW Kabupaten Batu Bara</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=datarw"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from datarw where id=".$id);
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
					  <label for="datarw" class="col-sm-4 control-label">Nama RW<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_datarw" value="<?php echo $r[nama_datarw];?>" placeholder="Nama RW" readonly>
                       </div>
					 </div>
					
					 <div class="form-group">
					  <label for="Keterangan" class="col-sm-4 control-label">Keterangan</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="keterangan" value="<?php echo $r[keterangan];?>" placeholder="Keterangan"readonly>
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
                			
				 <a class="btn btn-danger"  title="Hapus"  onclick="self.history.back()"><i class="fa fa-remove"></i>
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