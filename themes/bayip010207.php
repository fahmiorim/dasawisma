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
	  
		  
					$totbayip010207 =pg_query($koneksi, "select sum(bayip) as totjlhbayip010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotbayip010207=pg_fetch_array($totbayip010207); 
						$jumlahbayip010207=$jlhtotbayip010207[totjlhbayip010207];
						$totjumlahbayip010207=number_format($jumlahbayip010207,0,",",".");
					echo "$totjumlahbayip010207";
 } ?>