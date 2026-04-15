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
	  
		  
					$totmedisl020207 =pg_query($koneksi, "select sum(medisl) as totjlhmedisl020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotmedisl020207=pg_fetch_array($totmedisl020207); 
						$jumlahmedisl020207=$jlhtotmedisl020207[totjlhmedisl020207];
						$totjumlahmedisl020207=number_format($jumlahmedisl020207,0,",",".");
					echo "$totjumlahmedisl020207";
 } ?>