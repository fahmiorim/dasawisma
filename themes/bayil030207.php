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
	  
		  
					$totbayil030207 =pg_query($koneksi, "select sum(bayil) as totjlhbayil030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotbayil030207=pg_fetch_array($totbayil030207); 
						$jumlahbayil030207=$jlhtotbayil030207[totjlhbayil030207];
						$totjumlahbayil030207=number_format($jumlahbayil030207,0,",",".");
					echo "$totjumlahbayil030207";
 } ?>