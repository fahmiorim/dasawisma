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
	  
		  
			$totmelahirkan0402 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0402 from kehamilan where kodekel='0402'");
						$jlhtotmelahirkan0402=pg_fetch_array($totmelahirkan0402); 
						$jumlahmelahirkan0402=$jlhtotmelahirkan0402[totjlhmelahirkan0402];
						$totjumlahmelahirkan0402=number_format($jumlahmelahirkan0402,0,",",".");
					echo "$totjumlahmelahirkan0402";
 } ?>