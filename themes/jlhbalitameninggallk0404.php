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
	  
		  
$totbalital0404 =pg_query($koneksi, "select sum(balital) as totjlhbalital0404 from kehamilan where kodekel='0404'");
						$jlhtotbalital0404=pg_fetch_array($totbalital0404); 
						$jumlahbalital0404=$jlhtotbalital0404[totjlhbalital0404];
						$totjumlahbalital0404=number_format($jumlahbalital0404,0,",",".");
					echo "$totjumlahbalital0404";
 } ?>