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
	  
		  
					$totbalitabarup5020207 =pg_query($koneksi, "select sum(balitabarup5) as totjlhbalitabarup5020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotbalitabarup5020207=pg_fetch_array($totbalitabarup5020207); 
						$jumlahbalitabarup5020207=$jlhtotbalitabarup5020207[totjlhbalitabarup5020207];
						$totjumlahbalitabarup5020207=number_format($jumlahbalitabarup5020207,0,",",".");
					echo "$totjumlahbalitabarup5020207";
 } ?>