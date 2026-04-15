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
				 					
					$totds =pg_query($koneksi, "select count(nokk) as totalds from keluarga");
						$jlhds=pg_fetch_array($totds); 
						$jumlahds=$jlhds[totalds];
										
					$totjlhds=number_format($jumlahds,0,",",".");
				  ?>
				  
                  
			    <?php 
				echo "$totjlhds";
				?> 
<?php } ?>