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
	  
		  
					$totwus0401 =pg_query($koneksi, "select sum(wus) as totjlhwus0401 from keluarga where kodekel='0401'");
						$jlhtotwus0401=pg_fetch_array($totwus0401); 
						$jumlahwus0401=$jlhtotwus0401[totjlhwus0401];
						$totjumlahwus0401=number_format($jumlahwus0401,0,",",".");
					echo "$totjumlahwus0401";
 } ?>