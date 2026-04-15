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
	  
		  
					$totwus020207 =pg_query($koneksi, "select sum(wus) as totjlhwus020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotwus020207=pg_fetch_array($totwus020207); 
						$jumlahwus020207=$jlhtotwus020207[totjlhwus020207];
						$totjumlahwus020207=number_format($jumlahwus020207,0,",",".");
					echo "$totjumlahwus020207";
 } ?>