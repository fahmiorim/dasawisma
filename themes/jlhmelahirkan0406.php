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
	  
		  
			$totmelahirkan0406 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0406 from kehamilan where kodekel='0406'");
						$jlhtotmelahirkan0406=pg_fetch_array($totmelahirkan0406); 
						$jumlahmelahirkan0406=$jlhtotmelahirkan0406[totjlhmelahirkan0406];
						$totjumlahmelahirkan0406=number_format($jumlahmelahirkan0406,0,",",".");
					echo "$totjumlahmelahirkan0406";
 } ?>