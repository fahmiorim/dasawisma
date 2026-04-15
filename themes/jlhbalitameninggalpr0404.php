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
	  
		  
$totbalitap0404 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0404 from kehamilan where kodekel='0404'");
						$jlhtotbalitap0404=pg_fetch_array($totbalitap0404); 
						$jumlahbalitap0404=$jlhtotbalitap0404[totjlhbalitap0404];
						$totjumlahbalitap0404=number_format($jumlahbalitap0404,0,",",".");
					echo "$totjumlahbalitap0404";
 } ?>