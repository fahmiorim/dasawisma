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
	  
		  
					$totbalitalamal12030207 =pg_query($koneksi, "select sum(balitalamal12) as totjlhbalitalamal12030207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Maret' and kodekel='0207'");
						$jlhtotbalitalamal12030207=pg_fetch_array($totbalitalamal12030207); 
						$jumlahbalitalamal12030207=$jlhtotbalitalamal12030207[totjlhbalitalamal12030207];
						$totjumlahbalitalamal12030207=number_format($jumlahbalitalamal12030207,0,",",".");
					echo "$totjumlahbalitalamal12030207";
 } ?>