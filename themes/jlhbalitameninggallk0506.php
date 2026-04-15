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
	  
		  
$totbalital0506 =pg_query($koneksi, "select sum(balital) as totjlhbalital0506 from kehamilan where kodekel='0506'");
						$jlhtotbalital0506=pg_fetch_array($totbalital0506); 
						$jumlahbalital0506=$jlhtotbalital0506[totjlhbalital0506];
						$totjumlahbalital0506=number_format($jumlahbalital0506,0,",",".");
					echo "$totjumlahbalital0506";
 } ?>