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
	  
		  
			$totmelahirkan0503 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0503 from kehamilan where kodekel='0503'");
						$jlhtotmelahirkan0503=pg_fetch_array($totmelahirkan0503); 
						$jumlahmelahirkan0503=$jlhtotmelahirkan0503[totjlhmelahirkan0503];
						$totjumlahmelahirkan0503=number_format($jumlahmelahirkan0503,0,",",".");
					echo "$totjumlahmelahirkan0503";
 } ?>