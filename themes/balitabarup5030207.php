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
	  
		  
					$totbalitabarup5030207 =pg_query($koneksi, "select sum(balitabarup5) as totjlhbalitabarup5030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotbalitabarup5030207=pg_fetch_array($totbalitabarup5030207); 
						$jumlahbalitabarup5030207=$jlhtotbalitabarup5030207[totjlhbalitabarup5030207];
						$totjumlahbalitabarup5030207=number_format($jumlahbalitabarup5030207,0,",",".");
					echo "$totjumlahbalitabarup5030207";
 } ?>