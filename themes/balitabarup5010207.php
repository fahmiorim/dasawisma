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
	  
		  
					$totbalitabarup5010207 =pg_query($koneksi, "select sum(balitabarup5) as totjlhbalitabarup5010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotbalitabarup5010207=pg_fetch_array($totbalitabarup5010207); 
						$jumlahbalitabarup5010207=$jlhtotbalitabarup5010207[totjlhbalitabarup5010207];
						$totjumlahbalitabarup5010207=number_format($jumlahbalitabarup5010207,0,",",".");
					echo "$totjumlahbalitabarup5010207";
 } ?>