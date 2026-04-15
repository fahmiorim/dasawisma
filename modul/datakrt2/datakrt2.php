<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
  header('location:404.php');
}
else{
	$aksi = "modul/datakrt/aksi_datakrt.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : ''; 

  switch($act){
    default:
	 $krt = pg_query($koneksi, "SELECT * FROM datakrt WHERE namakrt IS NOT NULL AND namakrt != ''");
  $count=pg_num_rows($krt);
	echo"
	
                <div class='box-header'>
                  <h2 class='box-title'>DATA KEPALA RUMAH TANGGA</h2>";
                ?>
				<form method="post" name="frm">
		
			<div style="text-align:right">
			
			 <a  class="btn bg-green margin"  data-toggle="tooltip" data-placement="top" title="Beranda" href="?module=beranda"><i class="fa fa-home"></i> Beranda</a> 
			
        
		  
		<?php
		if($count > 0)
        {
		?>			 
			 <button class="btn bg-orange btn-flat margin"  data-toggle="tooltip" data-placement="top" title="lihat"  onClick="view_records_datakrt2();" ><i class="fa fa-desktop"></i> Lihat</button>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_datakrt2();" ><i class="fa fa-edit"></i> Edit</button> 
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_datakrt2();" ><i class="fa fa-remove"></i> Hapus </button>
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
						<th>No.KRT</th>
						<th>Nama KRT</th>
						<th>Dasawisma</th>
						<th>Lingkungan</th>
						<th>Kelurahan</th>
						<th>Kecamatan</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php  
					$batas = 10;
					$hal = isset($_GET['hal']) ? $_GET['hal'] : 1;
					$posisi = ($hal - 1) * $batas;
					
					$count_query = pg_query($koneksi, "SELECT COUNT(*) as total FROM datakrt WHERE namakrt IS NOT NULL AND namakrt != ''");
					$count_result = pg_fetch_array($count_query);
					$jmldata = $count_result['total'];
					$jmlhalaman = ceil($jmldata/$batas);
					
					$no = $posisi + 1;
					$lingk =pg_query($koneksi, "select * from datakrt where namakrt IS NOT NULL AND namakrt != '' order by nokrt,kodekel LIMIT $batas OFFSET $posisi");
					while ($lk=pg_fetch_array($lingk)){       
			?>
                      <tr>
					  <td style='text-align:center'>
					  
					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $lk['id'];?>"/>
                       </td> 
						<td><?php echo" $no"; ?></td>
						<td><?php echo" $lk[nokrt]"; ?></td>
						<td><?php echo" $lk[namakrt]"; ?></td>
						<td><?php echo" $lk[nama_dasawisma]"; ?></td>
						<td><?php echo" $lk[nama_lingkungan]"; ?></td>
						<td><?php echo" $lk[kelurahan]"; ?></td>
						<td><?php echo" $lk[kecamatan]"; ?></td>
                      </tr>
					  <?php
                $no++;
              }
              ?> 
                    </tbody>
                    
                  </table>
				  <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <?php
                      $batas_halaman = 5;
                      $start = max(1, $hal - floor($batas_halaman/2));
                      $end = min($jmlhalaman, $start + $batas_halaman - 1);
                      if($end - $start < $batas_halaman - 1){
                        $start = max(1, $end - $batas_halaman + 1);
                      }
                      
                      if($hal > 1){
                        $prev = $hal - 1;
                        echo "<li><a href=\"?module=datakrt2&hal=1\">&laquo;</a></li>";
                        echo "<li><a href=\"?module=datakrt2&hal=$prev\">&lsaquo;</a></li>";
                      }
                      for($i=$start; $i<=$end; $i++){
                        $aktif = ($i == $hal) ? "class=\"active\"" : "";
                        echo "<li $aktif><a href=\"?module=datakrt2&hal=$i\">$i</a></li>";
                      }
                      if($hal < $jmlhalaman){
                        $next = $hal + 1;
                        echo "<li><a href=\"?module=datakrt2&hal=$next\">&rsaquo;</a></li>";
                        echo "<li><a href=\"?module=datakrt2&hal=$jmlhalaman\">&raquo;</a></li>";
                      }
                      ?>
                    </ul>
                  </div>
				  </div>
				  </form>
                </div>
              </div>
	<?php		  
	 break;
	   case "tambahdatakrt2":
	   
	 ?>
	 <center><h3 class="box-title">Data Kepala Rumah Tangga</h3></center>
 
			<div class="box box-info">

                <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                <form class="form-horizontal" action="<?php echo $aksi;?>?module=datakrt&act=input" method="POST" id="popup-validation" enctype="multipart/form-data">
				<div class="col-md-6">
                  <div class="box-body">
					
					<div class="form-group">
					  <label for="nokrt" class="col-sm-4 control-label">No.KRT<span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
                        <input type="text" class="validate[required,custom[number]] form-control" value="<?php echo "$kdkel$rand5"; ?>" readonly name="nokrt" placeholder="No.KRT">
                       </div>
					 </div>
					
					 <div class="form-group">
					  <label for="namakrt" class="col-sm-4 control-label">Nama Kepala Rumah Tangga<span class="text-danger"> *</span></label>
					  <div class="col-sm-8">
                        <input type="text" class="validate[required] form-control" name="namakrt" placeholder="Nama Kepala Rumah Tangga">
                       </div>
					 </div>
					
						 
					<div class="form-group">
					<label for="kode" class="col-sm-4 control-label">Kode Dasawisma <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="kode" id="kode" placeholder="kode" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal10"><i class="fa fa-search"></i> Cari</button>
					 </div>
					
					<div class="form-group">
					  <label for="nama_dasawisma" class="col-sm-4 control-label">Nama Dasawisma</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_dasawisma" id="nama_dasawisma" placeholder="Nama Dasawisma" readonly>
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="kodekel" class="col-sm-4 control-label">Kode Kelurahan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="kodekel" id="kodekel" placeholder="Kode Kelurahan" readonly>
                       </div>
					 </div>
					
					<div class="form-group">
					  <label for="kelurahan" class="col-sm-4 control-label">Kelurahan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" readonly>
                       </div>
					 </div>
					 
					
					 
					 <div class="form-group">
					  <label for="kodekec" class="col-sm-4 control-label">Kode Kecamatan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="kodekec" id="kodekec" placeholder="Kode Kecamatan" readonly>
                       </div>
					 </div>
					 
					 <div class="form-group">
					  <label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" readonly>
                       </div>
					 </div>
					 
					  <div class="form-group">
					  <label for="lingkungan" class="col-sm-4 control-label">Lingkungan</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_lingkungan" id="lingkungan" placeholder="Lingkungan" readonly>
                       </div>
					 </div>
					
					</div><!-- /.box-body -->
				</div>	
				
		<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Dasawisma</h4>
                    </div>
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                     <th>Kode Dasawisma</th>
									 <th>Nama Dasawisma</th>
									<th>Kode Kel</th>
                                    <th>Kelurahan</th>
									<th>Kode Kec</th>
									<th>Kecamatan</th>
									<th>Lingkungan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                              
                                $qu = pg_query($koneksi, "SELECT * FROM dasawisma WHERE nama_dasawisma IS NOT NULL AND nama_dasawisma != '' order by kodekel");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih10" data-id="<?php echo $data['id']; ?>" data-kode="<?php echo $data['kode']; ?>"  data-nama_dasawisma="<?php echo $data['nama_dasawisma']; ?>" data-kodekel="<?php echo $data['kodekel']; ?>" data-kelurahan="<?php echo $data['kelurahan']; ?>" data-kodekec="<?php echo $data['kodekec']; ?>" data-kecamatan="<?php echo $data['kecamatan']; ?>"data-lingkungan="<?php echo $data['lingkungan']; ?>">
										
                                        <td><?php echo $data['kode']; ?></td>
                                        <td><?php echo $data['nama_dasawisma']; ?></td>
										 <td><?php echo $data['kodekel']; ?></td>
										 <td><?php echo $data['kelurahan']; ?></td>
										 <td><?php echo $data['kodekec']; ?></td>
										 <td><?php echo $data['kecamatan']; ?></td>
										 <td><?php echo $data['lingkungan']; ?></td>
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
				
				<div class="col-md-12">	
                  <div class="box-footer">
                    <a type="submit"  href="appmaster.php?module=datakrt" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>
				</div>
	 
	 
	 <?php

			
  }
}
?>				