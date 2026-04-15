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
	  
		  
			$totmelahirkan0103 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0103 from kehamilan where kodekel='0103'");
						$jlhtotmelahirkan0103=pg_fetch_array($totmelahirkan0103); 
						$jumlahmelahirkan0103=$jlhtotmelahirkan0103[totjlhmelahirkan0103];
						$totjumlahmelahirkan0103=number_format($jumlahmelahirkan0103,0,",",".");
					echo "$totjumlahmelahirkan0103";
 } ?>