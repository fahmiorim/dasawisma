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
	  
		  
			$totmelahirkan0101 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0101 from kehamilan where kodekel='0101'");
						$jlhtotmelahirkan0101=pg_fetch_array($totmelahirkan0101); 
						$jumlahmelahirkan0101=$jlhtotmelahirkan0101[totjlhmelahirkan0101];
						$totjumlahmelahirkan0101=number_format($jumlahmelahirkan0101,0,",",".");
					echo "$totjumlahmelahirkan0101";
 } ?>