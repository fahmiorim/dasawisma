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
	  
		  
					$totwr0101 =pg_query($koneksi, "select count(kodekel) as totjlhwr0101 from warung where kodekel='0101'");
						$jlhtotwr0101=pg_fetch_array($totwr0101); 
						$jumlahwr0101=$jlhtotwr0101[totjlhwr0101];
						$totjumlahwr0101=number_format($jumlahwr0101,0,",",".");
					echo "$totjumlahwr0101";
 } ?>