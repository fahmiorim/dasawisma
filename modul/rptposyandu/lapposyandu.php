

<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 
	$kodekelurahan=$_POST[kdkel];
	$namakelurahan=$_POST[nmkel];
  switch($act){
    default:
	 $dswisma = pg_query($koneksi, "SELECT * FROM posyandu");
  $count=pg_num_rows($dswisma);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Profil Posyandu</h2>";
				  
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
                  <table id='example25' class='table table-bordered table-striped'>
							<script type="text/javascript">
								var s5_taf_parent = window.location;
								function popup() {
								window.open('modul/rptposyandu/lap_posyandu.php?kdkel=<?php echo $kodekelurahan;?>')
								}
							</script>
							
							<script type="text/javascript">
								var s5_taf_parent = window.location;
								function popup2() {
								window.open('modul/rptposyandu/lap_posyandu2.php?kdkel=<?php echo $kodekelurahan;?>')
								}
							</script>
						
					<div class="form-group">
					<label for="kdkelurahan" class="col-sm-1 control-label">Kode</label>
					
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="kdkelurahan" name="kdkelurahan" placeholder="Kode Kelurahan" value="<?php echo "$kodekelurahan";?>"readonly>
						<input type="text" class="form-control" id="nmkelurahan" name="nmkelurahan" placeholder="Nama Kelurahan" value="<?php echo "$namakelurahan";?>"readonly>
						
                      </div>
					</div>
					
					
								<div style="text-align:right">	
								 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Kembali" href="?module=rptposyandu"><i class="fa fa-send"></i> Kembali</a>
								
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
						  <th>Nama Posyandu</th>
						<th>Alamat Posyandu</th>
						<th>No.SK Lurah</th>
						<th>Jlh Kader</th>
						<th>Strata Posyandu</th>
						<th>Nama Kader</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Balok SKDN</th>
						<th>Meja</th>
						<th>Kursi</th>
						<th>Timbangan Gantung</th>
						<th>Timbangan Berdiri</th>
						<th>Pengukur Lingkar Kepala</th>
						<th>Alat Permainan Edukasi (APE)</th>
						<th>Lemari</th>
						<th>Sound System</th>
						<th>Tikar</th>
						<th>Pojok Asi</th>
						<th>PMT</th>
						<th>Seragam Kader Posyandu</th>
						<th>Pengukur Tinggi Badan</th>
                      </tr>
                    </thead>
                   
                    
                  </table>
				  </div>
				  </form>
                </div>
              </div>
			 
	 <?php
			
  }
}
?>				

