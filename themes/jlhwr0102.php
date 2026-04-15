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
	  
		  
					$totwr0102 =pg_query($koneksi, "select count(kodekel) as totjlhwr0102 from warung where kodekel='0102'");
						$jlhtotwr0102=pg_fetch_array($totwr0102); 
						$jumlahwr0102=$jlhtotwr0102[totjlhwr0102];
						$totjumlahwr0102=number_format($jumlahwr0102,0,",",".");
					echo "$totjumlahwr0102";
 } ?>