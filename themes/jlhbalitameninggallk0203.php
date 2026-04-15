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
	  
		  
$totbalital0203 =pg_query($koneksi, "select sum(balital) as totjlhbalital0203 from kehamilan where kodekel='0203'");
						$jlhtotbalital0203=pg_fetch_array($totbalital0203); 
						$jumlahbalital0203=$jlhtotbalital0203[totjlhbalital0203];
						$totjumlahbalital0203=number_format($jumlahbalital0203,0,",",".");
					echo "$totjumlahbalital0203";
 } ?>