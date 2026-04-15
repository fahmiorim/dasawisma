<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');

}
else{
	$aksi = "modul/kelurahan/aksi_kel.php";
 $act = isset($_GET['act']) ? $_GET['act'] : '';


switch($_GET['act']){
  // Tampil List View
  default:
if(isset($_POST['chk'])=="")
{
    ?>
    <script>
         alert('Opsi Belum Di pilih');
       window.location.href = 'appmaster.php?module=kelurahan';
    </script>
    <?php
}
$chk = $_POST['chk'];
$chkcount = count($chk);

?>
     <center><h3 class="box-title">Edit Data Kelurahan/Desa Kabupaten Batu Bara</h3></center>

			<div class="box box-info">

                <div class="box-header with-border">

                </div><!-- /.box-header -->

   <form method="POST" class="form-horizontal" enctype="multipart/form-data" action="<?php echo $aksi;?>?module=kelurahan&act=update">
	<?php
		for($i=0; $i<$chkcount; $i++)
		{
			$id = $chk[$i];
			$res=pg_query($koneksi, "select * from kelurahan where id=".$id);
			$r=pg_fetch_array($res);
		?>
        <input type="hidden" name="id[]" value="<?php echo $r['id'];?>" />
        <div class="col-md-6">
                  <div class="box-body">
                    <div class="form-group">
					  <label for="kode_kel" class="col-sm-3 control-label">Kode</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="kode_kel[]" value="<?php echo $r['kode'];?>" placeholder="Kode" data-inputmask='"mask":"9999"' data-mask required>
                      </div>
                    </div>
					<div class="form-group">
					  <label for="nama_kel" class="col-sm-3 control-label">Kelurahan</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_kel[]" value="<?php echo $r['nama_kel'];?>" placeholder="Kelurahan" required>
                      </div>
					</div>
					<!--Pembaharuan-->
          <div class="form-group">
            <label for="kode" class="col-sm-3 control-label">Kode Kecamatan <span class="text-danger"> *</span></label>
            <div class="col-sm-5">
            <input type="hidden"  id="id" class="form-control" />
                        <input type="text" class="validate[required,custom[number]] form-control" name="kodekec" id="kodekec" placeholder="Kode" value="<?php echo "$r[kodekec]"; ?>" readonly>
                      </div><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2"><i class="fa fa-search"></i> Cari</button>
           </div>

          <div class="form-group">
            <label for="nama_kec" class="col-sm-3 control-label">Kecamatan</label>
            <div class="col-sm-7">
                        <input type="text" class="validate[required] form-control" name="nama_kec" id="nama_kec" value="<?php echo "$r[nama_kec]"; ?>" placeholder="Kecamatan" readonly>
                       </div>
           </div>

					<!--<div class="form-group">
					  <label for="kecamatan" class="col-sm-3 control-label">Kecamatan</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="kecamatan[]" value="<?php echo $r['nama_kec'];?>" placeholder="Kecamatan" required>
                      </div>
					</div>-->

					<div class="form-group">
					  <label for="alamat" class="col-sm-3 control-label">Alamat</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="alamat[]" value="<?php echo $r['alamat'];?>" placeholder="Alamat" required>
                      </div>
					</div>

					<div class="form-group">
					  <label for="nama_lurah" class="col-sm-3 control-label">Nama Lurah</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_lurah[]" value="<?php echo $r['nama_lurah'];?>" placeholder="Nama Lurah" required>
                      </div>
					</div>

					<div class="form-group">
					  <label for="No.HP" class="col-sm-3 control-label">No.HP Lurah</label>
                      <div class="col-sm-7">
                        <input type="text" class="form-control" name="nohp[]" value="<?php echo $r['nohp'];?>" placeholder="No.HP Lurah">
                      </div>
					</div>

					<div class="form-group">
					  <label for="kode_pos" class="col-sm-3 control-label">Kode Pos</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="kode_pos[]" value="<?php echo $r['kode_pos'];?>" placeholder="Kode Pos" required>
                      </div>
					</div>

          <div class="form-group">
					  <label for="jumlah_kk" class="col-sm-3 control-label">Jumlah KRT</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control" name="jumlah_kk[]" value="<?php echo $r['jumlah_kk'];?>" placeholder="Jumlah KRT" required>
                      </div>
					</div>

                  </div><!-- /.box-body -->
				</div>

		<div class="divider"></div>
		<?php

		}
		?>

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

        <div class="form-group">

            <div class="col-sm-offset-2 col-sm-5">
                <button class="btn bg-purple btn-flat margin"  title="Edit" ><i class="fa fa-pencil"></i>
                   Edit
                </button>

				 <a class="btn btn-danger"  title="Hapus"  onclick="self.history.back()"><i class="fa fa-remove"></i>
                    Batal
                </a>
            </div>
        </div>


    </form>
  </div>

	<?php
    }
}
?>