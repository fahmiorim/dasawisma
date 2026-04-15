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
	  
		  
			$totmelahirkan0403 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0403 from kehamilan where kodekel='0403'");
						$jlhtotmelahirkan0403=pg_fetch_array($totmelahirkan0403); 
						$jumlahmelahirkan0403=$jlhtotmelahirkan0403[totjlhmelahirkan0403];
						$totjumlahmelahirkan0403=number_format($jumlahmelahirkan0403,0,",",".");
					echo "$totjumlahmelahirkan0403";
 } ?>