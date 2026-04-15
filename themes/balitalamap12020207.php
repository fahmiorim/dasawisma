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
	  
		  
					$totbalitalamap12020207 =pg_query($koneksi, "select sum(balitalamap12) as totjlhbalitalamap12020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotbalitalamap12020207=pg_fetch_array($totbalitalamap12020207); 
						$jumlahbalitalamap12020207=$jlhtotbalitalamap12020207[totjlhbalitalamap12020207];
						$totjumlahbalitalamap12020207=number_format($jumlahbalitalamap12020207,0,",",".");
					echo "$totjumlahbalitalamap12020207";
 } ?>