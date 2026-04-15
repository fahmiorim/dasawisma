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
	  
		  
					$totwus0503 =pg_query($koneksi, "select sum(wus) as totjlhwus0503 from keluarga where kodekel='0503'");
						$jlhtotwus0503=pg_fetch_array($totwus0503); 
						$jumlahwus0503=$jlhtotwus0503[totjlhwus0503];
						$totjumlahwus0503=number_format($jumlahwus0503,0,",",".");
					echo "$totjumlahwus0503";
 } ?>