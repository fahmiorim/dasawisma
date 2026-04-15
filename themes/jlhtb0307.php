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
	  
		  
					$tottb0307 =pg_query($koneksi, "select count(kodekel) as totjlhtb0307 from tamanbaca where kodekel='0307'");
						$jlhtottb0307=pg_fetch_array($tottb0307); 
						$jumlahtb0307=$jlhtottb0307[totjlhtb0307];
						$totjumlahtb0307=number_format($jumlahtb0307,0,",",".");
					echo "$totjumlahtb0307";
 } ?>