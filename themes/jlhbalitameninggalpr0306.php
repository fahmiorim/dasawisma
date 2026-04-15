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
	  
		  
$totbalitap0306 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0306 from kehamilan where kodekel='0306'");
						$jlhtotbalitap0306=pg_fetch_array($totbalitap0306); 
						$jumlahbalitap0306=$jlhtotbalitap0306[totjlhbalitap0306];
						$totjumlahbalitap0306=number_format($jumlahbalitap0306,0,",",".");
					echo "$totjumlahbalitap0306";
 } ?>