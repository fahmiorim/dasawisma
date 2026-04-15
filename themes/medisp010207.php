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
	  
		  
					$totmedisp010207 =pg_query($koneksi, "select sum(medisp) as totjlhmedisp010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotmedisp010207=pg_fetch_array($totmedisp010207); 
						$jumlahmedisp010207=$jlhtotmedisp010207[totjlhmedisp010207];
						$totjumlahmedisp010207=number_format($jumlahmedisp010207,0,",",".");
					echo "$totjumlahmedisp010207";
 } ?>