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
	  
		  
					$totbalitalamap5020207 =pg_query($koneksi, "select sum(balitalamap5) as totjlhbalitalamap5020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotbalitalamap5020207=pg_fetch_array($totbalitalamap5020207); 
						$jumlahbalitalamap5020207=$jlhtotbalitalamap5020207[totjlhbalitalamap5020207];
						$totjumlahbalitalamap5020207=number_format($jumlahbalitalamap5020207,0,",",".");
					echo "$totjumlahbalitalamap5020207";
 } ?>