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
	  
		  
					$totmedisp020207 =pg_query($koneksi, "select sum(medisp) as totjlhmedisp020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotmedisp020207=pg_fetch_array($totmedisp020207); 
						$jumlahmedisp020207=$jlhtotmedisp020207[totjlhmedisp020207];
						$totjumlahmedisp020207=number_format($jumlahmedisp020207,0,",",".");
					echo "$totjumlahmedisp020207";
 } ?>