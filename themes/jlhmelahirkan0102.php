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
	  
		  
			$totmelahirkan0102 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0102 from kehamilan where kodekel='0102'");
						$jlhtotmelahirkan0102=pg_fetch_array($totmelahirkan0102); 
						$jumlahmelahirkan0102=$jlhtotmelahirkan0102[totjlhmelahirkan0102];
						$totjumlahmelahirkan0102=number_format($jumlahmelahirkan0102,0,",",".");
					echo "$totjumlahmelahirkan0102";
 } ?>