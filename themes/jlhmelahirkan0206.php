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
	  
		  
			$totmelahirkan0206 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0206 from kehamilan where kodekel='0206'");
						$jlhtotmelahirkan0206=pg_fetch_array($totmelahirkan0206); 
						$jumlahmelahirkan0206=$jlhtotmelahirkan0206[totjlhmelahirkan0206];
						$totjumlahmelahirkan0206=number_format($jumlahmelahirkan0206,0,",",".");
					echo "$totjumlahmelahirkan0206";
 } ?>