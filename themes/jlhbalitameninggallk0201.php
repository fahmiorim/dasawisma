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
	  
		  
$totbalital0201 =pg_query($koneksi, "select sum(balital) as totjlhbalital0201 from kehamilan where kodekel='0201'");
						$jlhtotbalital0201=pg_fetch_array($totbalital0201); 
						$jumlahbalital0201=$jlhtotbalital0201[totjlhbalital0201];
						$totjumlahbalital0201=number_format($jumlahbalital0201,0,",",".");
					echo "$totjumlahbalital0201";
 } ?>