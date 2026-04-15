<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/tahunaktif/aksi_tahunaktif.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=tahunaktif';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">Edit Tahun Aktif System</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=tahunaktif&act=update">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from tahunaktif where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id[]" value="<?php echo $r['id'];?>" />
        <div class="col-md-6">
                  <div class="box-body">
                    
					
					<div class="form-group">
                      <label for="namatahunaktif" class="col-sm-3 control-label">Tahun Aktif</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" name="namatahunaktif[]" value="<?php echo $r['thnaktif'];?>" placeholder="Nama Hak Akses">
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