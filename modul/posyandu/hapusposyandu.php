<?php
error_reporting(0);
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
  
}
else{
 
switch($_GET['act']){
  // Tampil List View
  default:	

$chk = $_POST['chk'];
$chkcount = count($chk);

if(!isset($chk))
{
	
    ?>
	
    <script>
        alert('Opsi Belum Di pilih, Silahkan Pilih Terlebih dahulu');
        window.location.href = 'appmaster.php?module=posyandu';
    </script>
    <?php
}
else
{
     for($i=0; $i<$chkcount; $i++)
    {
        $del = $chk[$i];
        $sql=pg_query($koneksi,"DELETE FROM posyandu WHERE id=".$del);
    }

    if($sql)
    {
        ?>
        <script>
            alert('<?php echo $chkcount; ?> Baris data Berhasil di Hapus !!!');
            window.location.href='appmaster.php?module=posyandu';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('Error while Deleting , TRY AGAIN');
            window.location.href='appmaster.php?module=posyandu';
        </script>
        <?php
    }
  }
  }	
}
?>
