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
	  
		  
			$totmelahirkan0202 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0202 from kehamilan where kodekel='0202'");
						$jlhtotmelahirkan0202=pg_fetch_array($totmelahirkan0202); 
						$jumlahmelahirkan0202=$jlhtotmelahirkan0202[totjlhmelahirkan0202];
						$totjumlahmelahirkan0202=number_format($jumlahmelahirkan0202,0,",",".");
					echo "$totjumlahmelahirkan0202";
 } ?>