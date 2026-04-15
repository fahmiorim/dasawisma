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
	  
		  
					$totbalitabarul12020207 =pg_query($koneksi, "select sum(balitabarul12) as totjlhbalitabarul12020207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Februari' and kodekel='0207'");
						$jlhtotbalitabarul12020207=pg_fetch_array($totbalitabarul12020207); 
						$jumlahbalitabarul12020207=$jlhtotbalitabarul12020207[totjlhbalitabarul12020207];
						$totjumlahbalitabarul12020207=number_format($jumlahbalitabarul12020207,0,",",".");
					echo "$totjumlahbalitabarul12020207";
 } ?>