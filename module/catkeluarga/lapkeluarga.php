
<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 
	$datanokrt=$_POST[nokrt];
	$datanamakrt=$_POST[namakrt];
	$datanama_dasawisma=$_POST[nama_dasawisma];
	
  switch($act){
    default:
	 $dtwarga = pg_query($koneksi, "SELECT * FROM datawarga ");
  $count=pg_num_rows($dtwarga);
	echo"
	
	<div class='box'>
                <div class='box-header'>
                  <h2 class='box-title'>LAPORAN CATATAN KELUARGA</h2>";
				  
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
								window.open('modul/catkeluarga/lap_catkeluarga.php?nokrt=<?php echo $datanokrt;?>')
								}
							</script>
							
							<script type="text/javascript">
								var s5_taf_parent = window.location;
								function popup2() {
								window.open('modul/catkeluarga/lap_catkeluarga2.php?nokrt=<?php echo $datanokrt;?>')
								}
							</script>
				<div class="form-group">
					<div class="form-group">
					<label for="nokrt" class="col-sm-1 control-label">No.KRT</label>
					  <div class="col-sm-2">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nokrt" id="nokrt" placeholder="No.KRT" value="<?php echo "$datanokrt";?>" readonly>
                      </div>
					 </div>
					  
					<div class="form-group">
					 <label for="namakrt" class="col-sm-1 control-label">Nama KRT</label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required] form-control"  name="namakrt" id="namakrt" placeholder="Nama KRT" value="<?php echo "$datanamakrt";?>" readonly>
                      </div>
					</div>
				
					<div class="form-group">
					 <label for="nama_dasawisma" class="col-sm-1 control-label">Dasawisma</label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required] form-control"  name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma" value="<?php echo "$datanama_dasawisma";?>"readonly>
                      </div>
					</div>
				 </div>
					
					
							
								<div style="text-align:right">	
								 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Catatan Keluarga" href="?module=catkeluarga"><i class="fa fa-send"></i>Catatan Keluarga</a>
								
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
						 <th>Nama Anggota</th>
						<th>Status Perkawinan</th>
						<th>L/P</th>
						<th>Tempat Lahir</th>
						<th>Tgl.Lahir</th>
						<th>Agama</th>
						<th>Pendidikan</th>
						<th>Pekerjaan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$no = 1;
					
					$tim =pg_query($koneksi, "select * from datawarga where nokrt='$datanokrt' and kodekel='$_SESSION[ses_kodekel]' order by id ");
					
					while ($tm=pg_fetch_array($tim)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $tm['id'];?>"/>
                       </td> 
					   <td><?php echo" $no"; ?></td>
						
						<td><?php echo" $tm[nama]"; ?></td>
						<td><?php echo" $tm[stskawin]"; ?></td>
						  <td><?php echo" $tm[jenkel]"; ?></td>
                        <td><?php echo" $tm[tempat]"; ?></td>
                        <td><?php echo" $tm[tgllahir]"; ?></td>
						<td><?php echo" $tm[agama]"; ?></td>
						<td><?php echo" $tm[pendidikan]"; ?></td>
						<td><?php echo" $tm[pekerjaan]"; ?></td>
						
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

