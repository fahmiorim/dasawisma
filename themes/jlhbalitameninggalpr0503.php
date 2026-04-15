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
	  
		  
$totbalitap0503 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0503 from kehamilan where kodekel='0503'");
						$jlhtotbalitap0503=pg_fetch_array($totbalitap0503); 
						$jumlahbalitap0503=$jlhtotbalitap0503[totjlhbalitap0503];
						$totjumlahbalitap0503=number_format($jumlahbalitap0503,0,",",".");
					echo "$totjumlahbalitap0503";
 } ?>