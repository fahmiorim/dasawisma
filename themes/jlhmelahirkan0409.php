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
	  
		  
			$totmelahirkan0409 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0409 from kehamilan where kodekel='0409'");
						$jlhtotmelahirkan0409=pg_fetch_array($totmelahirkan0409); 
						$jumlahmelahirkan0409=$jlhtotmelahirkan0409[totjlhmelahirkan0409];
						$totjumlahmelahirkan0409=number_format($jumlahmelahirkan0409,0,",",".");
					echo "$totjumlahmelahirkan0409";
 } ?>