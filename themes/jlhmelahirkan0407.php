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
	  
		  
			$totmelahirkan0407 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0407 from kehamilan where kodekel='0407'");
						$jlhtotmelahirkan0407=pg_fetch_array($totmelahirkan0407); 
						$jumlahmelahirkan0407=$jlhtotmelahirkan0407[totjlhmelahirkan0407];
						$totjumlahmelahirkan0407=number_format($jumlahmelahirkan0407,0,",",".");
					echo "$totjumlahmelahirkan0407";
 } ?>