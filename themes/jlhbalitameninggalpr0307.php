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
	  
		  
$totbalitap0307 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0307 from kehamilan where kodekel='0307'");
						$jlhtotbalitap0307=pg_fetch_array($totbalitap0307); 
						$jumlahbalitap0307=$jlhtotbalitap0307[totjlhbalitap0307];
						$totjumlahbalitap0307=number_format($jumlahbalitap0307,0,",",".");
					echo "$totjumlahbalitap0307";
 } ?>