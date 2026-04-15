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
	  
		  
$totbalital0106 =pg_query($koneksi, "select sum(balital) as totjlhbalital0106 from kehamilan where kodekel='0106'");
						$jlhtotbalital0106=pg_fetch_array($totbalital0106); 
						$jumlahbalital0106=$jlhtotbalital0106[totjlhbalital0106];
						$totjumlahbalital0106=number_format($jumlahbalital0106,0,",",".");
					echo "$totjumlahbalital0106";
 } ?>