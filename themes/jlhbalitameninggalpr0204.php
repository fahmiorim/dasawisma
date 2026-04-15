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
	  
		  
$totbalitap0204 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0204 from kehamilan where kodekel='0204'");
						$jlhtotbalitap0204=pg_fetch_array($totbalitap0204); 
						$jumlahbalitap0204=$jlhtotbalitap0204[totjlhbalitap0204];
						$totjumlahbalitap0204=number_format($jumlahbalitap0204,0,",",".");
					echo "$totjumlahbalitap0204";
 } ?>