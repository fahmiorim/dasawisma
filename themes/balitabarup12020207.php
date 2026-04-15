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
	  
		  
					$totbalitabarup12020207 =pg_query($koneksi, "select sum(balitabarup12) as totjlhbalitabarup12020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotbalitabarup12020207=pg_fetch_array($totbalitabarup12020207); 
						$jumlahbalitabarup12020207=$jlhtotbalitabarup12020207[totjlhbalitabarup12020207];
						$totjumlahbalitabarup12020207=number_format($jumlahbalitabarup12020207,0,",",".");
					echo "$totjumlahbalitabarup12020207";
 } ?>