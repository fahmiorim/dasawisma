<?php 
$namakec=$_SESSION[ses_namakec];
 ?>
<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $tamanbaca = pg_query($koneksi, "select * from tamanbaca where kodekec='$_SESSION[ses_kodekec]'");
  $count=pg_num_rows($tamanbaca);
	echo"
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Taman Baca PKK Kecamatan $namakec</h2>";
                ?>
				<form method="post" name="frm">
				
				
				<div style="text-align:right">	
		   <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>
		 
			<div class="form-group">
				<div class="form-group">
					<label for="kodekec" class="col-sm-1 control-label">Kode</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="kdkec" name="kdkec" placeholder="Kode Kecamatan" value="<?php echo "$_SESSION[ses_kodekec]";?>" readonly>
						
                      </div>
				</div>
				
				<div class="form-group">
					<label for="nmkec" class="col-sm-1 control-label">Nama</label>
                      <div class="col-sm-4">
                        
						<input type="text" class="form-control" id="nmkec" name="nmkec" placeholder="Nama Kecamatan" value="<?php echo "$_SESSION[ses_namakec]";?>" readonly>
                      </div>
				</div>
			</div> 
		 <button class="btn bg-purple btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Print Taman Baca PKK"  onClick="print_records_rpttamanbacakec();" ><i class="fa fa-print"></i> Print Taman Baca PKK</button>
		 
		 
		
		 
		<?php
		if($count > 0)
        {
		?>			
				
				
				
				
				
		    
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
						<th>Nama Taman Baca</th>
						<th>Pengelola</th>
						<th>Lingkungan</th>
						<th>Nama Dasawisma</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					
					$dasa =pg_query($koneksi, "select * from tamanbaca where kodekec='$_SESSION[ses_kodekec]' order by lingkungan");
					while ($ds=pg_fetch_array($dasa)){       
						?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
						 <td><?php echo" $ds[namatamanbaca]"; ?></td>
						 <td><?php echo" $ds[pengelola]"; ?></td>
                        <td><?php echo" $ds[lingkungan]"; ?></td>
                        <td><?php echo" $ds[dasawisma]"; ?></td>
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
			
  }
}
?>				