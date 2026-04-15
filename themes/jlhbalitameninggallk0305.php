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
	  
		  
$totbalital0305 =pg_query($koneksi, "select sum(balital) as totjlhbalital0305 from kehamilan where kodekel='0305'");
						$jlhtotbalital0305=pg_fetch_array($totbalital0305); 
						$jumlahbalital0305=$jlhtotbalital0305[totjlhbalital0305];
						$totjumlahbalital0305=number_format($jumlahbalital0305,0,",",".");
					echo "$totjumlahbalital0305";
 } ?>