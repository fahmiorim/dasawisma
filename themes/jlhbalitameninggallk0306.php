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
	  
		  
$totbalital0306 =pg_query($koneksi, "select sum(balital) as totjlhbalital0306 from kehamilan where kodekel='0306'");
						$jlhtotbalital0306=pg_fetch_array($totbalital0306); 
						$jumlahbalital0306=$jlhtotbalital0306[totjlhbalital0306];
						$totjumlahbalital0306=number_format($jumlahbalital0306,0,",",".");
					echo "$totjumlahbalital0306";
 } ?>