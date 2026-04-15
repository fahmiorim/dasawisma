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
	  
		  
			$totmelahirkan0303 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0303 from kehamilan where kodekel='0303'");
						$jlhtotmelahirkan0303=pg_fetch_array($totmelahirkan0303); 
						$jumlahmelahirkan0303=$jlhtotmelahirkan0303[totjlhmelahirkan0303];
						$totjumlahmelahirkan0303=number_format($jumlahmelahirkan0303,0,",",".");
					echo "$totjumlahmelahirkan0303";
 } ?>