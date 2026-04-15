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
	  
		  
			$totmelahirkan0106 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0106 from kehamilan where kodekel='0106'");
						$jlhtotmelahirkan0106=pg_fetch_array($totmelahirkan0106); 
						$jumlahmelahirkan0106=$jlhtotmelahirkan0106[totjlhmelahirkan0106];
						$totjumlahmelahirkan0106=number_format($jumlahmelahirkan0106,0,",",".");
					echo "$totjumlahmelahirkan0106";
 } ?>