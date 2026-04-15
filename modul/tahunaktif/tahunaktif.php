<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/tahunaktif/aksi_tahunaktif.php";
	 
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $izin = pg_query($koneksi, "SELECT * FROM tahunaktif ");
  $count=pg_num_rows($izin);
	echo"
	

                <div class='box-header'>
                  <h2 class='box-title'>DATA TAHUN AKTIF SYSTEM</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">		
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=tahunaktif&act=tambahtahunaktif"><i class="fa fa-send"></i> Tambah</a> 
		  
		<?php
		if($count > 0)
        {
		?>			  
		  <button class="btn bg-olive btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_tahunaktif();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_tahunaktif();" ><i class="fa fa-remove"></i> Hapus </button>
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
                        <th>Tahun Aktif</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$izi =pg_query($koneksi, "select * from tahunaktif ");
					while ($iz=pg_fetch_array($izi)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					   <input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $iz['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $iz[thnaktif]"; ?></td>
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
	   case "tambahtahunaktif":
	 ?>
	 <center><h3 class="box-title">Data Tahun Aktif System</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=tahunaktif&act=input" method="POST">
				
					
					<div class="form-group">
					 <label for="namatahunaktif" class="col-sm-3 control-label">Tahun Aktif</label>
					  <div class="col-sm-4">
                        <input type="text" class="form-control" name="namatahunaktif" placeholder="Tahun Aktif">
                      </div>
                    </div>
                  </div><!-- /.box-body -->
				</div>	
				

                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=tahunaktif" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>

	 <?php		
  }
}
?>				