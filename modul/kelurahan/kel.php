<?php
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
  header('location:404.php');
}
else{
	$aksi = "modul/kelurahan/aksi_kel.php";
	 // mengatasi variabel yang belum di definisikan (notice undefined index)
  $act = isset($_GET['act']) ? $_GET['act'] : '';

  switch($act){
    default:
	 $kel = pg_query($koneksi, "SELECT * FROM kelurahan");
  $count=pg_num_rows($kel);
	echo"


                <div class='box-header'>
                  <h2 class='box-title'>DATA KELURAHAN/DESA KABUPATEN BATU BARA</h2>";
                ?>
				<form method="post" name="frm">

			<div style="text-align:right">
          <a  class="btn bg-purple margin" data-toggle="tooltip" data-placement="top" title="Tambah" href="?module=kelurahan&act=tambahkel"><i class="fa fa-send"></i> Tambah</a>

		<?php
		if($count > 0)
        {
		?>
		  <button class="btn bg-olive btn-flat margin" data-toggle="tooltip" data-placement="top" title="Edit"  onClick="update_records_kel();" ><i class="fa fa-edit"></i> Edit</button>
		  <button class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus"   onClick="delete_records_kel();" ><i class="fa fa-remove"></i> Hapus </button>
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
                        <th>Kode</th>
                        <th>Kelurahan/Desa</th>
						<th>Kecamatan</th>
						<th>Alamat Kantor</th>
						<th>Nama Lurah</th>
						<th>No.HP</th>
						<th>Kode Pos</th>
						<th>Jumlah KRT</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php
					$no = 1;
					$kel =pg_query($koneksi, "select * from kelurahan order by kode");
					while ($kl=pg_fetch_array($kel)){
			?>
                      <tr>
					  <td style='text-align:center'>

					<input  type="checkbox" name="chk[]" class="chk-box" value="<?php echo $kl['id'];?>"/>
                       </td>
						<td><?php echo" $no"; ?></td>
                        <td><?php echo" $kl[kode]"; ?></td>
                        <td><?php echo" $kl[nama_kel]"; ?></td>
						<td><?php echo" $kl[nama_kec]"; ?></td>
						<td><?php echo" $kl[alamat]"; ?></td>
						<td><?php echo" $kl[nama_lurah]"; ?></td>
						<td><?php echo" $kl[nohp]"; ?></td>
						<td><?php echo" $kl[kode_pos]"; ?></td>
						<td><?php echo" $kl[jumlah_kk]"; ?></td>
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
	 break;
	   case "tambahkel":
	 ?>
	 <center><h3 class="box-title">Data Kelurahan/Desa Kabupaten Batu Bara</h3></center>

			<div class="box box-info">

                <div class="box-header with-border">

                </div><!-- /.box-header -->
                <!-- form start -->

                <form class="form-horizontal" action="<?php echo $aksi;?>?module=kelurahan&act=input" method="POST">
				<div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="kode_kel" class="col-sm-4 control-label">Kode</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="kode_kel" placeholder="Kode" required>
                      </div>
					</div>

					<div class="form-group">
					 <label for="nama_kel" class="col-sm-4 control-label">Kelurahan/Desa</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_kel" placeholder="Kelurahan" required>
                      </div>
					</div>

					<!--Pembaharuan-->

					 <div class="form-group">
					<label for="kode" class="col-sm-4 control-label">Kode Kecamatan <span class="text-danger"> *</span></label>
					  <div class="col-sm-5">
					  <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="kodekec" id="kodekec" placeholder="Kode" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search"></i> Cari</button>
					 </div>

					<div class="form-group">
					  <label for="nama_kec" class="col-sm-4 control-label">Kecamatan</label>
					  <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_kec" id="nama_kec" placeholder="Kecamatan" readonly>
                       </div>
					 </div>


					<!--<div class="form-group">
					 <label for="Kecamatan" class="col-sm-4 control-label">Kecamatan</label>
					  <div class="col-sm-7">
                       <select class="form-control" name='kecamatan' id='kecamatan' required >
						<option></option>
						<?php
										$kecamatan = pg_query($koneksi, "SELECT * FROM kecamatan order by id");
											while($p = pg_fetch_array($kecamatan)){

											echo"
												<option value=\"$p[nama_kec]\">$p[nama_kec]</option>\n";
												}
											echo"";

											//echo"
												//<option value=$p[kode]-$p[nama_kec]> $p[kode] - $p[nama_kec]</option>";
												//}
											//echo"";


						?>
						</select>
					  </div>
					</div>-->

					<div class="form-group">
					 <label for="alamat" class="col-sm-4 control-label">Alamat Kantor</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat Kantor" required>
                      </div>
					</div>

					<div class="form-group">
					 <label for="nama_lurah" class="col-sm-4 control-label">Nama Lurah/Kades</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_lurah" placeholder="Nama Lurah" required>
                      </div>
					</div>

					<div class="form-group">
					 <label for="nohp" class="col-sm-4 control-label">No.HP</label>
					  <div class="col-sm-7">
                        <input type="text" class="form-control" name="nohp" placeholder="No.HP Lurah">
                      </div>
					</div>

					<div class="form-group">
					 <label for="kode_pos" class="col-sm-4 control-label">Kode Pos</label>
					  <div class="col-sm-4">
                        <input type="text" class="form-control" name="kode_pos" placeholder="Kode Pos" required>
                      </div>
					</div>
					<div class="form-group">
					 <label for="jumlah_kk" class="col-sm-4 control-label">Jumlah KRT</label>
					  <div class="col-sm-4">
                        <input type="text" class="form-control" name="jumlah_kk" placeholder="Jumlah KRT" required>
                      </div>
					</div>

					</div><!-- /.box-body -->

						<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width:800px">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Data Kecamatan</h4>
                    </div>
                    <div class="modal-body">
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Kode Kec</th>
									<th>Kecamatan</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $qu = pg_query($koneksi, "SELECT * FROM kecamatan  ");
								while ($data = pg_fetch_array($qu)) {
                                    ?>
                                    <tr class="pilih2" data-id="<?php echo $data['id']; ?>" data-kodekec="<?php echo $data['kode']; ?>" data-nama_kec="<?php echo $data['nama_kec']; ?>">


										 <td><?php echo $data['kode']; ?></td>
										 <td><?php echo $data['nama_kec']; ?></td>

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
                    <a type="submit"  href="appmaster.php?module=kelurahan" class="btn btn-danger"><i class="fa fa-remove"></i> Cancel</a>
                    <button type="submit" class="btn btn-info pull-right"><i class="fa fa-save"></i> simpan</button>
                  </div><!-- /.box-footer -->
                </form>



	 <?php


  }
}
?>