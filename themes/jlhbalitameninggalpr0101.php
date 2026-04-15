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
	  
		  
$totbalitap0101 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0101 from kehamilan where kodekel='0101'");
						$jlhtotbalitap0101=pg_fetch_array($totbalitap0101); 
						$jumlahbalitap0101=$jlhtotbalitap0101[totjlhbalitap0101];
						$totjumlahbalitap0101=number_format($jumlahbalitap0101,0,",",".");
					echo "$totjumlahbalitap0101";
 } ?>