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
	  
		  
					$tottb0207 =pg_query($koneksi, "select count(kodekel) as totjlhtb0207 from tamanbaca where kodekel='0207'");
						$jlhtottb0207=pg_fetch_array($tottb0207); 
						$jumlahtb0207=$jlhtottb0207[totjlhtb0207];
						$totjumlahtb0207=number_format($jumlahtb0207,0,",",".");
					echo "$totjumlahtb0207";
 } ?>