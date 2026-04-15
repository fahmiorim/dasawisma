

<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	 
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $jlhpos0307list = pg_query($koneksi, "SELECT * FROM posyandu where kodekel='0307'");
  $count=pg_num_rows($jlhpos0307list);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>DATA POSYANDU KELURAHAN SUMBER KARYA KOTA BINJAI</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">	
		   <a  class="btn bg-green margin" data-toggle="tooltip" data-placement="top" title="Kembali Ke Beranda" href="?module=beranda"><i class="fa fa-send"></i>Beranda</a>
          
		 
		<?php
		if($count > 0)
        {
		?>			
		   <button class="btn bg-orange btn-flat margin" data-toggle="tooltip" data-placement="top" title="Detail"  onClick="view_records_jlhpos0307list();" ><i class="fa fa-desktop"></i> Detail</button>
		 
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
                        <th>Nama Posyandu</th>
						<th>Alamat Posyandu</th>
						<th>Jlh Kader</th>
						<th>Strata Posyandu</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
						<th>PAUD</th>
						<th>BKB</th>
						<th>Sudut Baca</th>
						<th>Toga</th>
						<th>Posyandu Remaja</th>
						<th>Posyandu Lansia</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					$tpos =pg_query($koneksi, "select * from posyandu where kodekel='0307' order by lingkungan");
					while ($lk=pg_fetch_array($tpos)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $lk[tglentry]"; ?></td>
						<td><?php echo" $lk[namaposyandu]"; ?></td>
						<td><?php echo" $lk[alamatposyandu]"; ?></td>
						<td><?php echo" $lk[jlhkader]"; ?></td>
						<td><?php echo" $lk[jenis]"; ?></td>
						<td><?php echo" $lk[dasawisma]"; ?></td>
						<td><?php echo" $lk[lingkungan]"; ?></td>
						<td><?php echo" $lk[kelurahan]"; ?></td>
						<td><?php echo" $lk[kecamatan]"; ?></td>
						<td align="center"><?php 
						$cek11=$lk['stspaud'];
						if($cek11=='1'){
						?>	
						<i class="fa fa-check"></i>
						<?php } else { ?>	
						<i class="fa fa-minus"></i>
						<?php } ?>	
						</td>
						
						<td align="center"><?php 
						$cek12=$lk['stsbkb'];
						if($cek12=='1'){
						?>	
						<i class="fa fa-check"></i>
						<?php } else { ?>	
						<i class="fa fa-minus"></i>
						<?php } ?>	
						</td>
						
						<td align="center"><?php 
						$cek13=$lk['stsbaca'];
						if($cek13=='1'){
						?>	
						<i class="fa fa-check"></i>
						<?php } else { ?>	
						<i class="fa fa-minus"></i>
						<?php } ?>	
						</td>
						
						<td align="center"><?php 
						$cek14=$lk['ststoga'];
						if($cek14=='1'){
						?>	
						<i class="fa fa-check"></i>
						<?php } else { ?>	
						<i class="fa fa-minus"></i>
						<?php } ?>	
						</td>
						
						<td align="center"><?php 
						$cek15=$lk['stsremaja'];
						if($cek15=='1'){
						?>	
						<i class="fa fa-check"></i>
						<?php } else { ?>	
						<i class="fa fa-minus"></i>
						<?php } ?>	
						</td>
						
						<td align="center"><?php 
						$cek16=$lk['stslansia'];
						if($cek16=='1'){
						?>	
						<i class="fa fa-check"></i>
						<?php } else { ?>	
						<i class="fa fa-minus"></i>
						<?php } ?>	
						</td>
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