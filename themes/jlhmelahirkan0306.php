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
	  
		  
			$totmelahirkan0306 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0306 from kehamilan where kodekel='0306'");
						$jlhtotmelahirkan0306=pg_fetch_array($totmelahirkan0306); 
						$jumlahmelahirkan0306=$jlhtotmelahirkan0306[totjlhmelahirkan0306];
						$totjumlahmelahirkan0306=number_format($jumlahmelahirkan0306,0,",",".");
					echo "$totjumlahmelahirkan0306";
 } ?>