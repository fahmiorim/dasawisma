

<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	 
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $jlhwr0307list = pg_query($koneksi, "SELECT * FROM warung where kodekel='0307'");
  $count=pg_num_rows($jlhwr0307list);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA WARUNG PKK KELURAHAN SUMBER KARYA KOTA BINJAI</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">	
		   <a  class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali Ke Beranda" href="?module=beranda"><i class="fa fa-send"></i>Beranda</a>
          
		 
		<?php
		if($count > 0)
        {
		?>			
		   <button class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="Detail"  onClick="view_records_jlhwr0307list();" ><i class="fa fa-desktop"></i> Detail</button>
		 
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
                       <th>Tgl.Entry</th>
                        <th>Nama Warung PKK</th>
						<th>Pengelola</th>
						<th>Komoditi</th>
						<th>Kategori</th>
						<th>Volume</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$warg =pg_query($koneksi, "select * from warung where kodekel='0307' order by lingkungan");
					while ($wr=pg_fetch_array($warg)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $wr['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $wr[tglentry]"; ?></td>
						<td><?php echo" $wr[namawarung]"; ?></td>
						<td><?php echo" $wr[pengelola]"; ?></td>
						<td><?php echo" $wr[komoditi]"; ?></td>
						<td><?php echo" $wr[kategori]"; ?></td>
						<td><?php echo" $wr[volume]"; ?></td>
						<td><?php echo" $wr[dasawisma]"; ?></td>
						<td><?php echo" $wr[lingkungan]"; ?></td>
						<td><?php echo" $wr[kelurahan]"; ?></td>
						<td><?php echo" $wr[kecamatan]"; ?></td>
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