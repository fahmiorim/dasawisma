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
	  
		  
$totbalitap0202 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0202 from kehamilan where kodekel='0202'");
						$jlhtotbalitap0202=pg_fetch_array($totbalitap0202); 
						$jumlahbalitap0202=$jlhtotbalitap0202[totjlhbalitap0202];
						$totjumlahbalitap0202=number_format($jumlahbalitap0202,0,",",".");
					echo "$totjumlahbalitap0202";
 } ?>