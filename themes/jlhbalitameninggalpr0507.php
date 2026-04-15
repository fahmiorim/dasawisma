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
	  
		  
$totbalitap0507 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0507 from kehamilan where kodekel='0507'");
						$jlhtotbalitap0507=pg_fetch_array($totbalitap0507); 
						$jumlahbalitap0507=$jlhtotbalitap0507[totjlhbalitap0507];
						$totjumlahbalitap0507=number_format($jumlahbalitap0507,0,",",".");
					echo "$totjumlahbalitap0507";
 } ?>