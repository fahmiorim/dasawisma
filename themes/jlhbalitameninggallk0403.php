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
	  
		  
$totbalital0403 =pg_query($koneksi, "select sum(balital) as totjlhbalital0403 from kehamilan where kodekel='0403'");
						$jlhtotbalital0403=pg_fetch_array($totbalital0403); 
						$jumlahbalital0403=$jlhtotbalital0403[totjlhbalital0403];
						$totjumlahbalital0403=number_format($jumlahbalital0403,0,",",".");
					echo "$totjumlahbalital0403";
 } ?>