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
	  
		  
$totbalital0304 =pg_query($koneksi, "select sum(balital) as totjlhbalital0304 from kehamilan where kodekel='0304'");
						$jlhtotbalital0304=pg_fetch_array($totbalital0304); 
						$jumlahbalital0304=$jlhtotbalital0304[totjlhbalital0304];
						$totjumlahbalital0304=number_format($jumlahbalital0304,0,",",".");
					echo "$totjumlahbalital0304";
 } ?>