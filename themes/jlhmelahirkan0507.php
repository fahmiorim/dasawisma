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
	  
		  
			$totmelahirkan0507 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0507 from kehamilan where kodekel='0507'");
						$jlhtotmelahirkan0507=pg_fetch_array($totmelahirkan0507); 
						$jumlahmelahirkan0507=$jlhtotmelahirkan0507[totjlhmelahirkan0507];
						$totjumlahmelahirkan0507=number_format($jumlahmelahirkan0507,0,",",".");
					echo "$totjumlahmelahirkan0507";
 } ?>