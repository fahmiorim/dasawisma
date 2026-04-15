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
	  
		  
			$totmelahirkan0105 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0105 from kehamilan where kodekel='0105'");
						$jlhtotmelahirkan0105=pg_fetch_array($totmelahirkan0105); 
						$jumlahmelahirkan0105=$jlhtotmelahirkan0105[totjlhmelahirkan0105];
						$totjumlahmelahirkan0105=number_format($jumlahmelahirkan0105,0,",",".");
					echo "$totjumlahmelahirkan0105";
 } ?>