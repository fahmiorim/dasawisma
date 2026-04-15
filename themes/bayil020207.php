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
	  
		  
					$totbayil020207 =pg_query($koneksi, "select sum(bayil) as totjlhbayil020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotbayil020207=pg_fetch_array($totbayil020207); 
						$jumlahbayil020207=$jlhtotbayil020207[totjlhbayil020207];
						$totjumlahbayil020207=number_format($jumlahbayil020207,0,",",".");
					echo "$totjumlahbayil020207";
 } ?>