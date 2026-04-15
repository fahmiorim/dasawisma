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
	  
		  
					$totwus0405 =pg_query($koneksi, "select sum(wus) as totjlhwus0405 from keluarga where kodekel='0405'");
						$jlhtotwus0405=pg_fetch_array($totwus0405); 
						$jumlahwus0405=$jlhtotwus0405[totjlhwus0405];
						$totjumlahwus0405=number_format($jumlahwus0405,0,",",".");
					echo "$totjumlahwus0405";
 } ?>