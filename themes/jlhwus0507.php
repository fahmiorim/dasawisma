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
	  
		  
					$totwus0507 =pg_query($koneksi, "select sum(wus) as totjlhwus0507 from keluarga where kodekel='0507'");
						$jlhtotwus0507=pg_fetch_array($totwus0507); 
						$jumlahwus0507=$jlhtotwus0507[totjlhwus0507];
						$totjumlahwus0507=number_format($jumlahwus0507,0,",",".");
					echo "$totjumlahwus0507";
 } ?>