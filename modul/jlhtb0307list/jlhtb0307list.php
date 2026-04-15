

<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	 
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $jlhtb0307list = pg_query($koneksi, "SELECT * FROM tamanbaca where kodekel='0307'");
  $count=pg_num_rows($jlhtb0307list);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA TAMAN BACAAN KELURAHAN SUMBER KARYA KOTA BINJAI</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">	
		   <a  class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali Ke Beranda" href="?module=beranda"><i class="fa fa-send"></i>Beranda</a>
          
		 
		<?php
		if($count > 0)
        {
		?>			
		   <button class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="Detail"  onClick="view_records_jlhtb0307list();" ><i class="fa fa-desktop"></i> Detail</button>
		 
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
                        <th>Nama Taman Baca</th>
						<th>Pengelola</th>
						<th>Status Pengelola</th>
						<th>Jlh Buku</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$tbaca =pg_query($koneksi, "select * from tamanbaca where kodekel='0307' order by lingkungan");
					while ($tb=pg_fetch_array($tbaca)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $tb['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                       <td><?php echo" $tb[tglentry]"; ?></td>
						<td><?php echo" $tb[namatamanbaca]"; ?></td>
						<td><?php echo" $tb[pengelola]"; ?></td>
						<td><?php echo" $tb[stspengelola]"; ?></td>
						<td><?php echo" $tb[jlhbuku]"; ?></td>
						<td><?php echo" $tb[dasawisma]"; ?></td>
						<td><?php echo" $tb[lingkungan]"; ?></td>
						<td><?php echo" $tb[kelurahan]"; ?></td>
						<td><?php echo" $tb[kecamatan]"; ?></td>
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