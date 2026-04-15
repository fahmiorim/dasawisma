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
	  
		  
$totbalitap0506 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0506 from kehamilan where kodekel='0506'");
						$jlhtotbalitap0506=pg_fetch_array($totbalitap0506); 
						$jumlahbalitap0506=$jlhtotbalitap0506[totjlhbalitap0506];
						$totjumlahbalitap0506=number_format($jumlahbalitap0506,0,",",".");
					echo "$totjumlahbalitap0506";
 } ?>