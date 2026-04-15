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
	  
		  
					$totmenyusui010207 =pg_query($koneksi, "select sum(menyusui) as totjlhmenyusui010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotmenyusui010207=pg_fetch_array($totmenyusui010207); 
						$jumlahmenyusui010207=$jlhtotmenyusui010207[totjlhmenyusui010207];
						$totjumlahmenyusui010207=number_format($jumlahmenyusui010207,0,",",".");
					echo "$totjumlahmenyusui010207";
 } ?>