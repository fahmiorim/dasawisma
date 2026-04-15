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
	  
		  
$totbalital0504 =pg_query($koneksi, "select sum(balital) as totjlhbalital0504 from kehamilan where kodekel='0504'");
						$jlhtotbalital0504=pg_fetch_array($totbalital0504); 
						$jumlahbalital0504=$jlhtotbalital0504[totjlhbalital0504];
						$totjumlahbalital0504=number_format($jumlahbalital0504,0,",",".");
					echo "$totjumlahbalital0504";
 } ?>