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
	  
		  
					$tottb0102 =pg_query($koneksi, "select count(kodekel) as totjlhtb0102 from tamanbaca where kodekel='0102'");
						$jlhtottb0102=pg_fetch_array($tottb0102); 
						$jumlahtb0102=$jlhtottb0102[totjlhtb0102];
						$totjumlahtb0102=number_format($jumlahtb0102,0,",",".");
					echo "$totjumlahtb0102";
 } ?>