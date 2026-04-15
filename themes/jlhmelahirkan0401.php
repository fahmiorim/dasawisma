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
	  
		  
			$totmelahirkan0401 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0401 from kehamilan where kodekel='0401'");
						$jlhtotmelahirkan0401=pg_fetch_array($totmelahirkan0401); 
						$jumlahmelahirkan0401=$jlhtotmelahirkan0401[totjlhmelahirkan0401];
						$totjumlahmelahirkan0401=number_format($jumlahmelahirkan0401,0,",",".");
					echo "$totjumlahmelahirkan0401";
 } ?>