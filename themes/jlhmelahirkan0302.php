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
	  
		  
			$totmelahirkan0302 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0302 from kehamilan where kodekel='0302'");
						$jlhtotmelahirkan0302=pg_fetch_array($totmelahirkan0302); 
						$jumlahmelahirkan0302=$jlhtotmelahirkan0302[totjlhmelahirkan0302];
						$totjumlahmelahirkan0302=number_format($jumlahmelahirkan0302,0,",",".");
					echo "$totjumlahmelahirkan0302";
 } ?>