<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/hakakses/aksi_hakakses.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=hakakses';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">Edit Hak Akses</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=hakakses&act=update">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from hakakses where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id[]" value="<?php echo $r['id'];?>" />
        <div class="col-md-6">
                  <div class="box-body">
                    
					
					<div class="form-group">
                      <label for="namahakakses" class="col-sm-3 control-label">Nama Hak Akses</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="namahakakses[]" value="<?php echo $r['nama_hak_ases'];?>" placeholder="Nama Hak Akses">
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