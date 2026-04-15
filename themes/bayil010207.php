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
	  
		  
					$totbayil010207 =pg_query($koneksi, "select sum(bayil) as totjlhbayil010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotbayil010207=pg_fetch_array($totbayil010207); 
						$jumlahbayil010207=$jlhtotbayil010207[totjlhbayil010207];
						$totjumlahbayil010207=number_format($jumlahbayil010207,0,",",".");
					echo "$totjumlahbayil010207";
 } ?>