<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
	$aksi = "modul/datakrt2/aksi_datakrt2.php";
 $act = isset($_GET['act']) ? $_GET['act'] : ''; 


switch($_GET['act']){
  // Tampil List View
  default:	
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=datakrt2';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">EDIT DATA KEPALA RUMAH TANGGA</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=datakrt2&act=update"id="popup-validation">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from datakrt where id=".$id);
			$r=pg_fetch_array($res);
		?>	
        <input type="hidden" name="id" value="<?php echo $r['id'];?>" />
				<div class="col-md-6">
					<div class="box-body">
						
					 <div class="form-group">
					  <label for="nokrt" class="col-sm-4 control-label">No.KRT<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <input type="text" class="validate[required] form-control" name="nokrt" value="<?php echo $r[nokrt];?>" placeholder="No.KRT">
                       </div>
					 </div>
					
					 <div class="form-group">
					  <label for="namakrt" class="col-sm-4 control-label">Nama Kepala Rumah Tangga<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namakrt" value="<?php echo $r[namakrt];?>" placeholder="Nama Kepala Rumah Tangga">
                       </div>
					 </div>
					
						 
					<div class="form-group">
					<label for="kode" class="col-sm-4 control-label">Kode Dasawisma <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="kode" value="<?php echo $r[kode];?>"readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal10"><i class="fa fa-search"></i> Cari</button>
					 </div>
					
					<div class="form-group">
					  <label for="nama_dasawisma" class="col-sm-4 control-label">Nama Dasawisma</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma" value="<?php echo $r[nama_dasawisma];?>" readonly>
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" value="<?php echo $r[kodekel];?>" readonly>
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="kelurahan" class="col-sm-4 control-label">Kelurahan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $r[kelurahan];?>" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" value="<?php echo $r[kodekec];?>"readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $r[kecamatan];?>"readonly>
                       </div>
					 </div>
					 
					  <div class="form-group">
					  <label for="lingkungan" class="col-sm-4 control-label">Lingkungan</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_lingkungan" id="lingkungan" value="<?php echo $r[nama_lingkungan];?>"placeholder="Lingkungan" readonly>
                       </div>
					 </div>
				
					
					
                  </div><!-- /.box-body -->
				</div>	
		
		<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Kelurahan</h4>
                    </div>
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                     <th>Kode Dasawisma</th>
									 <th>Nama Dasawisma</th>
									<th>Kode Kel</th>
                                    <th>Kelurahan</th>
									<th>Kode Kec</th>
									<th>Kecamatan</th>
									<th>Lingkungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                $qu = pg_query($koneksi, "SELECT * FROM dasawisma order by kodekel");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih10" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>"  data-nama_dasawisma="<?php echo $data['nama_dasawisma']; ?>" data-kodekel="<?php echo $data['kodekel']; ?>" data-kelurahan="<?php echo $data['kelurahan']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>" data-kecamatan="<?php echo $data['kecamatan']; ?>"data-lingkungan="<?php echo $data['lingkungan']; ?>">
										
                                        <td><?php echo $data['kode']; ?></td>
                                        <td><?php echo $data['nama_dasawisma']; ?></td>
										 <td><?php echo $data['kodekel']; ?></td>
										 <td><?php echo $data['kelurahan']; ?></td>
										 <td><?php echo $data['kodekec']; ?></td>
										 <td><?php echo $data['kecamatan']; ?></td>
										 <td><?php echo $data['lingkungan']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
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