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
	  
		  
					$totbayip030207 =pg_query($koneksi, "select sum(bayip) as totjlhbayip030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotbayip030207=pg_fetch_array($totbayip030207); 
						$jumlahbayip030207=$jlhtotbayip030207[totjlhbayip030207];
						$totjumlahbayip030207=number_format($jumlahbayip030207,0,",",".");
					echo "$totjumlahbayip030207";
 } ?>