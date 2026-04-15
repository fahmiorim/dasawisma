<?php

if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $koperasi = pg_query($koneksi, "select * from koperasi");
  $count=pg_num_rows($koperasi);
	echo"
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Koperasi PKK Se-Kabupaten Batu Bara</h2>";
                ?>
				<form method="post" name="frm">
				
				
				<div style="text-align:right">	
		   <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>
		
		 <button class="btn bg-purple btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Print Koperasi PKK"  onClick="print_records_rptkoperasikota();" ><i class="fa fa-print"></i> Print Koperasi PKK</button>
		 
		 
		
		 
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
						<th>Nama Koperasi</th>
						<th>Jenis Koperasi</th>
						<th>Lingkungan</th>
						<th>Nama Dasawisma</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					
					$dasa =pg_query($koneksi, "select * from koperasi order by lingkungan");
					while ($ds=pg_fetch_array($dasa)){       
						?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
						 <td><?php echo" $ds[namakoperasi]"; ?></td>
						 <td><?php echo" $ds[jenis]"; ?></td>
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