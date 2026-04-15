<?php
session_start();
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){  
 echo "<script>alert('Silahkan Login Terlebih Dahulu'); window.location = 'index.php'</script>";
}
else{
?>	
<?php 
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) )
{
	
    include "koneksi.php";
    $query = pg_query(" SELECT * from posyandu where kodekel='$_SESSION[ses_kodekel]' order by lingkungan desc");
    $jsonResult = '{"data" : [ ';
    $i=0;
    while ($data=pg_fetch_assoc($query)) {
       if($i != 0){
           $jsonResult .=',';
       }
       $jsonResult .=json_encode($data);
       $i++;
    }
    $jsonResult .= ']}';
    echo $jsonResult;
} else {
    echo '<script>window.location="../../index.php"</script>';
}
}
?>