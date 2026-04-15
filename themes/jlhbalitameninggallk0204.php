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
	  
		  
$totbalital0204 =pg_query($koneksi, "select sum(balital) as totjlhbalital0204 from kehamilan where kodekel='0204'");
						$jlhtotbalital0204=pg_fetch_array($totbalital0204); 
						$jumlahbalital0204=$jlhtotbalital0204[totjlhbalital0204];
						$totjumlahbalital0204=number_format($jumlahbalital0204,0,",",".");
					echo "$totjumlahbalital0204";
 } ?>