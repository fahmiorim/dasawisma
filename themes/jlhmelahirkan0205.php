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
	  
		  
			$totmelahirkan0205 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0205 from kehamilan where kodekel='0205'");
						$jlhtotmelahirkan0205=pg_fetch_array($totmelahirkan0205); 
						$jumlahmelahirkan0205=$jlhtotmelahirkan0205[totjlhmelahirkan0205];
						$totjumlahmelahirkan0205=number_format($jumlahmelahirkan0205,0,",",".");
					echo "$totjumlahmelahirkan0205";
 } ?>