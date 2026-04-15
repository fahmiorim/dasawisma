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
	  
		  
$totbalitap0207 =pg_query($koneksi, "select sum(balitap) as totjlhbalitap0207 from kehamilan where kodekel='0207'");
						$jlhtotbalitap0207=pg_fetch_array($totbalitap0207); 
						$jumlahbalitap0207=$jlhtotbalitap0207[totjlhbalitap0207];
						$totjumlahbalitap0207=number_format($jumlahbalitap0207,0,",",".");
					echo "$totjumlahbalitap0207";
 } ?>