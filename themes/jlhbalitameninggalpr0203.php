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
	  
		  
$totbalitap0203 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0203 from kehamilan where kodekel='0203'");
						$jlhtotbalitap0203=pg_fetch_array($totbalitap0203); 
						$jumlahbalitap0203=$jlhtotbalitap0203[totjlhbalitap0203];
						$totjumlahbalitap0203=number_format($jumlahbalitap0203,0,",",".");
					echo "$totjumlahbalitap0203";
 } ?>