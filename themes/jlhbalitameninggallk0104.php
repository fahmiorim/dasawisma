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
	  
		  
$totbalital0104 =pg_query($koneksi, "select sum(balital) as totjlhbalital0104 from kehamilan where kodekel='0104'");
						$jlhtotbalital0104=pg_fetch_array($totbalital0104); 
						$jumlahbalital0104=$jlhtotbalital0104[totjlhbalital0104];
						$totjumlahbalital0104=number_format($jumlahbalital0104,0,",",".");
					echo "$totjumlahbalital0104";
 } ?>