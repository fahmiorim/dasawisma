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
	  
		  
					$totwus0505 =pg_query($koneksi, "select sum(wus) as totjlhwus0505 from keluarga where kodekel='0505'");
						$jlhtotwus0505=pg_fetch_array($totwus0505); 
						$jumlahwus0505=$jlhtotwus0505[totjlhwus0505];
						$totjumlahwus0505=number_format($jumlahwus0505,0,",",".");
					echo "$totjumlahwus0505";
 } ?>