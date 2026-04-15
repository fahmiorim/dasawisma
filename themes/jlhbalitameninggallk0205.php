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
	  
		  
$totbalital0205 =pg_query($koneksi, "select sum(balital) as totjlhbalital0205 from kehamilan where kodekel='0205'");
						$jlhtotbalital0205=pg_fetch_array($totbalital0205); 
						$jumlahbalital0205=$jlhtotbalital0205[totjlhbalital0205];
						$totjumlahbalital0205=number_format($jumlahbalital0205,0,",",".");
					echo "$totjumlahbalital0205";
 } ?>