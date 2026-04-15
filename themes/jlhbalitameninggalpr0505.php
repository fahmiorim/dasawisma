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
	  
		  
$totbalitap0505 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0505 from kehamilan where kodekel='0505'");
						$jlhtotbalitap0505=pg_fetch_array($totbalitap0505); 
						$jumlahbalitap0505=$jlhtotbalitap0505[totjlhbalitap0505];
						$totjumlahbalitap0505=number_format($jumlahbalitap0505,0,",",".");
					echo "$totjumlahbalitap0505";
 } ?>