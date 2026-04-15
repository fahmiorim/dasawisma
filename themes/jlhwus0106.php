 <?php 
 error_reporting(0);
 session_start(); 
if (empty($_SESSION['ses_user']) AND empty($_SESSION['ses_password'])){
    header('location:../index.php'); 
}
// 
else{
 include "../config/koneksi.php";
 include "../config/fungsi_terbilang.php";
  include "../config/library.php";
	  
		  
					$totwus0106 =pg_query($koneksi, "select sum(wus) as totjlhwus0106 from keluarga where kodekel='0106'");
						$jlhtotwus0106=pg_fetch_array($totwus0106); 
						$jumlahwus0106=$jlhtotwus0106[totjlhwus0106];
						$totjumlahwus0106=number_format($jumlahwus0106,0,",",".");
					echo "$totjumlahwus0106";
 } ?>