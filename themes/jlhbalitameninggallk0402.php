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
	  
		  
$totbalital0402 =pg_query($koneksi, "select sum(balital) as totjlhbalital0402 from kehamilan where kodekel='0402'");
						$jlhtotbalital0402=pg_fetch_array($totbalital0402); 
						$jumlahbalital0402=$jlhtotbalital0402[totjlhbalital0402];
						$totjumlahbalital0402=number_format($jumlahbalital0402,0,",",".");
					echo "$totjumlahbalital0402";
 } ?>