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
	  
		  
			$totmelahirkan0207 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0207 from kehamilan where kodekel='0207'");
						$jlhtotmelahirkan0207=pg_fetch_array($totmelahirkan0207); 
						$jumlahmelahirkan0207=$jlhtotmelahirkan0207[totjlhmelahirkan0207];
						$totjumlahmelahirkan0207=number_format($jumlahmelahirkan0207,0,",",".");
					echo "$totjumlahmelahirkan0207";
 } ?>