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
	  
		  
$totbalital0101 =pg_query($koneksi, "select sum(balital) as totjlhbalital0101 from kehamilan where kodekel='0101'");
						$jlhtotbalital0101=pg_fetch_array($totbalital0101); 
						$jumlahbalital0101=$jlhtotbalital0101[totjlhbalital0101];
						$totjumlahbalital0101=number_format($jumlahbalital0101,0,",",".");
					echo "$totjumlahbalital0101";
 } ?>