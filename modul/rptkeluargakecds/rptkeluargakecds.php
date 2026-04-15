<?php 
$namakec=$_SESSION[ses_namakec];
 ?>
<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $datads = pg_query($koneksi, "select * from keluarga where kodekec='$_SESSION[ses_kodekec]'");
  $count=pg_num_rows($datads);
	echo"
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Catatan Keluarga Per Dasawisma Kecamatan $namakec</h2>";
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
				<button class="btn bg-purple btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Print Per Dasawisma"  onClick="print_records_rptkeluargakecds();" ><i class="fa fa-print"></i> Print Per Dasawisma</button>
				
		    
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
						<th>Kepala Keluarga</th>
						<th>Jlh KK</th>
						<th>Anggota Kel</th>
						<th>Balita</th>
						<th>PUS</th>
						<th>WUS</th>
						<th>Bumil</th>
						<th>Menyusui</th>
						<th>Lansia</th>
						<th>3 Buta</th>
						<th>Kriteria Rumah</th>
						<th>Sumber Air</th>
						<th>Makanan Pokok</th>
						<th>Lingkungan</th>
						<th>Dasawisma</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					
					$dasa =pg_query($koneksi, "select * from keluarga where kodekec='$_SESSION[ses_kodekec]' order by lingkungan,dasawisma");
					while ($ds=pg_fetch_array($dasa)){       
						?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
						 <td><?php echo" $ds[namakk]"; ?></td>
                        <td><?php echo" $ds[jlhkk]"; ?></td>
						<td><?php echo" $ds[anggotakel]"; ?></td>
						<td><?php echo" $ds[balita]"; ?></td>
						<td><?php echo" $ds[pus]"; ?></td>
						<td><?php echo" $ds[wus]"; ?></td>
						<td><?php echo" $ds[bumil]"; ?></td>
						<td><?php echo" $ds[ibumenyusui]"; ?></td>
						<td><?php echo" $ds[lansia]"; ?></td>
						<td><?php echo" $ds[buta3]"; ?></td>
						<td><?php echo" $ds[rumah]"; ?></td>
						<td><?php echo" $ds[sumberair]"; ?></td>
						<td><?php echo" $ds[jenis_makanan]"; ?></td>
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