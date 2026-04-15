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
	  
		  
					$totbalitalamal5010207 =pg_query($koneksi, "select sum(balitalamal5) as totjlhbalitalamal5010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotbalitalamal5010207=pg_fetch_array($totbalitalamal5010207); 
						$jumlahbalitalamal5010207=$jlhtotbalitalamal5010207[totjlhbalitalamal5010207];
						$totjumlahbalitalamal5010207=number_format($jumlahbalitalamal5010207,0,",",".");
					echo "$totjumlahbalitalamal5010207";
 } ?>