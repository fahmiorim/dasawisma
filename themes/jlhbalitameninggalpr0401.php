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
	  
		  
$totbalitap0401 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0401 from kehamilan where kodekel='0401'");
						$jlhtotbalitap0401=pg_fetch_array($totbalitap0401); 
						$jumlahbalitap0401=$jlhtotbalitap0401[totjlhbalitap0401];
						$totjumlahbalitap0401=number_format($jumlahbalitap0401,0,",",".");
					echo "$totjumlahbalitap0401";
 } ?>