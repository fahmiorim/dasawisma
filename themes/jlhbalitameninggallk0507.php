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
	  
		  
$totbalital0507 =pg_query($koneksi, "select sum(balital) as totjlhbalital0507 from kehamilan where kodekel='0507'");
						$jlhtotbalital0507=pg_fetch_array($totbalital0507); 
						$jumlahbalital0507=$jlhtotbalital0507[totjlhbalital0507];
						$totjumlahbalital0507=number_format($jumlahbalital0507,0,",",".");
					echo "$totjumlahbalital0507";
 } ?>