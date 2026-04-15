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
	  
		  
					$totwus0506 =pg_query($koneksi, "select sum(wus) as totjlhwus0506 from keluarga where kodekel='0506'");
						$jlhtotwus0506=pg_fetch_array($totwus0506); 
						$jumlahwus0506=$jlhtotwus0506[totjlhwus0506];
						$totjumlahwus0506=number_format($jumlahwus0506,0,",",".");
					echo "$totjumlahwus0506";
 } ?>