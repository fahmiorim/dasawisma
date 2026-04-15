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
	  
		  
			$totmelahirkan0204 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0204 from kehamilan where kodekel='0204'");
						$jlhtotmelahirkan0204=pg_fetch_array($totmelahirkan0204); 
						$jumlahmelahirkan0204=$jlhtotmelahirkan0204[totjlhmelahirkan0204];
						$totjumlahmelahirkan0204=number_format($jumlahmelahirkan0204,0,",",".");
					echo "$totjumlahmelahirkan0204";
 } ?>