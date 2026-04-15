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
	  
		  
					$totbalitabarup12010207 =pg_query($koneksi, "select sum(balitabarup12) as totjlhbalitabarup12010207 from sipkunjungan where tahun='$_SESSION[thnaktif]' and bulan='Januari' and kodekel='0207'");
						$jlhtotbalitabarup12010207=pg_fetch_array($totbalitabarup12010207); 
						$jumlahbalitabarup12010207=$jlhtotbalitabarup12010207[totjlhbalitabarup12010207];
						$totjumlahbalitabarup12010207=number_format($jumlahbalitabarup12010207,0,",",".");
					echo "$totjumlahbalitabarup12010207";
 } ?>