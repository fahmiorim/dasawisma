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
	  
		  
$totbalital0508 =pg_query($koneksi, "select sum(balital) as totjlhbalital0508 from kehamilan where kodekel='0508'");
						$jlhtotbalital0508=pg_fetch_array($totbalital0508); 
						$jumlahbalital0508=$jlhtotbalital0508[totjlhbalital0508];
						$totjumlahbalital0508=number_format($jumlahbalital0508,0,",",".");
					echo "$totjumlahbalital0508";
 } ?>