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
	  
		  
$totbalital0307 =pg_query($koneksi, "select sum(balital) as totjlhbalital0307 from kehamilan where kodekel='0307'");
						$jlhtotbalital0307=pg_fetch_array($totbalital0307); 
						$jumlahbalital0307=$jlhtotbalital0307[totjlhbalital0307];
						$totjumlahbalital0307=number_format($jumlahbalital0307,0,",",".");
					echo "$totjumlahbalital0307";
 } ?>