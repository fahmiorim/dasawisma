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
	  
		  
			$totmelahirkan0504 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0504 from kehamilan where kodekel='0504'");
						$jlhtotmelahirkan0504=pg_fetch_array($totmelahirkan0504); 
						$jumlahmelahirkan0504=$jlhtotmelahirkan0504[totjlhmelahirkan0504];
						$totjumlahmelahirkan0504=number_format($jumlahmelahirkan0504,0,",",".");
					echo "$totjumlahmelahirkan0504";
 } ?>