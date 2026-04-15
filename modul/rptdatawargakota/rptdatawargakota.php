<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $datads = pg_query($koneksi, "select * from datawarga");
  $count=pg_num_rows($datads);

  // Pagination
  $limit = 10;
  $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
  if($page < 1) $page = 1;
  $offset = ($page - 1) * $limit;
  $total_pages = ceil($count / $limit);

  $datads = pg_query($koneksi, "SELECT * FROM datawarga LIMIT $limit OFFSET $offset");
	echo"
			

                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Warga</h2>";
                ?>
				<form method="post" name="frm">
				
				
				<div style="text-align:right">	
		   <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-send"></i> Beranda</a>
	
				<button class="btn bg-purple btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Print"  onClick="print_records_rptdatawargakota();" ><i class="fa fa-print"></i> Print Seluruh Data Warga</button>
		
                <div class='box-body'>
				
				<div class="box-body table-responsive no-padding">
                  <table id='table-rptdatawargakota' class='table table-bordered table-striped'>
				  
				  
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
						<th>No.ID</th>
						<th>NIK</th>
						<th>No.KK</th>
						<th>Nama Warga</th>
						<th>Tempat</th>
						<th>Tgl.Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Alamat</th>
						<th>Lingkungan</th>
						<th>Dasawisma</th>
						<th>Pekerjaan</th>
						<th>Kriteria Kader</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no = $offset + 1;
					while ($data = pg_fetch_array($datads)) {
					?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $data['id'];?>"/>
                       </td>
						<td><?php echo $no++; ?></td>
						<td><?php echo $data['id']; ?></td>
						<td><?php echo $data['nik']; ?></td>
						<td><?php echo $data['nokk']; ?></td>
						<td><?php echo $data['nama']; ?></td>
						<td><?php echo $data['tempat']; ?></td>
						<td><?php echo $data['tgllahir']; ?></td>
						<td><?php echo $data['jeniskelamin']; ?></td>
						<td><?php echo $data['alamat']; ?></td>
						<td><?php echo $data['lingkungan']; ?></td>
						<td><?php echo $data['dasawisma']; ?></td>
						<td><?php echo $data['pekerjaan']; ?></td>
						<td><?php echo $data['kriteria']; ?></td>
                      </tr>
					  <?php
					}
					?>
                    </tbody>

                  </table>
				  <div class="box-footer clearfix">
					<ul class="pagination pagination-sm no-margin pull-right">
						<?php
						$batas_halaman = 5;
						$start = max(1, $page - floor($batas_halaman/2));
						$end = min($total_pages, $start + $batas_halaman - 1);
						if($end - $start < $batas_halaman - 1){
							$start = max(1, $end - $batas_halaman + 1);
						}
						if($page > 1){
							$prev = $page - 1;
							echo "<li><a href=\"?module=rptdatawargakota&page=1\">&laquo;</a></li>";
							echo "<li><a href=\"?module=rptdatawargakota&page=$prev\">&lsaquo;</a></li>";
						}
						for($i=$start; $i<=$end; $i++){
							$aktif = ($i == $page) ? "class=\"active\"" : "";
							echo "<li $aktif><a href=\"?module=rptdatawargakota&page=$i\">$i</a></li>";
						}
						if($page < $total_pages){
							$next = $page + 1;
							echo "<li><a href=\"?module=rptdatawargakota&page=$next\">&rsaquo;</a></li>";
							echo "<li><a href=\"?module=rptdatawargakota&page=$total_pages\">&raquo;</a></li>";
						}
						?>
					</ul>
					<p>Total: <?php echo $count; ?> records</p>
				  </div>
				  </div>
				  </form>
                </div>

	
	
				
	 <?php
			
  }
}
?>				