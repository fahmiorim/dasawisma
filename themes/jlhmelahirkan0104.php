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
	  
		  
			$totmelahirkan0104 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0104 from kehamilan where kodekel='0104'");
						$jlhtotmelahirkan0104=pg_fetch_array($totmelahirkan0104); 
						$jumlahmelahirkan0104=$jlhtotmelahirkan0104[totjlhmelahirkan0104];
						$totjumlahmelahirkan0104=number_format($jumlahmelahirkan0104,0,",",".");
					echo "$totjumlahmelahirkan0104";
 } ?>