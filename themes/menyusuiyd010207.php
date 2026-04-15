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
	  
		  
					$totmenyusuiyd010207 =pg_query($koneksi, "select sum(menyusuiyd) as totjlhmenyusuiyd010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotmenyusuiyd010207=pg_fetch_array($totmenyusuiyd010207); 
						$jumlahmenyusuiyd010207=$jlhtotmenyusuiyd010207[totjlhmenyusuiyd010207];
						$totjumlahmenyusuiyd010207=number_format($jumlahmenyusuiyd010207,0,",",".");
					echo "$totjumlahmenyusuiyd010207";
 } ?>