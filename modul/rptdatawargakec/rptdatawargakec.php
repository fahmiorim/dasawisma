<?php
$namakec=$_SESSION[ses_namakec];
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $datads = pg_query($koneksi, "select * from datawarga where kodekec='$_SESSION[ses_kodekec]'");
  $count=pg_num_rows($datads);
	echo"
			
				<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>Laporan Data Warga Kecamatan $namakec</h2>";
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
				<button class="btn bg-purple btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Print Per Kelurahan"  onClick="print_records_rptdatawargakec();" ><i class="fa fa-print"></i> Print Per Kecamatan</button>
				
		    
		<?php } ?>	
			
				
                <div class='box-body'>
				
				<div class="box-body table-responsive no-padding">
                  <table id='example27' class='table table-bordered table-striped'>
				  
				  
                    <thead>
                      <tr>
					   <th>
					   <input type="checkbox"  name="select_all" id="select_all" value=""/>
					   </th>
                        <th>No</th>
						<th>Tgl.Terdata</th>
						<th>No.ID</th>
						<th>No.KRT</th>
						<th>Nama KRT</th>
						<th>No.KK</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Tempat Lahir</th>
						<th>Tgl.Lahir</th>
						<th>Jenis Kelamin</th>
						<th>Alamat Domisili</th>
						<th>Alamat KTP</th>
						<th>Kelurahan/Desa</th>
						<th>Lingkungan</th>
						<th>Dasawisma</th>
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