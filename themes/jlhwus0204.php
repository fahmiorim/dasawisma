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
	  
		  
					$totwus0204 =pg_query($koneksi, "select sum(wus) as totjlhwus0204 from keluarga where kodekel='0204'");
						$jlhtotwus0204=pg_fetch_array($totwus0204); 
						$jumlahwus0204=$jlhtotwus0204[totjlhwus0204];
						$totjumlahwus0204=number_format($jumlahwus0204,0,",",".");
					echo "$totjumlahwus0204";
 } ?>