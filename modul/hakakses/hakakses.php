<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/hakakses/aksi_hakakses.php";
	 
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $izin = pg_query($koneksi, "SELECT * FROM hakakses ");
  $count=pg_num_rows($izin);
	echo"
	
                <div class='box-header'>
                  <h2 class='box-title'>DATA HAK AKSES</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">		
  
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=hakakses&act=tambahhakakses"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn bg-olive btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_hakakses();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_hakakses();" ><i class="fa fa-remove"></i> Hapus </button>
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
                        <th>Hak Akses</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$izi =pg_query($koneksi, "select * from hakakses ");
					while ($iz=pg_fetch_array($izi)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					   <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $iz['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $iz[nama_hak_ases]"; ?></td>
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
	   case "tambahhakakses":
	 ?>
	 <center><h3 class="box-title">Data Hak Akses</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=hakakses&act=input" method="POST">
				
					
					<div class="form-group">
					 <label for="namahakakses" class="col-sm-3 control-label">Hak Akses</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="namahakakses" placeholder="Hak Akses">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
				</div>	
				

                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=hakakses" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
			
	 <?php		
  }
}
?>				