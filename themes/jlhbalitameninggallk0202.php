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
	  
		  
$totbalital0202 =pg_query($koneksi, "select sum(balital) as totjlhbalital0202 from kehamilan where kodekel='0202'");
						$jlhtotbalital0202=pg_fetch_array($totbalital0202); 
						$jumlahbalital0202=$jlhtotbalital0202[totjlhbalital0202];
						$totjumlahbalital0202=number_format($jumlahbalital0202,0,",",".");
					echo "$totjumlahbalital0202";
 } ?>