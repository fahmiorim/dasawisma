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
	  
		  
$totbalital0501 =pg_query($koneksi, "select sum(balital) as totjlhbalital0501 from kehamilan where kodekel='0501'");
						$jlhtotbalital0501=pg_fetch_array($totbalital0501); 
						$jumlahbalital0501=$jlhtotbalital0501[totjlhbalital0501];
						$totjumlahbalital0501=number_format($jumlahbalital0501,0,",",".");
					echo "$totjumlahbalital0501";
 } ?>