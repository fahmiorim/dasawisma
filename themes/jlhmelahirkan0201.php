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
	  
		  
			$totmelahirkan0201 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0201 from kehamilan where kodekel='0201'");
						$jlhtotmelahirkan0201=pg_fetch_array($totmelahirkan0201); 
						$jumlahmelahirkan0201=$jlhtotmelahirkan0201[totjlhmelahirkan0201];
						$totjumlahmelahirkan0201=number_format($jumlahmelahirkan0201,0,",",".");
					echo "$totjumlahmelahirkan0201";
 } ?>