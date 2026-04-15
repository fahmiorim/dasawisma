<?php

$namakec=$_SESSION[ses_namakec];
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $datads = pg_query($koneksi, "select * from dasawisma where kodekec='$_SESSION[ses_kodekec]'");
  $count=pg_num_rows($datads);
	echo"
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Dasawisma Kecamatan $namakec</h2>";

                ?>
				<form method="post" name="frm">
				
				
				<div style="text-align:right">	
		   <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>
	 
	 <?php
		if($count > 0)
        {
		?>			
				
				
				 <div class="form-group">
					<label for="kodekel" class="col-sm-1 control-label">Kecamatan</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="kdkec" name="kdkec" placeholder="Kode Kecamatan" value="<?php echo "$_SESSION[ses_kodekec]";?>" readonly>
						<input type="text" class="form-control" id="nmkec" name="nmkec" placeholder="Nama Kecamatan" value="<?php echo "$_SESSION[ses_namakec]";?>" readonly>
                      </div>
				</div>
			
			
				<button class="btn bg-purple btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Print Per Kelurahan"  onClick="print_records_rptdasawismakec();" ><i class="fa fa-print"></i> Print Per Kecamatan</button>
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
						<th>Kode</th>
						<th>Lingkungan</th>
						<th>Nama Dasawisma</th>
						<th>Nama Ketua</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					
					$dasa =pg_query($koneksi, "select * from dasawisma where kodekec='$_SESSION[ses_kodekec]' order by lingkungan");
					while ($ds=pg_fetch_array($dasa)){       
						?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
						 <td><?php echo" $ds[kode]"; ?></td>
                        <td><?php echo" $ds[lingkungan]"; ?></td>
                        <td><?php echo" $ds[nama_dasawisma]"; ?></td>
						<td><?php echo" $ds[keterangan]"; ?></td>
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