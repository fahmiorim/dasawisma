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
	  
		  
			$totmelahirkan0203 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0203 from kehamilan where kodekel='0203'");
						$jlhtotmelahirkan0203=pg_fetch_array($totmelahirkan0203); 
						$jumlahmelahirkan0203=$jlhtotmelahirkan0203[totjlhmelahirkan0203];
						$totjumlahmelahirkan0203=number_format($jumlahmelahirkan0203,0,",",".");
					echo "$totjumlahmelahirkan0203";
 } ?>