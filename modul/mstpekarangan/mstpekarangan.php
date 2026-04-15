<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/mstpekarangan/aksi_mstpekarangan.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $kb = pg_query($koneksi, "SELECT * FROM mstpekarangan");
  $count=pg_num_rows($kb);
	echo"
	

                <div class='box-header'>
                  <h2 class='box-title'>DATA PEMANFAATAN PEKARANGAN</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">
			
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=mstpekarangan&act=tambahmstpekarangan"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			 
			 <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_mstpekarangan();" ><i class="fa fa-desktop"></i> Lihat</button>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_mstpekarangan();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_mstpekarangan();" ><i class="fa fa-remove"></i> Hapus </button>
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
						<th>Jenis Komoditi</th>
						<th>Nama Komoditi</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$lingk =pg_query($koneksi, "select * from mstpekarangan order by jenis_komoditi");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
						<td><?php echo" $lk[jenis_komoditi]"; ?></td>
						<td><?php echo" $lk[nama_komoditi]"; ?></td>
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
	   case "tambahmstpekarangan":
	 ?>
	 <center><h3 class="box-title">Data Pemanfaatan Pekarangan</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=mstpekarangan&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
					
					<div class="form-group">
					 <label for="jenis_komoditi" class="col-sm-4 control-label">Jenis Komoditi<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <select class=" validate[required] form-control" name='jenis_komoditi'  >
							<option></option>
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
                        <input type="text" class="validate[required] form-control" name="nama_komoditi" placeholder="Nama Komoditi">
                       </div>
					 </div>
					
					</div><!-- /.box-body -->
				</div>	
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=mstpekarangan" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>

	 
	 
	 <?php

			
  }
}
?>				