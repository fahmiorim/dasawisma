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
	  
		  
$totbalitap0403 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0403 from kehamilan where kodekel='0403'");
						$jlhtotbalitap0403=pg_fetch_array($totbalitap0403); 
						$jumlahbalitap0403=$jlhtotbalitap0403[totjlhbalitap0403];
						$totjumlahbalitap0403=number_format($jumlahbalitap0403,0,",",".");
					echo "$totjumlahbalitap0403";
 } ?>