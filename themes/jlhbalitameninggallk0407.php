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
	  
		  
$totbalital0407 =pg_query($koneksi, "select sum(balital) as totjlhbalital0407 from kehamilan where kodekel='0407'");
						$jlhtotbalital0407=pg_fetch_array($totbalital0407); 
						$jumlahbalital0407=$jlhtotbalital0407[totjlhbalital0407];
						$totjumlahbalital0407=number_format($jumlahbalital0407,0,",",".");
					echo "$totjumlahbalital0407";
 } ?>