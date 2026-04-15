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
	  
		  
			$totmelahirkan0505 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0505 from kehamilan where kodekel='0505'");
						$jlhtotmelahirkan0505=pg_fetch_array($totmelahirkan0505); 
						$jumlahmelahirkan0505=$jlhtotmelahirkan0505[totjlhmelahirkan0505];
						$totjumlahmelahirkan0505=number_format($jumlahmelahirkan0505,0,",",".");
					echo "$totjumlahmelahirkan0505";
 } ?>