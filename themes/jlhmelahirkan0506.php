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
	  
		  
			$totmelahirkan0506 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0506 from kehamilan where kodekel='0506'");
						$jlhtotmelahirkan0506=pg_fetch_array($totmelahirkan0506); 
						$jumlahmelahirkan0506=$jlhtotmelahirkan0506[totjlhmelahirkan0506];
						$totjumlahmelahirkan0506=number_format($jumlahmelahirkan0506,0,",",".");
					echo "$totjumlahmelahirkan0506";
 } ?>