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
	  
		  
$totbalitap0407 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0407 from kehamilan where kodekel='0407'");
						$jlhtotbalitap0407=pg_fetch_array($totbalitap0407); 
						$jumlahbalitap0407=$jlhtotbalitap0407[totjlhbalitap0407];
						$totjumlahbalitap0407=number_format($jumlahbalitap0407,0,",",".");
					echo "$totjumlahbalitap0407";
 } ?>