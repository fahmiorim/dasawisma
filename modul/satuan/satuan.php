<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/satuan/aksi_satuan.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $kec = pg_query($koneksi, "SELECT * FROM mstsatuan");
  $count=pg_num_rows($kec);
	echo"
	

                <div class='box-header'>
                  <h2 class='box-title'>DATA SATUAN INDUSTRI RUMAH TANGGA</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">		
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=satuan&act=tambahsatuan"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			 
			 <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_satuan();" ><i class="fa fa-desktop"></i> Lihat</button>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_satuan();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_satuan();" ><i class="fa fa-remove"></i> Hapus </button>
		  </div>
			
		<?php } ?>	
			
				
                <div class='box-body'>
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
                        <th>Satuan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$lingk =pg_query($koneksi, "select * from mstsatuan order by id");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $lk[satuan]"; ?></td>
                      </tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
                    
                  </table>
				  </div>
				  </form>
                </div>
              </div>
	<?php		  
	 break;
	   case "tambahsatuan":
	 ?>
	 <center><h3 class="box-title">Data Satuan Industri Rumah Tangga</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=satuan&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
                   
					
					 <div class="form-group">
					  <label for="satuan" class="col-sm-4 control-label">Nama Satuan<span class="text-danger"> *</span></label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="namasatuan" placeholder="Nama Satuan">
                       </div>
					 </div>
					
					
					</div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=satuan" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>

	 
	 
	 <?php

			
  }
}
?>				