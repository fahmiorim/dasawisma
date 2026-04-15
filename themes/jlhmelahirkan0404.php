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
	  
		  
			$totmelahirkan0404 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0404 from kehamilan where kodekel='0404'");
						$jlhtotmelahirkan0404=pg_fetch_array($totmelahirkan0404); 
						$jumlahmelahirkan0404=$jlhtotmelahirkan0404[totjlhmelahirkan0404];
						$totjumlahmelahirkan0404=number_format($jumlahmelahirkan0404,0,",",".");
					echo "$totjumlahmelahirkan0404";
 } ?>