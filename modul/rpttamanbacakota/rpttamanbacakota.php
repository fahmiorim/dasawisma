<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $tamanbaca = pg_query($koneksi, "select * from tamanbaca");
  $count=pg_num_rows($tamanbaca);
  
  // Pagination
  $limit = 10;
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  if($page < 1) $page = 1;
  $offset = ($page - 1) * $limit;
  $total_pages = ceil($count / $limit);
  
	echo"
			

                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Taman Baca Se-Kabupaten Batu Bara</h2>";
                ?>
				<form method="post" name="frm">
				
				
				<div style="text-align:right">	
		   <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>
		 
		
		 <button class="btn bg-purple btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Print Taman Baca PKK"  onClick="print_records_rpttamanbacakota();" ><i class="fa fa-print"></i> Print Taman Baca PKK</button>
		 
		 
		
		 
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
					$no = $offset + 1;
					
					$dasa =pg_query($koneksi, "select * from tamanbaca order by lingkungan LIMIT $limit OFFSET $offset");
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
                
                <!-- Pagination -->
                <div class='box-footer clearfix'>
                  <ul class='pagination pagination-sm no-margin pull-right'>
                    <?php
                    $batas_halaman = 5;
                    $start = max(1, $page - floor($batas_halaman/2));
                    $end = min($total_pages, $start + $batas_halaman - 1);
                    if($end - $start < $batas_halaman - 1){
                      $start = max(1, $end - $batas_halaman + 1);
                    }
                    if($page > 1){
                      $prev = $page - 1;
                      echo "<li><a href=\"?module=rpttamanbacakota&page=1\">&laquo;</a></li>";
                      echo "<li><a href=\"?module=rpttamanbacakota&page=$prev\">&lsaquo;</a></li>";
                    }
                    for($i=$start; $i<=$end; $i++){
                      $aktif = ($i == $page) ? "class=\"active\"" : "";
                      echo "<li $aktif><a href=\"?module=rpttamanbacakota&page=$i\">$i</a></li>";
                    }
                    if($page < $total_pages){
                      $next = $page + 1;
                      echo "<li><a href=\"?module=rpttamanbacakota&page=$next\">&rsaquo;</a></li>";
                      echo "<li><a href=\"?module=rpttamanbacakota&page=$total_pages\">&raquo;</a></li>";
                    }
                    ?>
                  </ul>
                  <p>Total: <?php echo $count; ?> records</p>
                </div>

	
				
	 <?php
			
  }
}
?>				