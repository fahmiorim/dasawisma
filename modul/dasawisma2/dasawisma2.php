<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/dasawisma2/aksi_dasawisma2.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 // Use COUNT instead of SELECT * for counting
	 $count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM dasawisma WHERE nama_dasawisma IS NOT NULL AND nama_dasawisma != ''");
	 $count_result = pg_fetch_array($count_query);
	 $count = $count_result['total'];
	echo"
	
                <div class='box-header'>
                  <h2 class='box-title'>DATA DASAWISMA KOTA KABUPATEN BATU BARA</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">		
          
		   <a  class="btn bg-purple margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
		  
		<?php
		if($count > 0)
        {
		?>			 
			 <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_dasawisma2();" ><i class="fa fa-desktop"></i> Lihat</button>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_dasawisma2();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" onClick="delete_records_dasawisma2();" ><i class="fa fa-remove"></i> Hapus </button>
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
                        <th>Kode</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan/Desa</th>
						<th>Kecamatan</th>
						<th>Nama Ketua</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$batas = 10;
					$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
					$posisi = ($hal - 1) * $batas;
					
					$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM dasawisma WHERE nama_dasawisma IS NOT NULL AND nama_dasawisma != ''");
					$count_result = pg_fetch_array($count_query);
					$jmldata = $count_result['total'];
					$jmlhalaman = ceil($jmldata/$batas);
					
					$no = $posisi + 1;
					$lingk = pg_query($koneksi, "SELECT id, kode, nama_dasawisma, lingkungan, kelurahan, kecamatan, keterangan FROM dasawisma WHERE nama_dasawisma IS NOT NULL AND nama_dasawisma != '' ORDER BY kelurahan, lingkungan DESC LIMIT $batas OFFSET $posisi");
					if (!$lingk) {
						echo "<tr><td colspan='8'>Error query</td></tr>";
					} else {
						$num_rows = pg_num_rows($lingk);
						if ($num_rows == 0) {
							echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
						} else {
							while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo $no; ?></td>
                        <td><?php echo $lk['kode']; ?></td>
						<td><?php echo $lk['nama_dasawisma']; ?></td>
						<td><?php echo $lk['lingkungan']; ?></td>
						<td><?php echo $lk['kelurahan']; ?></td>
						<td><?php echo $lk['kecamatan']; ?></td>
						<td><?php echo $lk['keterangan']; ?></td>
                      </tr>
					  <?php
                $no++;
              }
              ?>
						<?php } // end if num_rows > 0 ?>
					<?php } // end if query succeeded ?>
                    </tbody>
                    
                  </table>
				  <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <?php
                      $batas_halaman = 5;
                      $start = max(1, $hal - floor($batas_halaman/2));
                      $end = min($jmlhalaman, $start + $batas_halaman - 1);
                      if($end - $start < $batas_halaman - 1){
                        $start = max(1, $end - $batas_halaman + 1);
                      }
                      
                      if($hal > 1){
                        $prev = $hal - 1;
                        echo "<li><a href=\"?module=dasawisma2&hal=1\">&laquo;</a></li>";
                        echo "<li><a href=\"?module=dasawisma2&hal=$prev\">&lsaquo;</a></li>";
                      }
                      for($i=$start; $i<=$end; $i++){
                        $aktif = ($i == $hal) ? "class=\"active\"" : "";
                        echo "<li $aktif><a href=\"?module=dasawisma2&hal=$i\">$i</a></li>";
                      }
                      if($hal < $jmlhalaman){
                        $next = $hal + 1;
                        echo "<li><a href=\"?module=dasawisma2&hal=$next\">&rsaquo;</a></li>";
                        echo "<li><a href=\"?module=dasawisma2&hal=$jmlhalaman\">&raquo;</a></li>";
                      }
                      ?>
                    </ul>
                  </div>
				  </div>
				  </form>
                </div>
              </div>
	<?php		  
	 break;
	   case "tambahdasawisma2":
	  
	 ?>
					
				
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=dasawisma2" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>
	 
	 
	 <?php

			
  }
}
?>				