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
	  
		  
			$totmelahirkan0307 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0307 from kehamilan where kodekel='0307'");
						$jlhtotmelahirkan0307=pg_fetch_array($totmelahirkan0307); 
						$jumlahmelahirkan0307=$jlhtotmelahirkan0307[totjlhmelahirkan0307];
						$totjumlahmelahirkan0307=number_format($jumlahmelahirkan0307,0,",",".");
					echo "$totjumlahmelahirkan0307";
 } ?>