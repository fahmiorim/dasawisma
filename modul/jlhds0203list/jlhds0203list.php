

<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	 
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $jlhds0203list = pg_query($koneksi, "SELECT * FROM Dasawisma where kodekel='0203'");
  $count=pg_num_rows($jlhds0203list);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA DASAWISMA KELURAHAN KARTINI KOTA BINJAI</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">	
		   <a  class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali Ke Beranda" href="?module=beranda"><i class="fa fa-send"></i>Beranda</a>
          
		 
		<?php
		if($count > 0)
        {
		?>			
		   <button class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="Detail"  onClick="view_records_jlhds0203list();" ><i class="fa fa-desktop"></i> Detail</button>
		 
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
						<th>Kelurahan</th>
						<th>Kecamatan</th>
						<th>Nama Ketua</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$dasa =pg_query($koneksi, "select * from dasawisma where kodekel='0203' order by lingkungan");
					while ($ds=pg_fetch_array($dasa)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $ds[kode]"; ?></td>
						<td><?php echo" $ds[nama_dasawisma]"; ?></td>
						<td><?php echo" $ds[lingkungan]"; ?></td>
						<td><?php echo" $ds[kelurahan]"; ?></td>
						<td><?php echo" $ds[kecamatan]"; ?></td>
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
	
	 ?>
	
				
	 <?php
			
  }
}
?>				