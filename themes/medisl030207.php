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
	  
		  
					$totmedisl030207 =pg_query($koneksi, "select sum(medisl) as totjlhmedisl030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotmedisl030207=pg_fetch_array($totmedisl030207); 
						$jumlahmedisl030207=$jlhtotmedisl030207[totjlhmedisl030207];
						$totjumlahmedisl030207=number_format($jumlahmedisl030207,0,",",".");
					echo "$totjumlahmedisl030207";
 } ?>