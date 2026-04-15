

<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	 
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $jlhklg0106list = pg_query($koneksi, "SELECT * FROM keluarga where kodekel='0106'");
  $count=pg_num_rows($jlhklg0106list);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>CATATAN KELUARGA KELURAHAN SUKA MAJU KOTA BINJAI</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">	
		   <a  class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali Ke Beranda" href="?module=beranda"><i class="fa fa-send"></i>Beranda</a>
          
		 
		<?php
		if($count > 0)
        {
		?>			
		   <button class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="Detail"  onClick="view_records_jlhklg0106list();" ><i class="fa fa-desktop"></i> Detail</button>
		 
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
                       <th>No.KK</th>
					   <th>Kepala Keluarga</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$lingk =pg_query($koneksi, "select * from keluarga where kodekel='0106' order by lingkungan");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $lk[nokk]"; ?></td>
						<td><?php echo" $lk[namakk]"; ?></td>
						<td><?php echo" $lk[dasawisma]"; ?></td>
						<td><?php echo" $lk[lingkungan]"; ?></td>
						<td><?php echo" $lk[kelurahan]"; ?></td>
						<td><?php echo" $lk[kecamatan]"; ?></td>
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