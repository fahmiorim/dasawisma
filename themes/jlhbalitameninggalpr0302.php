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
	  
		  
$totbalitap0302 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0302 from kehamilan where kodekel='0302'");
						$jlhtotbalitap0302=pg_fetch_array($totbalitap0302); 
						$jumlahbalitap0302=$jlhtotbalitap0302[totjlhbalitap0302];
						$totjumlahbalitap0302=number_format($jumlahbalitap0302,0,",",".");
					echo "$totjumlahbalitap0302";
 } ?>