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
	  
		  
					$totbalitalamap12010207 =pg_query($koneksi, "select sum(balitalamap12) as totjlhbalitalamap12010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotbalitalamap12010207=pg_fetch_array($totbalitalamap12010207); 
						$jumlahbalitalamap12010207=$jlhtotbalitalamap12010207[totjlhbalitalamap12010207];
						$totjumlahbalitalamap12010207=number_format($jumlahbalitalamap12010207,0,",",".");
					echo "$totjumlahbalitalamap12010207";
 } ?>