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
	  
		  
$totbalitap0408 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0408 from kehamilan where kodekel='0408'");
						$jlhtotbalitap0408=pg_fetch_array($totbalitap0408); 
						$jumlahbalitap0408=$jlhtotbalitap0408[totjlhbalitap0408];
						$totjumlahbalitap0408=number_format($jumlahbalitap0408,0,",",".");
					echo "$totjumlahbalitap0408";
 } ?>