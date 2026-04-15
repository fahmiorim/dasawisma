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
	  
		  
			$totmelahirkan0508 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0508 from kehamilan where kodekel='0508'");
						$jlhtotmelahirkan0508=pg_fetch_array($totmelahirkan0508); 
						$jumlahmelahirkan0508=$jlhtotmelahirkan0508[totjlhmelahirkan0508];
						$totjumlahmelahirkan0508=number_format($jumlahmelahirkan0508,0,",",".");
					echo "$totjumlahmelahirkan0508";
 } ?>