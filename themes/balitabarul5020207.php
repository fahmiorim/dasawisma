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
	  
		  
					$totbalitabarul5020207 =pg_query($koneksi, "select sum(balitabarul5) as totjlhbalitabarul5020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotbalitabarul5020207=pg_fetch_array($totbalitabarul5020207); 
						$jumlahbalitabarul5020207=$jlhtotbalitabarul5020207[totjlhbalitabarul5020207];
						$totjumlahbalitabarul5020207=number_format($jumlahbalitabarul5020207,0,",",".");
					echo "$totjumlahbalitabarul5020207";
 } ?>