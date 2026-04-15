 <?php 
$kodekec=$_SESSION[ses_kodekec];
 ?>

 <?php 
 error_reporting(0);
 session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../index.php'); 
}
// 
else{
 	
?>		  

				  <?php
				  	include "../config/koneksi.php";
					include "../config/library.php";
				 					
					$totds =pg_query($koneksi, "select count(kode) as totalds from datakrt where kodekec='$kodekec'");
						$jlhds=pg_fetch_array($totds); 
						$jumlahds=$jlhds[totalds];
										
					$totjlhds=number_format($jumlahds,0,",",".");
				  ?>
				  
                  
			    <?php 
				echo "$totjlhds";
				?> 
<?php } ?>