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
	  
		  
			$totmelahirkan0305 =pg_query($koneksi, "select sum(jlhmelahirkan) as totjlhmelahirkan0305 from kehamilan where kodekel='0305'");
						$jlhtotmelahirkan0305=pg_fetch_array($totmelahirkan0305); 
						$jumlahmelahirkan0305=$jlhtotmelahirkan0305[totjlhmelahirkan0305];
						$totjumlahmelahirkan0305=number_format($jumlahmelahirkan0305,0,",",".");
					echo "$totjumlahmelahirkan0305";
 } ?>