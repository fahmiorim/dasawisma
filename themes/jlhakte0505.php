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
	  
		  
			$totakte0505 =pg_query($koneksi, "select count(akte) as totjlhakte0505 from kehamilan where kodekel='0505'");
						$jlhtotakte0505=pg_fetch_array($totakte0505); 
						$jumlahakte0505=$jlhtotakte0505[totjlhakte0505];
						$totjumlahakte0505=number_format($jumlahakte0505,0,",",".");
					echo "$totjumlahakte0505";
 } ?>