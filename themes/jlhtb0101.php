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
	  
		  
					$tottb0101 =pg_query($koneksi, "select count(kodekel) as totjlhtb0101 from tamanbaca where kodekel='0101'");
						$jlhtottb0101=pg_fetch_array($tottb0101); 
						$jumlahtb0101=$jlhtottb0101[totjlhtb0101];
						$totjumlahtb0101=number_format($jumlahtb0101,0,",",".");
					echo "$totjumlahtb0101";
 } ?>