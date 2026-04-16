<?php
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
 header('location:../../404.php');
}
else{
 include "../../config/koneksi.php";
 
switch($_GET['act']){
  default:
    $id = $_GET['id'];
    $sql=pg_query($koneksi,"DELETE FROM datawarga WHERE id=".$id);

    if($sql)
    {
        ?>
        <script>
            alert('Data berhasil dihapus');
            window.location.href='appmaster.php?module/datawarga';
        </script>
        <?php
    }
    else
    {
        ?>
        <script>
            alert('Error while Deleting , TRY AGAIN');
            window.location.href='appmaster.php?module/datawarga';
        </script>
        <?php
    }
  break;
  }	
}
?>
