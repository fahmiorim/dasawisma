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
	  
		  
					$totmedisp030207 =pg_query($koneksi, "select sum(medisp) as totjlhmedisp030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotmedisp030207=pg_fetch_array($totmedisp030207); 
						$jumlahmedisp030207=$jlhtotmedisp030207[totjlhmedisp030207];
						$totjumlahmedisp030207=number_format($jumlahmedisp030207,0,",",".");
					echo "$totjumlahmedisp030207";
 } ?>