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
	  
		  
			$totmelahirkan0501 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0501 from kehamilan where kodekel='0501'");
						$jlhtotmelahirkan0501=pg_fetch_array($totmelahirkan0501); 
						$jumlahmelahirkan0501=$jlhtotmelahirkan0501[totjlhmelahirkan0501];
						$totjumlahmelahirkan0501=number_format($jumlahmelahirkan0501,0,",",".");
					echo "$totjumlahmelahirkan0501";
 } ?>