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
	  
		  
$totbalitap0205 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0205 from kehamilan where kodekel='0205'");
						$jlhtotbalitap0205=pg_fetch_array($totbalitap0205); 
						$jumlahbalitap0205=$jlhtotbalitap0205[totjlhbalitap0205];
						$totjumlahbalitap0205=number_format($jumlahbalitap0205,0,",",".");
					echo "$totjumlahbalitap0205";
 } ?>