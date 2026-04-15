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
	  
		  
					$totwr0307 =pg_query($koneksi, "select count(kodekel) as totjlhwr0307 from warung where kodekel='0307'");
						$jlhtotwr0307=pg_fetch_array($totwr0307); 
						$jumlahwr0307=$jlhtotwr0307[totjlhwr0307];
						$totjumlahwr0307=number_format($jumlahwr0307,0,",",".");
					echo "$totjumlahwr0307";
 } ?>