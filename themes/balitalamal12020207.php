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
	  
		  
					$totbalitalamal12020207 =pg_query($koneksi, "select sum(balitalamal12) as totjlhbalitalamal12020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotbalitalamal12020207=pg_fetch_array($totbalitalamal12020207); 
						$jumlahbalitalamal12020207=$jlhtotbalitalamal12020207[totjlhbalitalamal12020207];
						$totjumlahbalitalamal12020207=number_format($jumlahbalitalamal12020207,0,",",".");
					echo "$totjumlahbalitalamal12020207";
 } ?>