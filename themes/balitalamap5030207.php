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
	  
		  
					$totbalitalamap5030207 =pg_query($koneksi, "select sum(balitalamap5) as totjlhbalitalamap5030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotbalitalamap5030207=pg_fetch_array($totbalitalamap5030207); 
						$jumlahbalitalamap5030207=$jlhtotbalitalamap5030207[totjlhbalitalamap5030207];
						$totjumlahbalitalamap5030207=number_format($jumlahbalitalamap5030207,0,",",".");
					echo "$totjumlahbalitalamap5030207";
 } ?>