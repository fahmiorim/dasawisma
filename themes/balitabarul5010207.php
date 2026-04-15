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
	  
		  
					$totbalitabarul5010207 =pg_query($koneksi, "select sum(balitabarul5) as totjlhbalitabarul5010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotbalitabarul5010207=pg_fetch_array($totbalitabarul5010207); 
						$jumlahbalitabarul5010207=$jlhtotbalitabarul5010207[totjlhbalitabarul5010207];
						$totjumlahbalitabarul5010207=number_format($jumlahbalitabarul5010207,0,",",".");
					echo "$totjumlahbalitabarul5010207";
 } ?>