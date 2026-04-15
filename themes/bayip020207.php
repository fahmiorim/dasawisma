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
	  
		  
					$totbayip020207 =pg_query($koneksi, "select sum(bayip) as totjlhbayip020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotbayip020207=pg_fetch_array($totbayip020207); 
						$jumlahbayip020207=$jlhtotbayip020207[totjlhbayip020207];
						$totjumlahbayip020207=number_format($jumlahbayip020207,0,",",".");
					echo "$totjumlahbayip020207";
 } ?>