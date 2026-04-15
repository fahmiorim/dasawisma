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
	  
		  
$totbalital0301 =pg_query($koneksi, "select sum(balital) as totjlhbalital0301 from kehamilan where kodekel='0301'");
						$jlhtotbalital0301=pg_fetch_array($totbalital0301); 
						$jumlahbalital0301=$jlhtotbalital0301[totjlhbalital0301];
						$totjumlahbalital0301=number_format($jumlahbalital0301,0,",",".");
					echo "$totjumlahbalital0301";
 } ?>