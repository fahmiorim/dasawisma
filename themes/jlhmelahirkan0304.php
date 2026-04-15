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
	  
		  
			$totmelahirkan0304 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0304 from kehamilan where kodekel='0304'");
						$jlhtotmelahirkan0304=pg_fetch_array($totmelahirkan0304); 
						$jumlahmelahirkan0304=$jlhtotmelahirkan0304[totjlhmelahirkan0304];
						$totjumlahmelahirkan0304=number_format($jumlahmelahirkan0304,0,",",".");
					echo "$totjumlahmelahirkan0304";
 } ?>