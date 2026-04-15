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
	  
		  
					$totmenyusui020207 =pg_query($koneksi, "select sum(menyusui) as totjlhmenyusui020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotmenyusui020207=pg_fetch_array($totmenyusui020207); 
						$jumlahmenyusui020207=$jlhtotmenyusui020207[totjlhmenyusui020207];
						$totjumlahmenyusui020207=number_format($jumlahmenyusui020207,0,",",".");
					echo "$totjumlahmenyusui020207";
 } ?>