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
	  
		  
$totbalitap0405 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0405 from kehamilan where kodekel='0405'");
						$jlhtotbalitap0405=pg_fetch_array($totbalitap0405); 
						$jumlahbalitap0405=$jlhtotbalitap0405[totjlhbalitap0405];
						$totjumlahbalitap0405=number_format($jumlahbalitap0405,0,",",".");
					echo "$totjumlahbalitap0405";
 } ?>