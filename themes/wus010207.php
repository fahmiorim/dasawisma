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
	  
		  
					$totwus010207 =pg_query($koneksi, "select sum(wus) as totjlhwus010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotwus010207=pg_fetch_array($totwus010207); 
						$jumlahwus010207=$jlhtotwus010207[totjlhwus010207];
						$totjumlahwus010207=number_format($jumlahwus010207,0,",",".");
					echo "$totjumlahwus010207";
 } ?>