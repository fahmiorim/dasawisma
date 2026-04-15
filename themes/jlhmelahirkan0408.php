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
	  
		  
			$totmelahirkan0408 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0408 from kehamilan where kodekel='0408'");
						$jlhtotmelahirkan0408=pg_fetch_array($totmelahirkan0408); 
						$jumlahmelahirkan0408=$jlhtotmelahirkan0408[totjlhmelahirkan0408];
						$totjumlahmelahirkan0408=number_format($jumlahmelahirkan0408,0,",",".");
					echo "$totjumlahmelahirkan0408";
 } ?>