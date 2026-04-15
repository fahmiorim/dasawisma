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
	  
		  
$totbalitap0102 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0102 from kehamilan where kodekel='0102'");
						$jlhtotbalitap0102=pg_fetch_array($totbalitap0102); 
						$jumlahbalitap0102=$jlhtotbalitap0102[totjlhbalitap0102];
						$totjumlahbalitap0102=number_format($jumlahbalitap0102,0,",",".");
					echo "$totjumlahbalitap0102";
 } ?>