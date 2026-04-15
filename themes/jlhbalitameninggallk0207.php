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
	  
		  
$totbalital0207 =pg_query($koneksi, "select sum(balital) as totjlhbalital0207 from kehamilan where kodekel='0207'");
						$jlhtotbalital0207=pg_fetch_array($totbalital0207); 
						$jumlahbalital0207=$jlhtotbalital0207[totjlhbalital0207];
						$totjumlahbalital0207=number_format($jumlahbalital0207,0,",",".");
					echo "$totjumlahbalital0207";
 } ?>