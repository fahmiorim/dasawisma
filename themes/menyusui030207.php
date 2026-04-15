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
	  
		  
					$totmenyusui030207 =pg_query($koneksi, "select sum(menyusui) as totjlhmenyusui030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotmenyusui030207=pg_fetch_array($totmenyusui030207); 
						$jumlahmenyusui030207=$jlhtotmenyusui030207[totjlhmenyusui030207];
						$totjumlahmenyusui030207=number_format($jumlahmenyusui030207,0,",",".");
					echo "$totjumlahmenyusui030207";
 } ?>