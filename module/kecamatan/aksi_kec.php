<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) and empty($_SESSION['ses_password'])) {
    header('location:../../404.php');
}
// Apabila user sudah login dengan benar, maka terbentuklah session
else {
    include "../../config/koneksi.php";



    $module = $_GET['module'];
    $act    = $_GET['act'];


    // Input Data Kecamatan
    if ($module == 'kecamatan' and $act == 'input') {


        $insert = "insert into kecamatan (kode,nama_kec,alamat,nama_camat,nohp,jlh_kk)  
							values('$_POST[kode_kec]','$_POST[nama_kec]','$_POST[alamat]','$_POST[nama_camat]','$_POST[nohp]','$_POST[jlh_kk]')";

        $result = pg_query($koneksi, $insert);

        if (!$result) {
            echo pg_last_error($koneksi);
        } else {

?>

            <script>
                alert('Data Berhasil Tambah');
                window.location.href = '../../appmaster.php?module=kecamatan';
            </script>
        <?php

        }

        // Close the connection
        pg_close($koneksi);
    }


    // Update Kecamatan
    elseif ($module == 'kecamatan' and $act == 'update') {

        $id    = $_POST['id'];
        $kode_kec = $_POST['kode_kec'];
        $nama_kec = $_POST['nama_kec'];
        $alamat = $_POST['alamat'];
        $nama_camat = $_POST['nama_camat'];
        $nohp = $_POST['nohp'];
        $jlh_kk = $_POST['jlh_kk'];

        $chkcount = count($id);

        // Apabila gambar tidak diganti
        for ($i = 0; $i < $chkcount; $i++) {
            $update = "UPDATE kecamatan SET nama_kec     = '$nama_kec[$i]',
										alamat     = '$alamat[$i]',
										nama_camat     = '$nama_camat[$i]',
										nohp     = '$nohp[$i]',
                                        jlh_kk     = '$jlh_kk[$i]',
										kode		 = '$kode_kec[$i]'
                                   WHERE id = '$id[$i]'";
        }
        $result = pg_query($koneksi, $update);

        if (!$result) {
            echo pg_last_error($koneksi);
        } else {

        ?>

            <script>
                alert('Kecamatan Berhasil update');
                window.location.href = '../../appmaster.php?module=kecamatan';
            </script>
<?php

        }

        // Close the connection
        pg_close($koneksi);
    }
}
?>