<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	
	
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $count = 1;
	echo"
	
                <div class='box-header'>
                  <h2 class='box-title'>LAPORAN CATATAN KELUARGA</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">	
		  
      
		 
		<?php
		if($count > 0)
        {
		?>			
				
				
				<div class="form-group">
					<label for="nokrt" class="col-sm-1 control-label">No.KRT</label>
					  <div class="col-sm-2">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="nokrt" id="nokrt" placeholder="No.KRT"readonly>
                      </div><button type="button" class="col-sm-1 btn btn-info" data-toggle="modal" data-target="#myModal15"><i class="fa fa-search"></i> Cari</button>
					 </div>
					  
					<div class="form-group">
					 <label for="namakrt" class="col-sm-1 control-label">Nama KRT</label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required] form-control"  name="namakrt" id="namakrt" placeholder="Nama KRT"readonly>
                      </div>
					</div>
				
					<div class="form-group">
					 <label for="nama_dasawisma" class="col-sm-1 control-label">Dasawisma</label>
					  <div class="col-sm-3">
                        <input type="text" class="validate[required] form-control"  name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma"readonly>
                      </div>
					</div>
		
		  <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="Cetak"  onClick="print_records_rptcatkeluargakel2();" ><i class="fa fa-print"></i>Cetak</button>
		  
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
                   
                    
                  </table>
				  </div>
				  </form>
                </div>
              </div>
	
			<div class="modal fade" id="myModal15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data KRT</h4>
                    </div>
                    
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No.KRT</th>
                                    <th>Nama KRT</th>
									<th>Nama Dasawisma</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                $qu = pg_query($koneksi,"SELECT * FROM datakrt WHERE namakrt IS NOT NULL AND namakrt != '' order by id desc LIMIT 100");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih15" data-id="<?php echo $data['id']; ?>" data-nokrt="<?php echo $data['nokrt']; ?>"  data-namakrt="<?php echo $data['namakrt']; ?>" data-nama_dasawisma="<?php echo $data['nama_dasawisma']; ?>">
										
                                        <td><?php echo $data['nokrt']; ?></td>
                                        <td><?php echo $data['namakrt']; ?></td>
										<td><?php echo $data['nama_dasawisma']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
				
	 <?php
			
  }
}
?>				