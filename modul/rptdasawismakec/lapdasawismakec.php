

<?php

$namakec=$_SESSION[ses_namakec];
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 
	$kodekecamatan=$_POST[kdkec];
	$namakecamatan=$_POST[nmkec];
  switch($act){
    default:
	 $dswisma = pg_query($koneksi, "SELECT * FROM dasawisma");
  $count=pg_num_rows($dswisma);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Dasawisma Kecamatan $namakec</h2>";
				  
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">	
			
         
		<?php
		if($count > 0)
        {
		?>			
		   
		<?php } ?>	
	
                <div class='box-body' style="text-align:left">
				<div class="box-body table-responsive no-padding">
                  <table id='example1' class='table table-bordered table-striped'>
							<script type="text/javascript">
								var s5_taf_parent = window.location;
								function popup() {
								window.open('modul/rptdasawismakec/lap_dasawismakec.php?kdkec=<?php echo $kodekecamatan;?>')
								}
							</script>
							
							<script type="text/javascript">
								var s5_taf_parent = window.location;
								function popup2() {
								window.open('modul/rptdasawismakec/lap_dasawismakec2.php?kdkec=<?php echo $kodekecamatan;?>')
								}
							</script>

					<div class="form-group">
					<label for="kdkecamatan" class="col-sm-1 control-label">Kode</label>
					
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="kdkecamatan" name="kdkecamatan" placeholder="Kode Kecamatan" value="<?php echo "$kodekecamatan";?>"readonly>
						<input type="text" class="form-control" id="namakecamatan" name="namakecamatan" placeholder="Nama Kecamatan" value="<?php echo "$namakecamatan";?>"readonly>
						
                      </div>
					</div>
					
						
				
					
								<div style="text-align:right">	
								 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Kembali" href="?module=rptdasawismakec"><i class="fa fa-send"></i> Kembali</a>
								
								<button class="btn bg-orange btn-flat margin"  title="Save to Excell" onClick="popup2()" ><i class="fa fa-print"></i>
									Save to Excell
								</button>
								
								<button class="btn bg-purple btn-flat margin"  title="Printer" onClick="popup()"><i class="fa fa-print"></i>
									Printer
								</button>
								</div>
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
						<th>Kode</th>
						<th>Lingkungan</th>
						<th>Nama Dasawisma</th>
						<th>Nama Ketua</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					
					$dasa =pg_query($koneksi, "select * from dasawisma where kodekec='$_SESSION[ses_kodekec]' order by lingkungan");
					
					while ($ds=pg_fetch_array($dasa)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $ds['id'];?>"/>
                       </td> 
					   <td><?php echo" $no"; ?></td>
						 <td><?php echo" $ds[kode]"; ?></td>
                        <td><?php echo" $ds[lingkungan]"; ?></td>
                        <td><?php echo" $ds[nama_dasawisma]"; ?></td>
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
			
  }
}
?>				

