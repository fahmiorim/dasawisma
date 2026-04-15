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
	  
		  
$totbalitap0106 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0106 from kehamilan where kodekel='0106'");
						$jlhtotbalitap0106=pg_fetch_array($totbalitap0106); 
						$jumlahbalitap0106=$jlhtotbalitap0106[totjlhbalitap0106];
						$totjumlahbalitap0106=number_format($jumlahbalitap0106,0,",",".");
					echo "$totjumlahbalitap0106";
 } ?>