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
	  
		  
					$totwus030207 =pg_query($koneksi, "select sum(wus) as totjlhwus030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotwus030207=pg_fetch_array($totwus030207); 
						$jumlahwus030207=$jlhtotwus030207[totjlhwus030207];
						$totjumlahwus030207=number_format($jumlahwus030207,0,",",".");
					echo "$totjumlahwus030207";
 } ?>