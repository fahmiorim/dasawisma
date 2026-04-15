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
	  
		  
			$totmelahirkan0502 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0502 from kehamilan where kodekel='0502'");
						$jlhtotmelahirkan0502=pg_fetch_array($totmelahirkan0502); 
						$jumlahmelahirkan0502=$jlhtotmelahirkan0502[totjlhmelahirkan0502];
						$totjumlahmelahirkan0502=number_format($jumlahmelahirkan0502,0,",",".");
					echo "$totjumlahmelahirkan0502";
 } ?>