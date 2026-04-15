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
	  
		  
$totbalital0206 =pg_query($koneksi, "select sum(balital) as totjlhbalital0206 from kehamilan where kodekel='0206'");
						$jlhtotbalital0206=pg_fetch_array($totbalital0206); 
						$jumlahbalital0206=$jlhtotbalital0206[totjlhbalital0206];
						$totjumlahbalital0206=number_format($jumlahbalital0206,0,",",".");
					echo "$totjumlahbalital0206";
 } ?>