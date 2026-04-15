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
	  
		  
			$totmelahirkan0405 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0405 from kehamilan where kodekel='0405'");
						$jlhtotmelahirkan0405=pg_fetch_array($totmelahirkan0405); 
						$jumlahmelahirkan0405=$jlhtotmelahirkan0405[totjlhmelahirkan0405];
						$totjumlahmelahirkan0405=number_format($jumlahmelahirkan0405,0,",",".");
					echo "$totjumlahmelahirkan0405";
 } ?>