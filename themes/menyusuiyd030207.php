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
	  
		  
					$totmenyusuiyd030207 =pg_query($koneksi, "select sum(menyusuiyd) as totjlhmenyusuiyd030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotmenyusuiyd030207=pg_fetch_array($totmenyusuiyd030207); 
						$jumlahmenyusuiyd030207=$jlhtotmenyusuiyd030207[totjlhmenyusuiyd030207];
						$totjumlahmenyusuiyd030207=number_format($jumlahmenyusuiyd030207,0,",",".");
					echo "$totjumlahmenyusuiyd030207";
 } ?>