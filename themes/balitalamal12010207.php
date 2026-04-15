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
	  
		  
					$totbalitalamal12010207 =pg_query($koneksi, "select sum(balitalamal12) as totjlhbalitalamal12010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotbalitalamal12010207=pg_fetch_array($totbalitalamal12010207); 
						$jumlahbalitalamal12010207=$jlhtotbalitalamal12010207[totjlhbalitalamal12010207];
						$totjumlahbalitalamal12010207=number_format($jumlahbalitalamal12010207,0,",",".");
					echo "$totjumlahbalitalamal12010207";
 } ?>