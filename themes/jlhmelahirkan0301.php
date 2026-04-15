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
	  
		  
			$totmelahirkan0301 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0301 from kehamilan where kodekel='0301'");
						$jlhtotmelahirkan0301=pg_fetch_array($totmelahirkan0301); 
						$jumlahmelahirkan0301=$jlhtotmelahirkan0301[totjlhmelahirkan0301];
						$totjumlahmelahirkan0301=number_format($jumlahmelahirkan0301,0,",",".");
					echo "$totjumlahmelahirkan0301";
 } ?>