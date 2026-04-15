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
	  
		  
					$totbalitalamap5010207 =pg_query($koneksi, "select sum(balitalamap5) as totjlhbalitalamap5010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotbalitalamap5010207=pg_fetch_array($totbalitalamap5010207); 
						$jumlahbalitalamap5010207=$jlhtotbalitalamap5010207[totjlhbalitalamap5010207];
						$totjumlahbalitalamap5010207=number_format($jumlahbalitalamap5010207,0,",",".");
					echo "$totjumlahbalitalamap5010207";
 } ?>