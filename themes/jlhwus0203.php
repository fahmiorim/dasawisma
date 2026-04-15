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
	  
		  
					$totwus0203 =pg_query($koneksi, "select sum(wus) as totjlhwus0203 from keluarga where kodekel='0203'");
						$jlhtotwus0203=pg_fetch_array($totwus0203); 
						$jumlahwus0203=$jlhtotwus0203[totjlhwus0203];
						$totjumlahwus0203=number_format($jumlahwus0203,0,",",".");
					echo "$totjumlahwus0203";
 } ?>