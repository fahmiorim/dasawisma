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
	  
		  
$totbalital0102 =pg_query($koneksi, "select sum(balital) as totjlhbalital0102 from kehamilan where kodekel='0102'");
						$jlhtotbalital0102=pg_fetch_array($totbalital0102); 
						$jumlahbalital0102=$jlhtotbalital0102[totjlhbalital0102];
						$totjumlahbalital0102=number_format($jumlahbalital0102,0,",",".");
					echo "$totjumlahbalital0102";
 } ?>