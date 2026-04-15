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
	  
		  
					$totmedisl010207 =pg_query($koneksi, "select sum(medisl) as totjlhmedisl010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotmedisl010207=pg_fetch_array($totmedisl010207); 
						$jumlahmedisl010207=$jlhtotmedisl010207[totjlhmedisl010207];
						$totjumlahmedisl010207=number_format($jumlahmedisl010207,0,",",".");
					echo "$totjumlahmedisl010207";
 } ?>