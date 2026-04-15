<?php 
$namakec=$_SESSION[ses_namakec];
 ?>

<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 
	$kodekecamatan=$_POST[kdkec];
	$namakecamatan=$_POST[nmkec];
  switch($act){
    default:
	 $dswisma = pg_query($koneksi, "SELECT * FROM tamanbaca");
  $count=pg_num_rows($dswisma);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Taman Baca PKK Kecamatan $namakec</h2>";
				  
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
								window.open('modul/rpttamanbacakec/lap_tamanbacakec.php?kdkec=<?php echo $kodekecamatan;?>')
								}
							</script>
							
							<script type="text/javascript">
								var s5_taf_parent = window.location;
								function popup2() {
								window.open('modul/rpttamanbacakec/lap_tamanbacakec2.php?kdkec=<?php echo $kodekecamatan;?>')
								}
							</script>
						
					<div class="form-group">
				<div class="form-group">
					<label for="kodekec" class="col-sm-1 control-label">Kode</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="kdkec" name="kdkec" placeholder="Kode Kecamatan" value="<?php echo "$_SESSION[ses_kodekec]";?>" readonly>
						
                      </div>
				</div>
				
				<div class="form-group">
					<label for="nmkec" class="col-sm-1 control-label">Nama</label>
                      <div class="col-sm-3">
                        
						<input type="text" class="form-control" id="nmkec" name="nmkec" placeholder="Nama Kecamatan" value="<?php echo "$_SESSION[ses_namakec]";?>" readonly>
                      </div>
				</div>
			</div> 
					
					
								<div style="text-align:right">	
								 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Kembali" href="?module=rpttamanbacakec"><i class="fa fa-send"></i> Kembali</a>
								
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
						<th>Nama Taman Baca</th>
						<th>Pengelola</th>
						<th>Lingkungan</th>
						<th>Nama Dasawisma</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					
					$dasa =pg_query($koneksi, "select * from tamanbaca where kodekec='$_SESSION[ses_kodekec]' order by lingkungan");
					
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
              </div>
			 
	 <?php
			
  }
}
?>				

