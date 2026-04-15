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
	  
		  
					$totmenyusuiyd020207 =pg_query($koneksi, "select sum(menyusuiyd) as totjlhmenyusuiyd020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotmenyusuiyd020207=pg_fetch_array($totmenyusuiyd020207); 
						$jumlahmenyusuiyd020207=$jlhtotmenyusuiyd020207[totjlhmenyusuiyd020207];
						$totjumlahmenyusuiyd020207=number_format($jumlahmenyusuiyd020207,0,",",".");
					echo "$totjumlahmenyusuiyd020207";
 } ?>