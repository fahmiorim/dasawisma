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
	  
		  
					$totwr0207 =pg_query($koneksi, "select count(kodekel) as totjlhwr0207 from warung where kodekel='0207'");
						$jlhtotwr0207=pg_fetch_array($totwr0207); 
						$jumlahwr0207=$jlhtotwr0207[totjlhwr0207];
						$totjumlahwr0207=number_format($jumlahwr0207,0,",",".");
					echo "$totjumlahwr0207";
 } ?>