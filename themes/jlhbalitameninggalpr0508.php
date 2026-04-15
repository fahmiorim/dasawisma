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
	  
		  
$totbalitap0508 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0508 from kehamilan where kodekel='0508'");
						$jlhtotbalitap0508=pg_fetch_array($totbalitap0508); 
						$jumlahbalitap0508=$jlhtotbalitap0508[totjlhbalitap0508];
						$totjumlahbalitap0508=number_format($jumlahbalitap0508,0,",",".");
					echo "$totjumlahbalitap0508";
 } ?>