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
	  
		  
$totbalitap0301 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0301 from kehamilan where kodekel='0301'");
						$jlhtotbalitap0301=pg_fetch_array($totbalitap0301); 
						$jumlahbalitap0301=$jlhtotbalitap0301[totjlhbalitap0301];
						$totjumlahbalitap0301=number_format($jumlahbalitap0301,0,",",".");
					echo "$totjumlahbalitap0301";
 } ?>